<?php

namespace App\Http\Requests\TopProduct;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $type
 * @property int $group_id
 * @property int $status
 * @property int $position
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class TopProductRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_id' => '',
            'type' => '',
            'group_id' => '',
            'status' => '',
            'position' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}