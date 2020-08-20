<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Kotus\Settings\Facades\Settings;

class AssignUserIpRestriction
{
    /**
     * Handle the event.
     *
     * @param UserCreated $event
     * @return bool
     */
    public function handle(UserCreated $event): bool
    {
        Settings::flushCache();
        return $event->user->update([
            'ip_restriction' => Settings::get('ip_restriction')
        ]);
    }
}
