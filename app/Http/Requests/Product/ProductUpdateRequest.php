<?php

namespace App\Http\Requests\Product;


class ProductUpdateRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'name' => 'max:255',
            'price' ,
            'compare_price',
            'status' => 'integer',
            'description' => 'nullable',
            'default_img' => 'array',
            'type' => 'integer',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'sync_seo_content' => 'integer',
            'deleted_at' => 'nullable|string',
            'video_url' => 'nullable',
            'sku' => '',
            'category_id' => '',
            'brand_id' => '',
            'promotionalInformation' => 'nullable',
            'size' ,
            'ccessory_type',
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
  
        ];
    }
}
