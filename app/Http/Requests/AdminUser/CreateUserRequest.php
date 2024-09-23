<?php

namespace App\Http\Requests\AdminUser;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => [
                'required',
                'max:50',
                'email:rfc,dns',
                'unique:users',
            ],
            'password' => 'required|max:20',
            'password_confirm' => 'required|same:password|max:20',
            'name' => 'required|max:50',
            'phone' => 'max:11',
            'address' => 'max:100',
            'description' => 'max:255',
            'avatar' => 'image|mimes:png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.required'),
            'email.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.max'),
            'email.email' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.email'),
            'email.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.unique'),
            'password.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password.required'),
            'password.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password.max'),
            'password_confirm.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password_confirm.required'),
            'password_confirm.same' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password_confirm.same'),
            'password_confirm.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password_confirm.max'),
            'name.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.name.required'),
            'name.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.name.max'),
            'phone.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.phone.max'),
            'address.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.address.max'),
            'description.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.description.max'),
            'avatar.image' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.avatar.image'),
            'avatar.mimes' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.avatar.mimes'),
            'avatar.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.avatar.max'),

        ];
    }
}
