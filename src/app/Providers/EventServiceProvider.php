<?php

namespace App\Providers;

use App\Events\UserCreated;
use App\Listeners\AssignDefaultUserRole;
use App\Listeners\AssignUserIpRestriction;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreated::class => [
            AssignDefaultUserRole::class,
            AssignUserIpRestriction::class,
        ]
    ];
}
