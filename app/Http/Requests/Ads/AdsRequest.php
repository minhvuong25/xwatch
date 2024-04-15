<?php

namespace App\Http\Requests\Ads;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $link
 * @property int $status
 * @property int $position
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class AdsRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'title' => '',
            'image' => '',
            'link' => '',
            'status' => '',
            'position' => '',
            'description' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}