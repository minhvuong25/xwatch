<?php

namespace App\Http\Requests\Orders;

class OrdersStoreRequest extends OrdersRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'affiliate_user' => 'required|string|max:255',
            'phone_number' => 'required|string|max:50',
            'province_id' => 'required|integer',
            'district_id' => 'required|integer',
            'ward_id' => 'nullable|integer',
            'address' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:250',
            'amount' => 'nullable|integer',
            'created_by' => 'nullable|integer',
            'status' => 'nullable|integer',
            'payment_method' => 'nullable|integer',
            'payment_status' => 'nullable|integer',
            'type' => 'nullable|integer',
            'email' => 'nullable|string|max:255',
            // 'Itemid' => 'nullable|integer',
            'deleted_at' => 'nullable|string',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'total_price' => 'nullable',
            // order item
            'product_id'=>'nullable|integer',
            'size'=>'nullable|integer',
            'note' => 'nullable|string',


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