<?php

namespace App\Repositories\PromotionImportLog;

use App\Repositories\BaseRepository;
use App\Models\PromotionImportLog;

/**
 * Class PromotionImportLogRepository
 * @package App\Repositories\PromotionImportLog
 */
class PromotionImportLogRepositoryEloquent extends BaseRepository implements PromotionImportLogRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return PromotionImportLog::class;
    }
}
