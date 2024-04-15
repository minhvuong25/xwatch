<?php

namespace App\Repositories\ProductCustomerValue;

use App\Repositories\BaseRepository;
use App\Models\ProductCustomerValue;

/**
 * Class ProductCustomerValueRepository
 * @package App\Repositories\ProductCustomerValue
 */
class ProductCustomerValueRepositoryEloquent extends BaseRepository implements ProductCustomerValueRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductCustomerValue::class;
    }
}
