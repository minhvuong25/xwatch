<?php

namespace App\Http\Requests\ProductCustomerValue;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_type
 * @property string $cloumn_name
 * @property string $cloumn_code
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 */
class ProductCustomerValueRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'product_type' => '',
            'cloumn_name' => '',
            'cloumn_code' => '',
            'created_at' => '',
            'updated_at' => '',
            'deleted_at' => ''
        ];
    }
}