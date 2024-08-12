<?php

namespace App\Http\Requests\AdminUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'email' => [
                'required',
                'max:50',
                'email:rfc,dns',
                Rule::unique('users')->ignore($request->id),
            ],
            'name' => 'required|max:50',
            'role_id' => 'required',
            'phone' => 'max:11',
            'address' => 'max:100',
            'description' => 'max:255',
            'avatar' => 'image|mimes:png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.required'),
            'email.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.max'),
            'email.email' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.email'),
            'email.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.email.unique'),
            'password.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password.required'),
            'password.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password.max'),
            'password_confirm.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password_confirm.required'),
            'password_confirm.same' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password_confirm.same'),
            'password_confirm.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.password_confirm.max'),
            'name.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.name.required'),
            'name.max' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.name.max'),
            'role_id.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.role_id.required'),
            'phone.max' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.phone.max'),
            'address.max' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.address.max'),
            'description.max' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.description.max'),
            'avatar.image' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.avatar.image'),
            'avatar.mimes' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.avatar.mimes'),
            'avatar.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_user_form.avatar.max'),

        ];
    }
}
