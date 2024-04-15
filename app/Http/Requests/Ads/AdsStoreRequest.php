<?php

namespace App\Http\Requests\Ads;

class AdsStoreRequest extends AdsRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'title' => 'required|string|max:255',
            'image' => 'required|max:255',
            'link' => 'required|string|max:255',
            'status' => 'nullable|integer',
            'position' => 'nullable|integer',
            'description' => 'required|string|max:1000',
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