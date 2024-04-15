<?php

namespace App\Http\Requests\VideoHome;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $alt
 * @property string $link
 * @property string $image
 * @property int $status
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class VideoHomeRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'name' => '',
            'description' => '',
            'alt' => '',
            'link' => '',
            'image' => '',
            'status' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}