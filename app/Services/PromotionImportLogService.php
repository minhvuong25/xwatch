<?php

namespace App\Services;

use App\Repositories\PromotionImportLog\PromotionImportLogRepository;

class PromotionImportLogService
{
    protected $proRepo;
    public function __construct(PromotionImportLogRepository $proRepo)
    {
        $this->proRepo = $proRepo;
    }
    //code here
    public function all()
    {
        return $this->proRepo->paginate(10);
    }
    public function find($id)
    {
        return $this->proRepo->find($id);
    }
    public function create($input)
    {
        return $this->proRepo->create($input);
    }
    public function update(int $id , array $input)
    {
        $params = $this->proRepo->find($id);
        return $params->update($input);
    }
    public function delete($id)
    {
        return $this->proRepo->delete($id);
    }
}
