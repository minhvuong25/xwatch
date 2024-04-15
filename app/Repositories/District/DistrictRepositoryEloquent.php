<?php

namespace App\Repositories\District;

use App\Repositories\BaseRepository;
use App\Models\District;

/**
 * Class DistrictRepository
 * @package App\Repositories\District
 */
class DistrictRepositoryEloquent extends BaseRepository implements DistrictRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return District::class;
    }
}
