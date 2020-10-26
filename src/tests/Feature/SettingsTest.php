<?php

namespace Tests\Feature;

use App\Enums\Permission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Kotus\Settings\Facades\Settings;
use Tests\TestCase;

class SettingsTest extends TestCase
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
     * Test if an authenticated user with permission can edit a setting.
     */
    public function testAuthUserWithPermissionCanPatchSetting(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo(Permission::EDIT_SETTING);
        $token = auth('api')->login($user);

        $response = $this->patch(route('api.v1.settings.edit', ['key' => 'ip_restriction']), [
            'value' => '192.168.1.1'
        ], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertOk()->assertJsonStructure([
            'data' => [
                'key',
                'value',
            ],
        ]);
    }

    /**
     * User cannot patch setting if haven't the edit permission.
     */
    public function testUserWithoutPermissionCannotPatchSetting(): void
    {
        $user = User::factory()->create();
        $token = auth('api')->login($user);

        $response = $this->patch(route('api.v1.settings.edit', ['key' => 'ip_restriction']), [
            'value' => '192.168.1.1'
        ], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message' => __('api.exceptions.unauthorized.message'),
        ]);
    }

    public function testUserCannotUpdateNotExistingSetting(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo(Permission::EDIT_SETTING);
        $token = auth('api')->login($user);

        $response = $this->patch(route('api.v1.settings.edit', ['key' => 'not_existing_key']), [
            'value' => '192.168.1.1'
        ], [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertNotFound()->assertExactJson([
            'message' => __('api.v1.setting.edit.key_not_found'),
        ]);
    }

    /**
     * User with permission can see setting.
     */
    public function testAuthUserWithPermissionCanShowSetting(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo(Permission::VIEW_SETTING);
        $token = auth('api')->login($user);

        Config::set('app.debug', true);

        $response = $this->get(route('api.v1.settings.show', ['key' => 'ip_restriction']), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertOk()->assertJsonStructure([
            'data' => [
                'key',
                'value',
            ],
        ]);
    }

    /**
     * Test if user cannot show an non existing setting.
     */
    public function testUserCannotShowNotExistingSetting(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo(Permission::VIEW_SETTING);
        $token = auth('api')->login($user);

        $response = $this->get(route('api.v1.settings.edit', ['key' => 'not_existing_key']), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertNotFound()->assertExactJson([
            'message' => __('api.v1.setting.edit.key_not_found'),
        ]);
    }

    /**
     * Test if a user without view permission cannot show the setting
     */
    public function testUserWithoutPermissionCannotShowSetting(): void
    {
        $user = User::factory()->create();
        $token = auth('api')->login($user);

        $response = $this->get(route('api.v1.settings.edit', ['key' => 'ip_restriction']), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message' => __('api.exceptions.unauthorized.message'),
        ]);
    }

    /**
     * Test if user with permission can view all settings.
     */
    public function testUserWithPermissionViewAllSettings(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo(Permission::VIEW_ALL_SETTINGS);
        $token = auth('api')->login($user);

        $response = $this->get(route('api.v1.settings.index'), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertOk()->assertJsonStructure([
            'data' => [
                '*' => [
                    'key',
                    'value',
                    'tenant',
                ]
            ]
        ]);
    }

    /**
     * Test if a user without permission cannot view all settings.
     */
    public function testUserWithoutPermissionCannotViewSettings(): void
    {
        $user = User::factory()->create();
        $token = auth('api')->login($user);

        $response = $this->get(route('api.v1.settings.index'), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message' => __('api.exceptions.unauthorized.message'),
        ]);
    }

    public function testUnauthenticatedUserCannotSeeSettings(): void
    {
        $response = $this->get(route('api.v1.settings.index'), [
            'Accept' => 'application/json',
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message'=> __('api.exceptions.unauthenticated')
        ]);

        $response = $this->get(route('api.v1.settings.edit', ['key' => 'ip_restriction']), [
            'Accept' => 'application/json',
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message'=> __('api.exceptions.unauthenticated')
        ]);

        $response = $this->patch(route('api.v1.settings.edit', ['key' => 'not_existing_key']), [
            'value' => '192.168.1.1'
        ], [
            'Accept' => 'application/json'
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message'=> __('api.exceptions.unauthenticated')
        ]);
    }
}
