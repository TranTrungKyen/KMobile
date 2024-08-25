<?php

namespace App\Http\Requests;

use App\Models\ProductDetail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserAddToCartRequest extends FormRequest
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
            'product_detail_id' => 'required',
            'qty' => [
                'required',
                'numeric',
                'min:1',
                function($attribute, $value, $fail) {
                    $productDetail = ProductDetail::find($this->input('product_detail_id'));
    
                    if ($productDetail && $value > $productDetail->qty) {
                        $fail( __(VALIDATE_MESSAGE_URL['BACKEND'] . 'add_to_cart_form.qty.max') . $productDetail->qty);
                    }
                },
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'product_detail_id.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'add_to_cart_form.product_detail_id.required'),
            'qty.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'add_to_cart_form.qty.required'),
            'qty.numeric' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'add_to_cart_form.qty.numeric'),
            'qty.min' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'add_to_cart_form.qty.min'),
        ];
    }
}
