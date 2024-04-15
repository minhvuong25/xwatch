<?php

namespace App\Http\Requests\Logo;

use App\Http\Requests\FormRequest;
use App\Models\Logo;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $source_url
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class LogoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'id' => '',
            'source_url' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}