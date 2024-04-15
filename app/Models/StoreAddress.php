<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class StoreAddress
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string $description
 * @property string $lng
 * @property string $lat
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class StoreAddress extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'store_address';

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
        'email',
        'address',
        'phone',
        'description',
        'province',
        'lng',
        'lat',
        'name',
        # [/auto-gen-attribute]
    ];

    public function provinces()
    {
        return $this->hasOne(Province::class, "province_id", "province");
    }
}
