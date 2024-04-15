<?php

namespace App\Http\Requests\Contact;

class ContactStoreRequest extends ContactRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            # [auto-gen-rules]
            'phone' => 'required|string|max:255',
            'content' => 'required|string|max:255',
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
            // 'source_url' => 'source_url required',
            // 'phone' => 'phone required',
            // 'content' => 'content required'
        ];
    }
}