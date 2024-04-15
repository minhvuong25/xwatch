<?php

namespace App\Http\Requests\Order;

use App\Rules\ProductCheckItem;
use App\Http\Requests\FormRequest;


class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'Itemid' => [new ProductCheckItem()]
        ];
    }
    public function messages()
    {
        return [
            # messages
        ];
    }
}
