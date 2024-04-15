<?php

namespace App\Http\Requests\Customers;

class CustomersStoreRequest extends CustomersRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'customer_name' => 'required|string|max:255',
            'link_video' => 'nullable|string|max:255',
            'link_name' => 'nullable|string|max:255',
            'default_image' => '',
            'video_image' => '',
            'description' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
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
            # messages
        ];
    }
}