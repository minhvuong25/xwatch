<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Class Brand
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $homepage_active
 * @property string $slug
 * @property int $total_products
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class Brand extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'brands';

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

    const BRAND_STATUS_IS_ACTIVE = 1;
    const BRAND_STATUS_IS_DISABLE = 0;

    protected $fillable = [
        # [auto-gen-attribute]
        'name',
        'image',
        'homepage_active',
        'slug',
        'total_products',
        'status' ,
        'description',
        'position',
        # [/auto-gen-attribute]
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'slug' => 'string',
        'image' => 'string',
        'status' => 'integer',
        'total_products' => 'integer',
        'homepage_active' => 'integer'
    ];

    public static $status = [
        self::BRAND_STATUS_IS_ACTIVE => 'Active',
        self::BRAND_STATUS_IS_DISABLE => 'Disable',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'image' => 'nullable'
    ];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::creating(function ($query) {
            $query->slug = Str::slug($query->name);
        });

        static::updating(function ($query) {
            $query->slug = Str::slug($query->name);

        });
    }

}
