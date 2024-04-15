<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductPromotion
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $product_variant_id
 * @property string $product_variant_sku
 * @property int $discount_percent
 * @property int $discount_amount
 * @property int $base_price
 * @property int $promotion_price
 * @property int $status
 * @property int $confirm_status
 * @property int $start_date
 * @property int $end_date
 * @property int $cron_status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductPromotion extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_promotions';

    const PRODUCT_PROMOTION_STATUS_IS_ACTIVE = 1;
    const PRODUCT_PROMOTION_STATUS_IS_NOT_ACTIVE = -1;

    public static $aryPromotionStatus = [
        self::PRODUCT_PROMOTION_STATUS_IS_ACTIVE => "Active",
        self::PRODUCT_PROMOTION_STATUS_IS_NOT_ACTIVE => "Disable",
    ];
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
        'product_id',
        'product_variant_id',
        'product_variant_sku',
        'discount_percent',
        'discount_amount',
        'base_price',
        'promotion_price',
        'status',
        'confirm_status',
        'start_date',
        'end_date',
        'cron_status' ,
        # [/auto-gen-attribute]
    ];
    
    public static $rules = [
        'status' => 'required|integer',
    ];

    public function productVariant()
    {
        return $this->hasOne(ProductVariant::class, "id", "product_variant_id");
    }

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }
}
