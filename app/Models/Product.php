<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


/**
 * Class Product
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $sku
 * @property string $name
 * @property string $slug
 * @property int $price
 * @property int $compare_price
 * @property int $status
 * @property string $description
 * @property string $default_img
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property int $sync_seo_content
 * @property int $promotion_price
 * @property int $product_promotion_id
 * @property string $deleted_at
 * [/auto-gen-property]
 *
 */
class Product extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'product';

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
        'sku',
        'name',
        'slug',
        'price',
        'compare_price',
        'warranty_id',
        'status',
        'description',
        'default_img',
        'type',
        'sync_seo_content',
        'promotion_price',
        'product_promotion_id' ,
        'brand_id' ,
        'category_id' ,
        'size' ,
        'promotional_information',
        'ccessory_type'
        # [/auto-gen-attribute]
    ];

    const PRODUCT_STATUS_IS_ACTIVE = 1;
    const PRODUCT_STATUS_IS_DISABLE = 2;
    // const PRODUCT_STATUS_IS_PENDING = 3;

    const STOCKING = 1;
    const OUT_STOCK = 2;

    const ACTIVE_PRE_ORDER = 1;
    const INACTIVE_PRE_ORDER = 0; 
    const TYPE_CRAWLER = 1;

    public static $status = [
        self::PRODUCT_STATUS_IS_ACTIVE => 'Active',
        self::PRODUCT_STATUS_IS_DISABLE => 'Disable',
        // self::PRODUCT_STATUS_IS_PENDING => 'Pending',
    ];
    
    const DAY_DONG_HO = 1;
    const KHOA_DONG_HO = 2;
    const HOP_DUNG_DONG_HO = 3;
    const HOP_XOAY_DONG_HO = 4;
    
    public static $ccessory_type = [
        self::DAY_DONG_HO => 'Dây đồng hồ',
        self::KHOA_DONG_HO => 'Khoá đồng hồ',
        self::HOP_DUNG_DONG_HO => 'Hộp đựng đồng hồ',
        self::HOP_XOAY_DONG_HO => 'Hộp xoay đồng hồ',
    ];

    public static $type = [
        self::STOCKING => 'Còn Hàng',
        self::OUT_STOCK => 'Hết Hàng',
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

    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }
    public function categorySlug()
    {
        return $this->hasOne(Category::class, "id", "slug");
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, "id", "brand_id");
    }

    public function warranty(){
        return $this->belongsTo(Warranty::class,"id","warranty_id");
    }

    public function description()
    {
        return $this->hasOne(ProductDescription::class, "product_id", "id");
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, "product_id", "id")->where('status', ProductVariant::PRODUCT_STATUS_IS_ACTIVE);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, "product_id", "id");
    }
    public function activeImage()
    {
        return $this->hasOne(ProductImage::class, "product_id", "id")->where('type', ProductImage::PRODUCT_IMAGE_TYPE_IS_AVATAR);
    }

    public function productAttributeValue()
    {
        return $this->hasMany(ProductAttributeValue::class, "product_id", "id");
    }

    public function productPromotion()
    {
        return $this->hasOne(ProductPromotion::class, "id", "product_promotion_id");
    }
    public function activesPromotion()
    {
        return $this->hasOne(ProductPromotion::class, "id", "product_promotion_id")->where("status", ProductPromotion::PRODUCT_PROMOTION_STATUS_IS_ACTIVE);
    }
    public function variantActive()
    {
        return $this->hasOne(ProductVariant::class, "id", "variant_active_id");
    }
    public function tags()
    {
        return $this->hasMany(ProductTag::class, "product_id", "id");
    }

    public function avatar()
    {
        return $this->hasOne(ProductImage::class, "product_id", "id")->where("type", ProductImage::PRODUCT_IMAGE_TYPE_IS_AVATAR);
    }

    public function productLabels()
    {
        return $this->hasMany(ProductLabel::class, "product_id", "id")->where("time_end", ">", time());
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'entity_id', 'id')
            ->where('entity_type', Review::REVIEW_ENTITY_TYPE_PRODUCT)
            ->where('status', Review::REVIEW_STATUS_ACTIVE)
            ->where('rating', '<=', Review::RATE_5)
            ->orderBy('img_review', 'DESC')
            ->orderBy('id', 'DESC');
    }

    public function seoContents()
    {
        return $this->hasOne(SeoContent::class, "entity_id", "id")->where("entity_type", SeoContent::SEO_PRODUCT);
    }
}
