<?php

namespace App\Http\Requests\Label;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class LabelRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'name' => '',
            'code' => '',
            'img' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}