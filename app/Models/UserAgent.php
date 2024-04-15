<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class UserAgent
 * @package App\Models
 */

/**
 * [auto-gen-property]
 * @property int $id
 * @property string $agent_id
 * @property string $source
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * [/auto-gen-property]
 *
 */
class UserAgent extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'user_agents';

    /**
     * The primary key for the model.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';
    

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public static $arrDataSource = [
        "xwatch_complete_order",
        "find_loyalty_lead",
        "abandoned_cart",
        "optimonter_lead",
        "google_lead",
        "find_store_lead",
        "facebook_lead",
        "from_landing",
        "landing_page_form",
        "tragopOnline"
    ];

    protected $casts = [
        'id' => 'integer',
        'agent_id' => 'string',
        'source' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'agent_id' => 'required|string|max:191',
        'source' => 'required|string|max:191',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        # [auto-gen-attribute]
        'agent_id',
        'source' ,
        # [/auto-gen-attribute]
    ];
}
