<?php

namespace App\Repositories\TopProductCategory;

use App\Repositories\BaseRepository;
use App\Models\TopProductCategory;

/**
 * Class TopProductCategoryRepository
 * @package App\Repositories\TopProductCategory
 */
class TopProductCategoryRepositoryEloquent extends BaseRepository implements TopProductCategoryRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return TopProductCategory::class;
    }
}
