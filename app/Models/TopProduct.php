<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class TopProduct
 * @package App\Models
 */

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
 *
 */
class TopProduct extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'top_products';

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
        'type',
        'group_id',
        'status',
        'position' ,
        # [/auto-gen-attribute]
    ];
}
