<?php

namespace App\Repositories\Bank;

use App\Repositories\BaseRepository;
use App\Models\Bank;

/**
 * Class BankRepository
 * @package App\Repositories\Bank
 */
class BankRepositoryEloquent extends BaseRepository implements BankRepository
{
    /**
     * Map model
     * @return mixed
     */
    public function model()
    {
        return Bank::class;
    }
}
