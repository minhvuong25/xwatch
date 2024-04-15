<?php

namespace App\Repositories\Ads;

use App\Repositories\BaseRepository;
use App\Models\Ads;

/**
 * Class AdsRepository
 * @package App\Repositories\Ads
 */
class AdsRepositoryEloquent extends BaseRepository implements AdsRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Ads::class;
    }
}
