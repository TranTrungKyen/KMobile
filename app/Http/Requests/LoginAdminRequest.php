<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            'email' => 'required|max:255',
            'password' => 'required|max:50',
        ];
    }

    public function messages(): array
{
    return [
        'email.required' => 'Vui lòng nhập lại email',
        'email.max' => 'Vui lòng nhập lại email',
        'password.required' => 'Vui lòng nhập lại mật khẩu',
        'password.max' => 'Vui lòng nhập lại mật khẩu',
    ];
}
}
