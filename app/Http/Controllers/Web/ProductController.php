<?php

namespace App\Http\Controllers\Web;


use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SeoContent;
use App\Models\TopProduct;
use Illuminate\Log\Logger;
use Laracasts\Flash\Flash;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use App\Services\ProductService;
use App\Models\ProductDescription;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryFilterPrice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Repositories\Product\ProductRepository;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Repositories\Consultation\ConsultationRepository;
use App\Http\Requests\Consultation\ConsultationStoreRequest;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\ProductAttributeValue\ProductAttributeValueRepository;
use App\Models\ProductManual;
use App\Models\Policy;
use App\Models\Warranty;

class  ProductController extends Controller
{
    protected $service, $productAttributeValueRepository, $productRepo, $consulationRepo,
        $attributeValueRepo, $productDescriptionRepo, $policy;

    public function __construct(
        ProductService                  $service,
        ProductRepository               $productRepo,
        ProductAttributeValueRepository $productAttributeValueRepository,
        ConsultationRepository          $consulationRepo,
        AttributeValueRepository        $attributeValueRepo,
        ProductDescription              $productDescriptionRepo
    )
    {
        $this->service = $service;
        $this->productRepo = $productRepo;
        $this->productAttributeValueRepository = $productAttributeValueRepository;
        $this->consulationRepo = $consulationRepo;
        $this->attributeValueRepo = $attributeValueRepo;
        $this->productDescriptionRepo = $productDescriptionRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, $category = null, $price = null)
    {
        $item = $category;

        switch ($category) {
            case 'dong-ho-duoi-2-trieu':
                $products = $this->productRepo
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->where('price', '<', 2000000)
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            case 'dong-ho-2-5-trieu':
                $products = $this->productRepo
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->whereBetween('price', [2000000, 5000000])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            case 'dong-ho-5-10-trieu':
                $products = $this->productRepo
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->whereBetween('price', [5000000, 10000000])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            case 'dong-ho-10-20-trieu':
                $products = $this->productRepo
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->whereBetween('price', [10000000, 20000000])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            case 'dong-ho-20-50-trieu':
                $products = $this->productRepo
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->whereBetween('price', [20000000, 50000000])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            case 'dong-ho-50-100-trieu':
                $products = $this->productRepo
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->whereBetween('price', [50000000, 100000000])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                break;
            default:
                $categoryId = Category::where('slug', $category)->value('id');
                $products = Product::where('category_id', $categoryId)
                ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                ->orderBy('id', 'DESC')
                ->paginate(9);
                $brandId = $request->brand;
                if ($brandId != 0) {
                    $products = $products->where('brand_id', $brandId);
                }
                break;
        }
        $brandALL = Brand::where('slug', $category)->first();
        if($brandALL){
            $products = Product::where('brand_id', $brandALL->id)
            ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
            ->orderBy('id', 'DESC')
            ->paginate(9);
        }

        $apparatus = $this->service->getAttribution('kieu-may');
        if($apparatus)
        {
            foreach ($apparatus as $value){
                if($value["content"] == $item){
                    $products = Product::where('id', $value["product_id"])
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                }
            }
        }

        $wireType = $this->service->getAttribution('chat-lieu-day');
        if($wireType)
        {
            foreach ($wireType as $value){
                if($value["content"] == $item){
                    $products = Product::where('id', $value["product_id"])
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                }
            }
        }
        $glassMaterial = $this->service->getAttribution('chat-lieu-kinh');
        if($glassMaterial)
        {
            foreach ($glassMaterial as $value){
                if($value["content"] == $item){
                    $products = Product::where('id', $value["product_id"])
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                }
            }
        }
        $origin = $this->service->getAttribution('nguon-goc');
        if($origin)
        {
            foreach ($origin as $value){
                if($value["content"] == $item){
                    $products = Product::where('id', $value["product_id"])
                    ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
                }
            }
        }

        $brands = Brand::orderBy('position', 'ASC')->get();


        $brandId = $request->brand;
        $categoryPrices = CategoryFilterPrice::all();
        $seoContent = SeoContent::whereIn('entity_type', [SeoContent::SEO_PRODUCT])->first();
        $category = Category::where('slug', $category)->first();

        return view('web.products.list', compact('brands', 'categoryPrices', 'apparatus', 'wireType', 'glassMaterial', 'brandId', 'origin', 'products', 'price', 'request', 'category' ,'item'));
    }

    // public function show(Product $slug)
    // {
    //     $products= Product::where('slug' , $slug);
    //     dd($products);
    //     return view('web.products.box', ['products' => $products]);
    // }
    // Trong ProductController.php

