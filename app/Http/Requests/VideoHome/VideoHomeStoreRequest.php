<?php

namespace App\Http\Requests\VideoHome;

class VideoHomeStoreRequest extends VideoHomeRequest
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
            'description' => 'required|string|max:255',
            'alt' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'nullable',
            'status' => 'nullable|integer',
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