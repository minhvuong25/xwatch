<?php

namespace App\Models;

use App\Models\Label;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ProductLabel
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $product_id
 * @property int $label_id
 * @property int $time_start
 * @property int $time_end
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class ProductLabel extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product_labels';

    /**
     * The primary key for the model.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'label_id' => 'integer',
        'time_start' => 'integer',
        'time_end' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'label_id' => 'required|integer',
        'time_start' => 'required',
        'time_end' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

    public function label()
    {
        return $this->hasOne(Label::class, 'id', "label_id");
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        # [auto-gen-attribute]
        'product_id',
        'label_id',
        'time_start',
        'time_end' ,
        # [/auto-gen-attribute]
        
    ];
}
