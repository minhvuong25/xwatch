<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class SeoContent
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property int $entity_id
 * @property int $entity_type
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $meta_des
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class SeoContent extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'seo_contents';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const SEO_CATEGORY = 0; //Top sản phẩm bán chạy cho dong ho
    const SEO_HOME_PAGE = 1; //Top sản phẩm bán chạy cho phu kien
    const SEO_PRODUCT = 2;
    const SEO_BRAND = 3;
    const SEO_STORE = 4;
    const SEO_NEWS = 5;

    public static $array_seo_type = [
        self::SEO_CATEGORY => "Category",
        self::SEO_HOME_PAGE => "Home page",
        self::SEO_PRODUCT => "Product",
        self::SEO_BRAND => "Brands",
        self::SEO_STORE => "Store",
        self::SEO_NEWS => "News",
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
        'entity_id',
        'entity_type',
        'meta_title',
        'meta_keyword',
        'meta_des' ,
        'deleted_at'
        # [/auto-gen-attribute]
    ];

    protected $casts = [
        'id' => 'integer',
        'entity_id' => 'integer',
        'entity_type' => 'integer',
        'meta_title' => 'string',
        'meta_keyword' => 'string',
        'meta_des' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'integer',
        'entity_type' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
}
