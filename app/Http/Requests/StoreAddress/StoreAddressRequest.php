<?php

namespace App\Http\Requests\StoreAddress;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string $description
 * @property string $lng
 * @property string $lat
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class StoreAddressRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'email' => '',
            'address' => '',
            'phone' => '',
            'description' => '',
            'lng' => '',
            'lat' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}