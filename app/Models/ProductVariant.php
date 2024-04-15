<?php

namespace App\Models;

use App\Models\ProductPromotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductVariant
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $slug
 * @property string $sku
 * @property int $price
 * @property int $compare_price
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductVariant extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_variants';

    /**
     * The primary key for the model.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';
    
    const PRODUCT_STATUS_IS_ACTIVE = 1;
    const PRODUCT_STATUS_IS_DISABLE = 0;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public static $status = [
        self::PRODUCT_STATUS_IS_ACTIVE => 'Active',
        self::PRODUCT_STATUS_IS_DISABLE => 'Disable',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        # [auto-gen-attribute]
        'product_id',
        'name',
        'slug',
        'sku',
        'price',
        'compare_price' ,
        'status' 

        # [/auto-gen-attribute]
    ];
    
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }

    // public function promotion()
    // {
    //     return $this->hasOne(ProductPromotion::class, "product_variant_id", "id")
    //         ->where("status", ProductPromotion::PRODUCT_PROMOTION_STATUS_IS_ACTIVE);
    // }

    public function productAttributeValue()
    {
        return $this->hasMany(ProductAttributeValue::class, "product_variant_id", "id");
    }

    // public function locations()
    // {
    //     return $this->belongsToMany(RetailerAddress::class, 'location_item', 'variant_id', 'location_id');
    // }
}
