<?php

namespace App\Repositories\SeoContent;

use App\Models\SeoContent;
use App\Repositories\BaseRepository;
use App\Repositories\SeoContent\SeoContentRepository;

/**
 * Class ProductTagRepository
 * @package App\Repositories\ProductTag
 */
class SeoContentRepositoryEloquent extends BaseRepository implements SeoContentRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return SeoContent::class;
    }
}
