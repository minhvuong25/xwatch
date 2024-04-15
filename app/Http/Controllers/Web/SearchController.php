<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\SeoContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;

class SearchController extends Controller
{
    protected $productRepo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function search(Request $request)
    {
        // Get the selected filter values from the request
        $selectedFilters = $request->keyword;
        $query = $this->productRepo->where('name',"like" , '%'. $selectedFilters. '%');
        $products = $query->orderBy('id' , 'DESC')->paginate(20);
        $seoContent = SeoContent::whereIn('entity_type' , [SeoContent::SEO_PRODUCT])->first();
        return view('web.products.search', compact('products', 'selectedFilters', 'seoContent'));
    }
    
}
