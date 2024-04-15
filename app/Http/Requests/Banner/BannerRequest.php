<?php

namespace App\Http\Requests\Banner;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $title
 * @property int $slost
 * @property int $status
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $url
 * @property int $position
 * @property string $deleted_at
 * @property string $default_imgage
 * [/auto-gen-property]
 */
class BannerRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'name' => '',
            'path' => '',
            'title' => '',
            'slost' => '',
            'status' => '',
            'type' => '',
            'created_at' => '',
            'updated_at' => '',
            'url' => '',
            'position' => '',
            'deleted_at' => '',
            'default_image' => ''
        ];
    }
}