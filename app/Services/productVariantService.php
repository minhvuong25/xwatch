<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\ProductVariant\ProductVariantRepository;

class productVariantService
{
     protected $productRepo;
     public function __construct(ProductVariantRepository $productRepo)
     {
          $this->productRepo = $productRepo;
     }

     public function getVariantByProductId($product_id) {
          return DB::table('product_variants')
          ->select(
              'product_variants.id',
              'product_variants.sku',
              'product_variants.name',
              'product_variants.price',
              'product_variants.status',
          //     DB::raw('sum(location_item.available_count) as available_count_total')
          )
          // ->leftJoin('location_item', 'product_variants.id', 'location_item.variant_id')
          // ->leftJoin('smile_retailer_address', 'location_item.location_id', 'smile_retailer_address.id')
          ->where('product_variants.product_id', $product_id)
          // ->where('smile_retailer_address.status', RetailerAddress::STORE_IS_AVAILABLE)
          ->groupBy('product_variants.id')
          ->get();
      }
}