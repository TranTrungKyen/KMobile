<?php

namespace App\Http\Requests\Color;

use Illuminate\Foundation\Http\FormRequest;

class ColorCreateRequest extends FormRequest
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
            'name' => 'required|max:50|unique:colors',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_color_form.name.required'),
            'name.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_color_form.name.max'),
            'name.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_color_form.name.unique'),
        ];
    }
}
