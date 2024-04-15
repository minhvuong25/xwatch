<?php
namespace App\Services;

use App\Repositories\ProductCustomerColumn\ProductCustomerColumnRepository;


class ProductCustomerColumnService
{
     protected $productRepo;
     public function __construct(ProductCustomerColumnRepository $productRepo)
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


     protected $fieldSearchable = [
          'product_type',
          'cloumn_name',
          'cloumn_code'
      ];
  
      /**
       * Return searchable fields
       *
       * @return array
       */
      public function getFieldsSearchable()
      {
          return $this->fieldSearchable;
      }
  
      /**
       * Configure the Model
       **/
      public function model()
      {
          return ProductCustomerColumn::class;
      }
}


