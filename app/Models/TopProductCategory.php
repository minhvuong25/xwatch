<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class TopProductCategory
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $category_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $type
 * [/auto-gen-property]
 *
 */
class TopProductCategory extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'top_product_in_category';

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
        'category_id',
        'type' ,
        # [/auto-gen-attribute]
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    const TOP_PRODUCT_HORIZONTAL = 1;
    const TOP_PRODUCT_VERTICAL = 2;
    
    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }
}
