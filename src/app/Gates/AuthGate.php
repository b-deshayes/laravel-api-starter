<?php

namespace App\Gates;

use App\Helpers\IpAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Kotus\Settings\Facades\Settings;

class AuthGate
{
    /**
     * @var string
     */
    public const LOGIN_ABILITY = 'auth.login';

    /**
     * Verify if user ip is authorize to login.
     *
     * @param User $user
     * @param Request $request
     *
     * @return bool
     */
    public function login(User $user, Request $request): bool
    {
        return IpAddress::authorize($request->ip(), $user->ip_restriction ?? Settings::get('ip_restriction'));
    }
}
