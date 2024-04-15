<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Ads
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $link
 * @property int $status
 * @property int $position
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class Ads extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'ads';

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
    const POSITION_UP = 1;
    const POSITION_DOWN = 2;
    
    public static $position = [
        self::POSITION_UP => 'Trên',
        self::POSITION_DOWN => 'Dưới',
    ];
    const AN = 2;
    const HIEN = 1;
    
    public static $status = [
        self::AN => 'Ẩn',
        self::HIEN => 'Hiện',
    ];
    protected $fillable = [
        # [auto-gen-attribute]
        'title',
        'image',
        'link',
        'status',
        'position',
        'description' ,
        # [/auto-gen-attribute]
    ];
    public function index()
    {
        $ads = Ads::where('status', 1)
                    ->where('position', 1)
                    ->whereNull('deleted_at')
                    ->get();

        return view('web.home', compact('ads'));
    }
}
