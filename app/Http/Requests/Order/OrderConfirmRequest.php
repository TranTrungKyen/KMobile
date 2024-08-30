<?php

namespace App\Http\Requests\Order;

use App\Models\OrderDetail;
use App\Rules\ImeiBelongsToProductDetail;
use Illuminate\Foundation\Http\FormRequest;

class OrderConfirmRequest extends FormRequest
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
        $productDetailId = OrderDetail::findOrFail($this->order_detail_id)->product_detail_id;
        return [
            'imei.*' => [
                'required',
                'distinct',
                'max:20',
            ],
            'order_detail_id.*' => [
                'required',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'imei.*.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.required'),
            'imei.*.distinct' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.distinct'),
            'imei.*.max' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.max'),
            'order_detail_id.*.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.order_detail_id.required'),
        ];
    }
}
