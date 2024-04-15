<?php

namespace App\Http\Requests\Menus;

class MenusStoreRequest extends MenusRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'parent_id' => 'nullable|integer',
            'name' => 'required|string|max:255|unique:menus,name',
            'position' => 'nullable|integer',
            'url' => 'nullable|string|max:500',
            'class_name' => 'nullable|string|max:500',
            'id_name' => 'nullable|string|max:150',
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