<?php

namespace App\Http\Requests\Product;

use App\Rules\CheckNameUnique;

class ProductStoreRequest extends ProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'name' => 'required|max:255|unique:product,name',
            'price' ,
            'compare_price',
            'status' => 'required|integer',
            'description' => 'nullable',
            'default_img' => 'array',
            'type' => 'integer',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'sync_seo_content' => 'integer',
            'deleted_at' => 'nullable|string',
            'video_url' => 'nullable',
            'sku' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
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
            'name.unique' => 'Trung ten san pham',
            'name.required' => 'Name is required',
            'price.required' => 'Price is required',
           'status.required' => 'Status is required',
           'description.required' => 'Description is required',
           'default_img.required' => 'Default image is required',
           'type.required' => 'Type is required',
            'sync_seo_content.interger' => 'seo content is required',
            'video_url.nullable' => 'link video ko dc de trong',
            'category_id' => 'category_id required',
            'brand_id' => 'brand_id required',
            'size' => 'size phải là số',
        ];
    }
}
