<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;

/**
 * @bodyParam name string required The name of the user. Example: John Doe
 * @bodyParam email string required The mail of the user. Example: john@doe.com
 * @bodyParam password string required The password of the user. Example: secret
 */
class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // If registering was globally disabled
        abort_if(true, Response::HTTP_LOCKED, trans('api.v1.auth.register.register_disabled'));

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|between:2,100',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Execute code after the validation passed.
     *
     * @param Validator $validator
     *
     * @return void
     */
    public function after(Validator $validator): void
    {
        $data = $validator->getData();
        $validator->setData(array_merge($data, [
            'password' => bcrypt($data['password'])
        ]));
    }
}
