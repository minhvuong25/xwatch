<?php

namespace App\Repositories\Label;

use App\Repositories\BaseRepository;
use App\Models\Label;

/**
 * Class LabelRepository
 * @package App\Repositories\Label
 */
class LabelRepositoryEloquent extends BaseRepository implements LabelRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Label::class;
    }
}
