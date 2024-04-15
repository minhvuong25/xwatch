<?php
namespace App\Services;

use App\Repositories\ProductBestSeller\ProductBestSellerRepository;

class ProductBestSellerService
{
     protected $productRepo;
     public function __construct(ProductBestSellerRepository $productRepo)
     {
          $this->productRepo = $productRepo;
     }

     public function all()
     {
          return $this->productRepo->all();
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


