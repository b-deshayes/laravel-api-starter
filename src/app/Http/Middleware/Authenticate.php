<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     *
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        return null;
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param  Request  $request
     * @param  array  $guards
     *
     * @return void
     *
     * @throws AuthenticationException
     */
    protected function unauthenticated($request, array $guards): void
    {
        throw new AuthenticationException(
            __('api.exceptions.unauthenticated'),
            $guards,
            $this->redirectTo($request)
        );
    }
}
