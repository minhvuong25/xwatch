<?php

namespace App\Repositories\Customers;

use App\Repositories\BaseRepository;
use App\Models\Customers;

/**
 * Class CustomersRepository
 * @package App\Repositories\Customers
 */
class CustomersRepositoryEloquent extends BaseRepository implements CustomersRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Customers::class;
    }
}
