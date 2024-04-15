<?php

namespace App\Http\Requests\TopProduct;

class TopProductStoreRequest extends TopProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'product_id' => 'required|integer',
            'type' => 'required|integer',
            'group_id' => 'required|integer',
            'status' => 'required|integer',
            'position' => 'required|integer',
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
            # messages
        ];
    }
}