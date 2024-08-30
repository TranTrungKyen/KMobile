<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ValidateImeiOrderDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imei' => ['required', 'array'], 
            'order_detail_id' => ['required', 'array'], 
            'imei.*' => ['required', 'distinct', 'max:20'], 
            'order_detail_id.*' => ['required'], 
        ];
    }

    public function messages(): array
    {
        return [
            'imei.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.required'),
            'imei.array' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.array'),
            'order_detail_id.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.order_detail_id.required'),
            'order_detail_id.array' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.order_detail_id.array'),
            'imei.*.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.required'),
            'imei.*.distinct' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.distinct'),
            'imei.*.max' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.imei.max'),
            'order_detail_id.*.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'confirm_order_form.order_detail_id.required'),
        ];
    }

    /**
     * Handle the validation and check each pair exists in the database.
     *
     * @return void
     */
    protected function passedValidation()
    {
        $imeis = $this->input('imei');
        $orderDetailIds = $this->input('order_detail_id');

        $validator = Validator::make([], []); 

        foreach ($imeis as $index => $imei) {
            $orderDetailId = $orderDetailIds[$index];
            $productDetailId = \App\Models\OrderDetail::where([
                ['id', '=', $orderDetailId],
            ])->first()->product_detail_id;

            $exists = \App\Models\Imei::where([
                ['imei', '=', $imei],
                ['product_detail_id', '=', $productDetailId],
                ['is_sold', '=', false] 
            ])->exists();

            if (!$exists) {
                $validator->errors()->add('imei.' . $index, "IMEI $imei không hợp lệ hoặc không tồn tại.");
            }
        }

        if ($validator->errors()->count() > 0) {
            throw new ValidationException($validator);
        }
    }
}

