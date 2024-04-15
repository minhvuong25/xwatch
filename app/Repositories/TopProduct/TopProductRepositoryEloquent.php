<?php

namespace App\Repositories\TopProduct;

use App\Repositories\BaseRepository;
use App\Models\TopProduct;

/**
 * Class TopProductRepository
 * @package App\Repositories\TopProduct
 */
class TopProductRepositoryEloquent extends BaseRepository implements TopProductRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return TopProduct::class;
    }
}
