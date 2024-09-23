<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email:rfc,dns|max:50|unique:users',
            'password' => 'required|min:8|max:20|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.name.required'),
            'name.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.name.max'),
            'email.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.email.required'),
            'email.email' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.email.email'),
            'email.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.email.max'),
            'email.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.email.unique'),
            'password.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.password.required'),
            'password.min' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.password.min'),
            'password.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.password.max'),
            'password.confirmed' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'login_form.password.confirmed'),
        ];
    }
}
