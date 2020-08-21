<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        // put exception here
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * All classes that should return a unauthorized message.
     *
     * @var string[]
     */
    protected $unauthorizedExceptions = [
        UnauthorizedException::class,
        AuthorizationException::class,
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request $request
     * @param Throwable $exception
     *
     * @return JsonResponse|Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson() && in_array(get_class($exception), $this->unauthorizedExceptions)) {
            return response()
                ->json([
                    'message' => __('api.exceptions.unauthorized.message')
                ], Response::HTTP_UNAUTHORIZED);
        }


        return parent::render($request, $exception);
    }
}
