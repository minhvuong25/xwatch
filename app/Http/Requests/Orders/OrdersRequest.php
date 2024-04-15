<?php

namespace App\Http\Requests\Orders;

use App\Http\Requests\FormRequest;

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $affiliate_user
 * @property string $phone_number
 * @property int $province_id
 * @property int $district_id
 * @property int $ward_id
 * @property string $address
 * @property string $description
 * @property string $note
 * @property int $amount
 * @property int $created_by
 * @property int $status
 * @property int $payment_method
 * @property int $payment_status
 * @property int $type
 * @property string $email
 * @property int $Itemid
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 */
class OrdersRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function attributes()
    {
        return [
            'id' => '',
            'affiliate_user' => '',
            'phone_number' => '',
            'province_id' => '',
            'district_id' => '',
            'ward_id' => '',
            'address' => '',
            'description' => '',
            'amount' => '',
            'created_by' => '',
            'status' => '',
            'payment_method' => '',
            'payment_status' => '',
            'type' => '',
            'email' => '',
            'note' => '',
            'Itemid' => '',
            'deleted_at' => '',
            'created_at' => '',
            'updated_at' => ''
        ];
    }
}