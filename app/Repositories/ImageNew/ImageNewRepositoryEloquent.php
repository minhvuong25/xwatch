<?php

namespace App\Repositories\ImageNew;

use App\Repositories\BaseRepository;
use App\Models\ImageNew;

/**
 * Class ImageNewRepository
 * @package App\Repositories\ImageNew
 */
class ImageNewRepositoryEloquent extends BaseRepository implements ImageNewRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return ImageNew::class;
    }
}
