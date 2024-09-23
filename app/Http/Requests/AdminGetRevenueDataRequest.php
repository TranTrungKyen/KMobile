<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminGetRevenueDataRequest extends FormRequest
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
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'start_date.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'statistical_form.start_date.required'),
            'end_date.required' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'statistical_form.end_date.required'),
            'end_date.after' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'statistical_form.end_date.after'),
        ];
    }
}
