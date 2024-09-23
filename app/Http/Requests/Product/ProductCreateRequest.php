<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => [
                'required',
                'max:50',
                'unique:products',
            ],
            'title' => [
                'required',
                'max:250',
                'unique:products',
            ],
            'description' => [
                'required',
            ],
            'brand_id' => [
                'required',
            ],
            'category_id' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.name.required'),
            'name.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.name.max'),
            'name.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.name.unique'),
            'title.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.title.required'),
            'title.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.title.max'),
            'title.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.title.unique'),
            'description.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.description.required'),
            'brand_id.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.brand_id.required'),
            'category_id.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_form.category_id.required'),
        ];
    }
}
