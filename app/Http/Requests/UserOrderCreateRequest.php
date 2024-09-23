<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserOrderCreateRequest extends FormRequest
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
            ],
            'user_name' => 'required|max:50',
            'phone' => 'required|max:11',
            'address' => 'required|max:100',
            'note' => 'max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.email.required'),
            'email.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.email.max'),
            'email.email' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.email.email'),
            'user_name.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.user_name.required'),
            'user_name.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.user_name.max'),
            'phone.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.phone.required'),
            'phone.numeric' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.phone.numeric'),
            'phone.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.phone.max'),
            'address.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.address.required'),
            'address.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.address.max'),
            'note.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_order_form.note.max'),
        ];
    }
}
