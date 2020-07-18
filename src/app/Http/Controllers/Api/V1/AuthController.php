<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\TokenResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * @group  Authentication
 *
 * APIs for users's authentication
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except([
            'login',
            'register'
        ]);
    }

    /**
     * auth/login
     *
     * Get a JWT Token thought the given credentials.
     *
     * @responseFile responses/auth/login.json
     * @responseFile 403 responses/auth/login.403.json
     *
     * @param LoginRequest $request
     *
     * @return TokenResource
     */
    public function login(LoginRequest $request): TokenResource
    {
        $validated = $request->validated();

        if (!$token = auth('api')->attempt($validated)) {
            abort('403', trans('api.v1.auth.login.invalid_credentials'));
        }

        return new TokenResource($token);
    }

    /**
     * auth/register
     *
     * Register a new user.
     *
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\User
     *
     * @responseFile 423 responses/auth/register.423.json
     *
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return (new UserResource(User::create($request->validated())))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * auth/@me
     *
     * Get information about current authenticated user.
     *
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\User
     *
     * @authenticated
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return (new UserResource(auth('api')->user()))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * auth/logout
     *
     * Logout the user (Invalidate the token).
     *
     * @response 204 responses/auth/logout.204.json
     *
     * @authenticated
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * auth/refresh
     *
     * Refresh a token.
     *
     * @responseFile 200 responses/auth/refresh.json
     *
     * @authenticated
     *
     * @return TokenResource
     */
    public function refresh(): TokenResource
    {
        return new TokenResource(auth('api')->refresh());
    }
}
