<?php

namespace App\Repositories\Logo;

use App\Repositories\BaseRepository;
use App\Models\Logo;

/**
 * Class LogoRepository
 * @package App\Repositories\Logo
 */
class LogoRepositoryEloquent extends BaseRepository implements LogoRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Logo::class;
    }
}
