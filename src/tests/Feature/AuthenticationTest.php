<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Kotus\Settings\Facades\Settings;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        // Disable debug mode for more real tests.
        Config::set('app.debug', false);

        // Run permissions/roles seeder
        $this->artisan('db:seed --class=RoleSeeder');
    }

    /**
     * User can login himself with his personals credentials.
     *
     * @return void
     */
    public function testSuccessfullyLogin(): void
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('api.v1.auth.login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertOk()->assertJsonStructure([
            'data' => [
                'access_token',
                'token_type',
                'expires_in'
            ],
        ]);
    }

    /**
     * User cannot login if credentials are wrongs.
     *
     * @return void
     */
    public function testLoginWithBadCredentials(): void
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('api.v1.auth.login'), [
            'email' => $user->email,
            'password' => 'badPassword'
        ], [
            'Accept' => 'application/json' // TODO: Handle when no accept header specify, must return JSON instead of HTML
        ]);

        $response->assertForbidden()->assertExactJson([
            'message' => trans('api.v1.auth.login.invalid_credentials')
        ]);
    }

    /**
     * User can see his data with his token.
     * He can also see his personal information like his email address.
     *
     * @return void
     */
    public function testCanSeeMyData(): void
    {
        $user = factory(User::class)->create();
        $token = auth('api')->login($user);

        $data = $this->get(route('api.v1.auth.me'), [
            'Authorization' => 'Bearer ' . $token
        ]);

        $data->assertOk()
            ->assertSee($user->email)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'email'
                ]
            ]);
        self::assertEquals($data->json('data.id'), $user->id);
    }

    /**
     * Cannot access to auth/@me if no token provided.
     *
     * @return void
     */
    public function testCannotSeeMyDataIfNotAuthenticated(): void
    {
        $response = $this->get(route('api.v1.auth.me'), [
            'Accept' => 'application/json' // TODO: Handle when no accept header specify, must return JSON instead of HTML
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message' => trans('api.exceptions.unauthenticated')
        ]);
    }

    /**
     * No one can register himself as user if registration is globally disabled.
     *
     * @return void
     */
    public function testCannotRegisterIfGloballyDisabled(): void
    {
        Settings::set('user_registration', false);
        $response = $this->post(route('api.v1.auth.register'), [], [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(Response::HTTP_LOCKED)
            ->assertExactJson([
                'message' => trans('api.v1.auth.register.register_disabled')
            ]);
    }

    /**
     * Register a new user.
     *
     * @return void
     */
    public function testRegisterUser(): void
    {
        // Ensure registration is enabled.
        Settings::set('user_registration', true);

        $newUser = [
            'email' => 'john.doe@app.io',
            'name' => 'John Doe',
            'password' => 'myS3cr3tPassword!'
        ];

        $response = $this->post(route('api.v1.auth.register'),
            $newUser, [
            'Accept' => 'application/json'
        ]);

        $response->assertCreated()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at'
                ]
            ]);

        $user = User::find($response->json('data.id'));
        self::assertNotNull($user);
        self::assertTrue(Hash::check($newUser['password'], $user->password));
    }

    /**
     * Each password must be complex enough.
     *
     * @return void
     */
    public function testRefuseTooSimplePassword(): void
    {
        // Ensure registration is enabled.
        Settings::set('user_registration', true);

        $newUser = [
            'email' => 'john.doe',
            'name' => 'A',
            'password' => 'aSimplePasswordWithoutDigitAndSpecialChar'
        ];

        $response = $this->post(route('api.v1.auth.register'),
            $newUser, [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'name' => [],
                    'email' => [],
                    'password' => []
                ]
            ])
            ->assertSee(trans('api.v1.auth.register.password.regex.message'));
    }

    /**
     * A user can refresh is own token to get a new one.
     *
     * @return void
     */
    public function testLoggedInUserCanRefreshToken(): void
    {
        $user = factory(User::class)->create();
        $token = auth('api')->login($user);

        $expires_in = Carbon::parse(auth('api')->payload()['exp']);

        $refresh = $this->post(route('api.v1.auth.refresh'), [], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $refresh->assertOk()->assertJsonStructure([
            'data' => [
                'access_token',
                'token_type',
                'expires_in'
            ],
        ]);

        self::assertTrue(Carbon::now()->addSeconds($refresh->json('data.expires_in'))->isAfter($expires_in));
    }

    /**
     * When user logout, revoke his token. So it can't be reused.
     *
     * @return void
     */
    public function testRevokeTokenOnLogout(): void
    {
        $user = factory(User::class)->create();
        $token = auth('api')->login($user);

        $logout = $this->delete(route('api.v1.auth.logout'), [], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $logout->assertStatus(Response::HTTP_NO_CONTENT);

        $me = $this->get(route('api.v1.auth.me'), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $me->assertUnauthorized()->assertExactJson([
            'message' => trans('api.exceptions.unauthenticated')
        ]);
    }
}
