<?php

namespace App\Repositories\Wards;

use App\Repositories\BaseRepository;
use App\Models\Wards;

/**
 * Class WardsRepository
 * @package App\Repositories\Wards
 */
class WardsRepositoryEloquent extends BaseRepository implements WardsRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Wards::class;
    }
}