    public function filter(Request $request, $category = null)
{
    // Lấy các giá trị filter được chọn từ yêu cầu
    $selectedFilters = $request->input('filterData.filter');
    $selectedFiltersPrice = $request->input('filterData.filterPrice');
    $sort = $request->input('sort');

    // Thực hiện logic lọc sản phẩm dựa trên các filter được chọn
    $filteredProducts = Product::query();

    if (!empty($category)) {
        $categoryId = Category::where('slug', 'LIKE', '%' . $category . '%')->first()->id;
        $filteredProducts->where('category_id', $categoryId);
    }

    if (!empty($selectedFilters)) {
        $filteredProducts->whereIn('brand_id', $selectedFilters);
    }

    if (!empty($selectedFiltersPrice)) {
        $range = explode('-', $selectedFiltersPrice[0]);
        $filteredProducts->whereBetween('compare_price', $range);
    }

    // Áp dụng sắp xếp
    if ($sort === 'price_asc') {
        $filteredProducts->orderBy('compare_price', 'asc');
    } elseif ($sort === 'price_desc') {
        $filteredProducts->orderBy('compare_price', 'desc');
    } elseif ($sort === 'newest') {
        $filteredProducts->orderBy('created_at', 'desc');
    } elseif ($sort === 'topproduct') {
        $filteredProducts = TopProduct::all();
    }

    // Lấy các sản phẩm đã lọc
    $products = $filteredProducts->paginate(6);

    // Trả về view với các sản phẩm đã lọc
    return response()->json(['products' => $products, 'category' => $category]);

}


    public function product(Request $request, $slug)
    {
        $products = $this->productRepo
            ->with(['images', 'brand', 'description'])
            ->where('slug', $slug)
            ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
            ->first();
        $warrantyId = $products->warranty_id;
        $warranty = Warranty::find($warrantyId);
       
        if (empty($products)) {
            return redirect()->route('home');
        }
        //xu ly thong tin san pham : productAttributeValues
        $productAttributeValues = $this->productRepo
            ->with('productAttributeValue.attributeValue')
            ->with('seoContents')
            ->find($products->id);
        $data = $productAttributeValues->toArray();
        $productAttributeValues = $data['product_attribute_value'];
        $productManual = ProductManual::all(); 
        // xu ly san pham da xem
        $viewed = session()->get('viewed');
        $viewed[] = $products->id;
        session()->put('viewed', $viewed);
        $viewed = session()->get('viewed');
        $viewed = array_slice($viewed, -6);
        $viewed = array_values(array_unique($viewed));
        $viewed = array_slice($viewed, -3);
        //san pham lien quan
        $targetPrice = $products->price;
        $productSuggess = $this->productRepo
            ->where('brand_id', $products->brand_id)
            ->orderByRaw('ABS(price - ?)', [$targetPrice])
            ->limit(8)
            ->get();
        //thong tin KM
        $promotion = $this->productDescriptionRepo->where('product_id', $products->id)->first();
        //category SP
        $category = Category::find($products->category_id);

        $policy = Policy::all();
        $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
        $policies = Policy::where('show_on_homepage', 1)->get();
        $logo = \App\Helper\FuncLib::getLogo();
        $phone = \App\Models\Contact::query()->first();
        $email = \App\Models\Contact::where('content','email')->first();
        
        return view('web.products.product_view')
            ->with('warranty', $warranty)
            ->with('products', $products)
            ->with('viewed', $viewed)
            ->with('request', $request)
            ->with('promotion', $promotion)
            ->with('category', $category)
            ->with('productSuggess', $productSuggess)
            ->with('productAttributeValues', $productAttributeValues)
            ->with('productManual', $productManual)
            ->with('policy', $policy)
            ->with('googleAnalyticsCode', $googleAnalyticsCode)
            ->with('policies', $policies)
            ->with('logo', $logo)
            ->with('phone', $phone)
            ->with('email', $email);
    }

