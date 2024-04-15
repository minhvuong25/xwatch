<?php

namespace App\Http\Requests\Menus;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $position
 * @property string $url
 * @property string $class_name
 * @property string $id_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class MenusRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'parent_id' => '',
            'name' => '',
            'position' => '',
            'url' => '',
            'class_name' => '',
            'id_name' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}