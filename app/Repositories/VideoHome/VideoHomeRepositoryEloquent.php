<?php

namespace App\Repositories\VideoHome;

use App\Repositories\BaseRepository;
use App\Models\VideoHome;

/**
 * Class VideoHomeRepository
 * @package App\Repositories\VideoHome
 */
class VideoHomeRepositoryEloquent extends BaseRepository implements VideoHomeRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return VideoHome::class;
    }
}
