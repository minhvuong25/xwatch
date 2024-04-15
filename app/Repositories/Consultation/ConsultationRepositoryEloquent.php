<?php

namespace App\Repositories\Consultation;

use App\Repositories\BaseRepository;
use App\Models\Consultation;

/**
 * Class ConsultationRepository
 * @package App\Repositories\Consultation
 */
class ConsultationRepositoryEloquent extends BaseRepository implements ConsultationRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Consultation::class;
    }
}
