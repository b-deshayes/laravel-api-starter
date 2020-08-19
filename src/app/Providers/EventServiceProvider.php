<?php

namespace App\Providers;

use App\Events\UserCreating;
use App\Listeners\AssignDefaultUserRole;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreating::class => [
            AssignDefaultUserRole::class,
        ]
    ];
}
