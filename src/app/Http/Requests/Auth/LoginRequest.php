<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * class LoginRequest
 * @bodyParam email string required The mail of the user. Example: john@doe.com
 * @bodyParam password string required The password of the user. Example: secret
 */
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
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
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        // TODO: Handle translations
        return [
            'email.required' => 'An email is required',
            'email.email' => 'The email is not valid',
            'password' => 'A password is required',
        ];
    }
}
