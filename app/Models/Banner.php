<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Banner
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $title
 * @property int $slost
 * @property int $status
 * @property int $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $url
 * @property int $position
 * [/auto-gen-property]
 *
 */
class Banner extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'banner_hompage';
      const BANNER_STATUS_IS_ACTIVE = 1;
    const BANNER_STATUS_IS_NOT_ACTIVE = -1;

    const BANNER_IS_WEBSITE = 1;
    const BANNER_IS_MOBILE_WEB = 2;

    const BANNER_PAGE_TYPE_HOME = 0; //Trang chủ
    const BANNER_PAGE_TYPE_PRODUCT_DETAIL = 1; //Trang chi tiết
    const BANNER_PAGE_TYPE_INSTALLMENT_ONLINE = 2; //Trang  trả góp
    // const BANNER_PAGE_TYPE_FLASH_SALE = 4; //Trang flash sale

 

	

    public static $aryBannerType = [
        self::BANNER_PAGE_TYPE_HOME => "Trang chủ",
        self::BANNER_PAGE_TYPE_PRODUCT_DETAIL => "Trang chi tiết sản phẩm",
        self::BANNER_PAGE_TYPE_INSTALLMENT_ONLINE => "Trang trả góp online",
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

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
        'name',
        'path',
        'title',
        'slost',
        'status',
        'type',
        'url',
        'position',
        'default_image',
        # [/auto-gen-attribute]
    ];

    public static $rules = [
        'name'=> 'required',
        'path' => 'required',
        'title' => 'required|string|max:255',
        'slost' => 'required|integer',
        'status' => 'require',
        'type' => 'required',
        'url'=> 'required',
        'default_image'=> 'required',
        'position'=> 'required|integer',
    ];
}
