<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Consultation
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $phone
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Consultation extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'free_consultation';

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
        'phone' ,
        'product_id'
        # [/auto-gen-attribute]
    ];
    public function product()
    {
        return $this->hasOne(Product::class, "product_id", "id");
    }
}
