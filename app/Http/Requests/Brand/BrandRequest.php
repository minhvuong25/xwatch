<?php

namespace App\Http\Requests\Brand;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $homepage_active
 * @property string $slug
 * @property int $total_products
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class BrandRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'brand_img' => '',
            'id' => '',
            'name' => '',
            'image' => '',
            'homepage_active' => '',
            'slug' => '',
            'total_products' => '',
            'status' => '',
            'position' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}