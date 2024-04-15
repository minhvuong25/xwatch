<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


/**
 * Class BlogCategory
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $default_img
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class BlogCategory extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'category_blog';

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
        'title',
        'slug',
        'default_img' ,
        'parent_id',
        'main'
        # [/auto-gen-attribute]
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class, 'category_blog_id');
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($query) {
            $query->slug = Str::slug($query->title);
        });

        static::updating(function ($query) {
            $query->slug = Str::slug($query->title);
        });
    }

    public function categories()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->where('status', Category::CATEGORY_STATUS_IS_ACTIVE);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
