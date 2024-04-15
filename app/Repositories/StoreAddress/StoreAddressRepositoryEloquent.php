<?php

namespace App\Repositories\StoreAddress;

use App\Repositories\BaseRepository;
use App\Models\StoreAddress;

/**
 * Class StoreAddressRepository
 * @package App\Repositories\StoreAddress
 */
class StoreAddressRepositoryEloquent extends BaseRepository implements StoreAddressRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return StoreAddress::class;
    }
}
