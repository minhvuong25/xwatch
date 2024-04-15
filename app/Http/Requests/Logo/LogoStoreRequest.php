<?php

namespace App\Http\Requests\Logo;

class LogoStoreRequest extends LogoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
           'source_url' => 'nullable',
           'status' => 'nullable'
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
        ];
    }
}
