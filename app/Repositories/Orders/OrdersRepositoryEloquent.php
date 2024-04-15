<?php

namespace App\Repositories\Orders;

use App\Models\Order;
use App\Models\Orders;
use App\Repositories\BaseRepository;

/**
 * Class OrdersRepository
 * @package App\Repositories\Orders
 */
class OrdersRepositoryEloquent extends BaseRepository implements OrdersRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Orders::class;
    }
}
