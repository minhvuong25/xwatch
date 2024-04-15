<?php

namespace App\Services;

use App\Models\ProductLabel;
use App\Repositories\ProductLabel\ProductLabelRepository;

class ProductLabelService
{
    //agent
    protected $productLabelRepo;
    public function __construct(ProductLabelRepository $productLabelRepo)
    {
        $this->productLabelRepo = $productLabelRepo;
    }

    public function all()
    {
        return $this->productLabelRepo->all();
    }
    public function find($id)
    {
        return $this->productLabelRepo->find($id);
    }

    public function create($input)
    {
        return $this->productLabelRepo->create($input);
    }

    public function update(int $id, array $params)
    {
        $userAgent = $this->productLabelRepo->find($id);
        $userAgent->update($params);
        return $userAgent;
    }
    
    public function delete($id)
    {
        return $this->productLabelRepo->delete($id);
    }
}
