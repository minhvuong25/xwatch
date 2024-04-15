<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Customers
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $customer_name
 * @property string $link_video
 * @property string $link_name
 * @property string $default_image
 * @property string $video_image
 * @property string $description
 * @property string $status
 * @property string $position
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Customers extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'customers';

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
    const AN = 2;
    const HIEN = 1;
    
    public static $status = [
        self::AN => 'Ẩn',
        self::HIEN => 'Hiện',
    ];
    protected $fillable = [
        # [auto-gen-attribute]
        'customer_name',
        'link_video',
        'link_name',
        'default_image',
        'video_image',
        'description',
        'status',
        'position' ,
        # [/auto-gen-attribute]
    ];
}
