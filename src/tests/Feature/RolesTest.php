<?php

namespace Tests\Feature;

use App\Enums\Permission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class RolesTest extends TestCase
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

        Config::set('app.debug', true);
    }

    /**
     * Test if an authenticated user with permission can get all roles.
     */
    public function testGetRolesWithPermission(): void
    {
        $user = User::factory()->create();
        $user->givePermissionTo(Permission::VIEW_ALL_ROLE);
        $token = auth('api')->login($user);

        $response = $this->get(route('api.v1.roles.index'), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertOk()->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ]
            ]
        ]);
    }

    /**
     * Test if an authenticated user with permission can get all roles.
     */
    public function testGetRolesWithoutPermission(): void
    {
        $user = User::factory()->create();
        $token = auth('api')->login($user);

        $response = $this->get(route('api.v1.roles.index'), [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertUnauthorized()->assertExactJson([
            'message' => __('api.exceptions.unauthorized.message'),
        ]);
    }
}
