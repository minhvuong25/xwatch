<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductCustomerColumn
 * @package App\Models
 */

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
 *
 */
class ProductCustomerColumn extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_customer_columns';

    /**
     * The primary key for the model.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        # [auto-gen-attribute]
        'product_type',
        'cloumn_name',
        'cloumn_code' ,
        # [/auto-gen-attribute]
    ];
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

	const PRODUCT_TYPE_DONGHO = 0; 
	const PRODUCT_TYPE_PHUKIEN = 1; 

	public static $aryProductType = [
		self::PRODUCT_TYPE_DONGHO => "Đồng Hồ",
		self::PRODUCT_TYPE_PHUKIEN => "Phụ Kiện",
	];

  

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_type' => 'boolean',
        'cloumn_name' => 'string',
        'cloumn_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_type' => 'required|boolean',
        'cloumn_name' => 'required|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
}
