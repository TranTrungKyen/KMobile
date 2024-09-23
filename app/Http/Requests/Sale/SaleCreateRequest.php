<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class SaleCreateRequest extends FormRequest
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
            'start_at' => 'required',
            'end_at' => 'required|after:start_at',
            'description' => 'required',
            'productDetailIds.*' => 'required',
            'prices.*' => [
                'required',
                'numeric',
                'min:100000',
            ],
            'discounts.*' => [
                'required',
                'numeric',
                'min:1',
                'max:99',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'start_at.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.start_at.required'),
            'end_at.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.end_at.required'),
            'end_at.after' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.end_at.after'),
            'description.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.description.required'),
            'productDetailIds.*.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.productDetailIds.required'),
            'prices.*.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.prices.required'),
            'prices.*.min' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.prices.min'),
            'discounts.*.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.discounts.required'),
            'discounts.*.min' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.discounts.min'),
            'discounts.*.max' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_sale_form.discounts.max'),
        ];
    }
}
