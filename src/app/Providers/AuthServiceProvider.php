<?php

namespace App\Providers;

use App\Gates\AuthGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();
        $this->registerGates();
    }

    /**
     * Register any gates.
     *
     * @return void
     */
    private function registerGates(): void
    {
        Gate::define(AuthGate::LOGIN_ABILITY, 'App\Gates\AuthGate@login');
    }
}
