<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|max:50',
            'password' => 'required|min:8|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.email.required'),
            'email.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.email.max'),
            'email.email' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.email.email'),
            'password.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.password.required'),
            'password.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.password.max'),
            'password.min' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.password.min'),
        ];
    }
}
