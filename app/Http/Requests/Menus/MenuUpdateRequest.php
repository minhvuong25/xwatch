<?php

namespace App\Http\Requests\Menus;

class MenuUpdateRequest extends MenusRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
         return true;
     }
    public function rules() {
        return [
            # [auto-gen-rules]
            'parent_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
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


}
