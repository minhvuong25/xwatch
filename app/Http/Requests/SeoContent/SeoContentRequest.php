<?php

namespace App\Http\Requests\SeoContent;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $entity_id
 * @property int $entity_type
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_des
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class SeoContentRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'entity_id' => '',
            'entity_type' => '',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_des' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}