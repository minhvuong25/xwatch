<?php

namespace App\Http\Requests\ProductFlashSale;

class ProductFlashSaleStoreRequest extends ProductFlashSaleRequest
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
            'description' => 'nullable|string',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'deleted_at' => 'nullable|string'
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
