<?php

namespace App\Repositories\Province;

use App\Repositories\BaseRepository;
use App\Models\Province;

/**
 * Class ProvinceRepository
 * @package App\Repositories\Province
 */
class ProvinceRepositoryEloquent extends BaseRepository implements ProvinceRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Province::class;
    }
}
