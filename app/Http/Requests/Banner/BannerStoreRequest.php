<?php

namespace App\Http\Requests\Banner;

class BannerStoreRequest extends BannerRequest
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
            'path' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'slost' => 'required|integer',
            'status' => 'required|integer',
            'type' => 'integer',
            'created_at' => 'nullable|string',
            'updated_at' => 'nullable|string',
            'url' => 'nullable|string|max:500',
            'position' => 'integer',
            'deleted_at' => 'nullable|string',
            'default_imgage' => 'array',
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