<?php

namespace App\Http\Requests;

use App\Rules\CheckPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserChangePasswordRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'password' => ['required', new CheckPassword($request->password)],
            'new_password' => ['required', 'min:8', 'different:password'],
            'new_password_confirmation' => ['required', 'same:new_password'],
        ];
    }

    public function messages()
    {
        return [
            'password.required' => __('content.validate.backend.change_password_form.password.required'),
            'new_password.required' => __('content.validate.backend.change_password_form.new_password.required'),
            'new_password.min' => __('content.validate.backend.change_password_form.new_password.min'),
            'new_password.different' => __('content.validate.backend.change_password_form.new_password.different'),
            'new_password_confirmation.required' => __('content.validate.backend.change_password_form.new_password_confirmation.required'),
            'new_password_confirmation.same' => __('content.validate.backend.change_password_form.new_password_confirmation.same'),
        ];
    }
}
