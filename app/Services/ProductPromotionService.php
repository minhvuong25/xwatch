<?php

namespace App\Services;

use App\Repositories\ProductPromotion\ProductPromotionRepository;



class ProductPromotionService
{
    // private $productPromotionRepo;
    // private $promotionNetsuiteRepository;
    // private $suiteScriptService;
    //promotion
    protected $productRepo;
    public function __construct(
        ProductPromotionRepository $productRepo, 
    )
    {
        $this->productRepo = $productRepo;
    }

    public function all()
    {
         return $this->productRepo->paginate(10);
    }


    public function find($id)
    {
         return $this->productRepo->find($id);
    }


    public function create($input)
    {
         return $this->productRepo->create($input);
    }


    public function update(int $id , array $input) 
    {
        $params = $this->productRepo->find($id);
        return $params->update($input);
    }
    
    public function delete($id)
    {
         return $this->productRepo->delete($id);
    }

    
}
