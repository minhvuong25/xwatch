<?php

namespace App\Http\Requests\Consultation;

class ConsultationStoreRequest extends ConsultationRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'product_id' => 'integer',
            'phone' => 'required|string|max:255|nullable',
            'deleted_at' => 'nullable|string',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string'
            # [/auto-gen-rules]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone' => 'nhập sai thông tin'
        ];
    }
}