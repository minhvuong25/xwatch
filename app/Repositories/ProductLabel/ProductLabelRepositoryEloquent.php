<?php

namespace App\Repositories\ProductLabel;

use App\Repositories\BaseRepository;
use App\Models\ProductLabel;

/**
 * Class ProductLabelRepository
 * @package App\Repositories\ProductLabel
 */
class ProductLabelRepositoryEloquent extends BaseRepository implements ProductLabelRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ProductLabel::class;
    }
}
