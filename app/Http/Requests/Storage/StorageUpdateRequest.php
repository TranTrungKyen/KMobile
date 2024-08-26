<?php

namespace App\Http\Requests\Storage;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StorageUpdateRequest extends FormRequest
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
            'storage' => [
                'required',
                'max:50',
                Rule::unique('storages')->ignore($request->id)
                ],
        ];
    }

    public function messages(): array
    {
        return [
            'storage.required' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_storage_form.storage.required'),
            'storage.max' =>  __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_storage_form.storage.max'),
            'storage.unique' => __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_storage_form.storage.unique'),
        ];
    }
}
