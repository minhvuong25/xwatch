<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class OrderItem
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $product_variant_id
 * @property int $quantity
 * @property int $price
 * @property int $promotion_id
 * @property int $promotion_discount
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class OrderItem extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'order_items';

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
        'order_id',
        'product_id',
        'size',
        'quantity',
        'price',

        # [/auto-gen-attribute]
    ];

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

    public function order()
    {
        return $this->hasOne(Orders::class, "id", "order_id");
    }
    
    public function productVariant()
    {
        return $this->hasOne(ProductVariant::class, "id", "product_variant_id");
    }
}
