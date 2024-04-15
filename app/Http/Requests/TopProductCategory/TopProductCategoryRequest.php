<?php

namespace App\Http\Requests\TopProductCategory;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $category_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $type
 * [/auto-gen-property]
 */
class TopProductCategoryRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_id' => '',
            'category_id' => '',
            'created_at' => '',
            'updated_at' => '',
            'type' => ''
        ];
    }
}