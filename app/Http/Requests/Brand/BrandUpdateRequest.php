<?php

namespace App\Http\Requests\Brand;

class BrandUpdateRequest extends BrandRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'image' => 'nullable|string|max:255',
            'homepage_active' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'total_products' => 'nullable|integer',
            'status' => 'nullable|integer',
            'brand_img' => 'nullable',
            'position' => 'nullable',
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