<?php

namespace App\Repositories\UserAgent;

use App\Repositories\BaseRepository;
use App\Models\UserAgent;

/**
 * Class UserAgentRepository
 * @package App\Repositories\UserAgent
 */
class UserAgentRepositoryEloquent extends BaseRepository implements UserAgentRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return UserAgent::class;
    }
}
