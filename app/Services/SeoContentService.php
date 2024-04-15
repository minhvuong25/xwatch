<?php

namespace App\Services;

use Flash;
use App\Models\SeoContent;
use App\Repositories\SeoContent\SeoContentRepository;
use Illuminate\Support\Facades\Cache;

class SeoContentService
{
     protected $seoRepository;

     public function __construct(SeoContentRepository $seoRepository)
     {
          $this->seoRepository = $seoRepository;
     }

     public function data()
     {
          $seoContent = $this->seoRepository->paginate(10);
          return $seoContent;
     }

     public function create($input)
     {
          return $this->seoRepository->create($input);
     }
     public function find($id)
     {
          return $this->seoRepository->find($id);
     }

     public function destroy(int $id)
     {
         $seoContent = $this->seoRepository->find($id);
         if (empty($seoContent)) {
             \Flash::error('Không tìm thấy địa chỉ');
             return;
         }
         $seoContent->delete($id);
         return null;
     }

     public function update(int $id, array $input)
     {
          $seoContent = $this->seoRepository->find($id);
          return $seoContent->update($input);
     }



     protected $fieldSearchable = [
          'entity_id',
          'entity_type',
          'meta_title',
          'meta_keyword',
          'meta_des'
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
          return SeoContent::class;
     }

     public static function getSeoContent($entity_type, $entity_id = 0)
     {
          $key = 'cache_key_seo_content_' . $entity_id . "_" . $entity_type;
          $content = Cache::remember($key, 84600, function () use ($entity_id, $entity_type) {
               $query = SeoContent::where("entity_type", $entity_type);
               if ($entity_id)
                    $query = $query->where("entity_id", $entity_id);

               return $query->first();
          });

          return $content;
     }
}
