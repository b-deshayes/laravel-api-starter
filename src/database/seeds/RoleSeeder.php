<?php

use App\Enums\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->command->info('Creating permissions ...');

        // Insert all needed permission
        collect(Permission::getAll())->each(function ($value) {
            $permission = \App\Models\Permission::findOrCreate($value);
            $this->command->info("Permission $permission->name created");
        });

        // Insert default role
        $this->command->info('Creating default role ...');
        Role::findOrCreate(config('permission.default.role_name', 'user'));
    }
}
