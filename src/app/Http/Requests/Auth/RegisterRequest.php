<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;
use Kotus\Settings\Facades\Settings;

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
        abort_if(
            ! (bool) Settings::get('user_registration'),
            Response::HTTP_LOCKED,
            __('api.v1.auth.register.register_disabled'),
        );

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
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/',  // must contain at least one special char
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // TODO: translation - Should contains at least 6 characters, one lowercase, one uppercase and one digit
            'password.regex' => __('api.v1.auth.register.password.regex.message'),
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
            'password' => bcrypt($data['password']),
        ]));
    }
}