    public function consulation(ConsultationStoreRequest $request)
    {
        $data = $request->validated();
        try {
            $this->consulationRepo->create($data);
            Flash::success('Cảm ơn bạn gửi thông tin cho chúng tôi ! chúng tôi sẽ liên hệ sớm nhất !');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function filterAttributes(Request $request)
    {
        $nonEmptyArrays = [];
        if (!empty($request->brand)) {
            $arrBrand = $request->brand;
            $Brand = $this->productRepo
                ->WhereIn('brand_id', $arrBrand)
                ->pluck('id')
                ->toArray();
            $nonEmptyArrays[] = $Brand;
        }

        if (!empty($request->size)) {
            $id = $this->attributeValueRepo->where('code', 'kich-co')->value('id');
            $arrSize = $request->size;
            $arrIdSize = [];
            foreach ($arrSize as $p) {
                switch ($p) {
                    case 'min':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->where('content', '<', 30)
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;
                    case '30m':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->whereBetween('content', [30, 34])
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;

                    case '35m':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->whereBetween('content', [35, 39])
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;
                    case '40m':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->whereBetween('content', [40, 43])
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;
                    case 'max':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->where('content', '>', 43)
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;
                    default:
                        break;
                }
            }
            $nonEmptyArrays[] = $arrIdSize;
        }

        if (!empty($request->price)) {
            $arrPrice = $request->price;
            $arrIdPrice = [];
            foreach ($arrPrice as $p) {
                switch ($p) {
                    case 'min':
                        $price = $this->productRepo
                            ->where('price', '<', 2000000)
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '2m':
                        $price = $this->productRepo
                            ->whereBetween('price', [2000000, 5000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;

                    case '3m':
                        $price = $this->productRepo
                            ->whereBetween('price', [5000000, 10000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '4m':
                        $price = $this->productRepo
                            ->whereBetween('price', [10000000, 20000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '5m':
                        $price = $this->productRepo
                            ->whereBetween('price', [20000000, 50000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '6m':
                        $price = $this->productRepo
                            ->whereBetween('price', [50000000, 100000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    default:
                        break;
                }
            }
            $nonEmptyArrays[] = $arrIdPrice;
        }

        if (!empty($request->glassMaterial)) {
            $arrGlassMaterial = $request->glassMaterial;
            $glassMaterial = $this->service->getIdProductAttributeValue('chat-lieu-kinh', $arrGlassMaterial);
            $nonEmptyArrays[] = $glassMaterial;
        }

        if (!empty($request->wireType)) {
            $arrWireType = $request->wireType;
            $wireType = $this->service->getIdProductAttributeValue('chat-lieu-day', $arrWireType);
            $nonEmptyArrays[] = $wireType;
        }

        if (!empty($request->apparatus)) {
            $arrApparatus = $request->apparatus;
            $apparatus = $this->service->getIdProductAttributeValue('kieu-may', $arrApparatus);
            $nonEmptyArrays[] = $apparatus;
        }

        if (!empty($request->origin)) {
            $arrOrigin = $request->origin;
            $origin = $this->service->getIdProductAttributeValue('nguon-goc', $arrOrigin);
            $nonEmptyArrays[] = $origin;
        }

        if ($request->sex == 'female') {
            $sex = 8;
        } elseif ($request->sex == 'male') {
            $sex = 7;
        } else {
            $sex = 17;
        }
        if (empty($nonEmptyArrays)) {
            switch ($request->sort) {
                case 'price_desc':
                    $data = $this->productRepo
                        ->where('category_id', $sex)
                        ->with('images')
                        ->orderBy('price', 'desc')
                        ->paginate(9);
                    break;
                case 'price_asc':
                    $data = $this->productRepo
                        ->where('category_id', $sex)
                        ->with('images')
                        ->orderBy('price', 'asc')
                        ->paginate(9);
                    break;
                case 'newest':
                    $data = $this->productRepo
                        ->where('category_id', $sex)
                        ->with('images')
                        ->latest()
                        ->paginate(9);
                    break;
                default:
                    $data = $this->productRepo
                        ->where('category_id', $sex)
                        ->with('images')
                        ->latest()
                        ->paginate(9);
                    break;
            }
        } else {
            $array = call_user_func_array('array_intersect', $nonEmptyArrays);
            if (!empty($request->sort)) {
                switch ($request->sort) {
                    case 'price_desc':
                        $data = $this->productRepo
                            ->where('category_id', $sex)
                            ->with('images')
                            ->whereIn('id', $array)
                            ->orderBy('price', 'desc')
                            ->paginate(9);
                        break;
                    case 'price_asc':
                        $data = $this->productRepo
                            ->where('category_id', $sex)
                            ->with('images')
                            ->whereIn('id', $array)
                            ->orderBy('price', 'asc')
                            ->paginate(9);
                        break;
                    case 'newest':
                        $data = $this->productRepo
                            ->where('category_id', $sex)
                            ->with('images')
                            ->whereIn('id', $array)
                            ->latest()
                            ->paginate(9);
                        break;
                    default:
                        $data = $this->productRepo
                            ->where('category_id', $sex)
                            ->with('images')
                            ->whereIn('id', $array)
                            ->latest()
                            ->paginate(9);
                        break;
                }
            }
        }

        return view('web.filter.ajax ', ['data' => $data]);
    }
}
