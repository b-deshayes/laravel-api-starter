<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Kotus\Settings\Facades\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach(config('api.default_settings') as $k => $v)
        {
            Settings::set($k, $v);
        }
    }
}
