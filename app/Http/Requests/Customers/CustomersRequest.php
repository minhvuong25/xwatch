<?php

namespace App\Http\Requests\Customers;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $customer_name
 * @property string $link_video
 * @property string $link_name
 * @property string $default_image
 * @property string $video_image
 * @property string $description
 * @property string $status
 * @property string $position
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class CustomersRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'customer_name' => '',
            'link_video' => '',
            'link_name' => '',
            'default_image' => '',
            'video_image' => '',
            'description' => '',
            'status' => '',
            'position' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}