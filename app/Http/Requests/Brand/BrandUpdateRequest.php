<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'max:50',
                Rule::unique('brands')->ignore($request->id),
            ],
            'path' => 'required|image|mimes:png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'update_brand_form.name.required'),
            'name.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'update_brand_form.name.max'),
            'name.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'update_brand_form.name.unique'),
            'path.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'update_brand_form.path.required'),
            'path.image' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'update_brand_form.path.image'),
            'path.mimes' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'update_brand_form.path.mimes'),
            'path.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'update_brand_form.path.max'),
        ];
    }
}
