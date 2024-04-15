<?php

namespace App\Http\Controllers\Client;

use App\Helper\FuncLib;
use App\Models\Policy;
use App\Models\Ads;
use App\Models\Product;
use App\Models\SeoContent;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Services\SeoContentService;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\ImageNew\ImageNewRepository;
use App\Repositories\VideoHome\VideoHomeRepository;
use App\Repositories\SeoContent\SeoContentRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\ProductAttributeValue\ProductAttributeValueRepository;

class HomeController extends Controller
{
    private $productRepo, $videoHomeRepo, $brandsRepo, $ordersRepo, $imageNewRepo, $provinceRepo, $categoryRepo,
        $seoContentRepo, $attributeValueRepo, $productAttributeValueRepository;

    public function __construct(
        BrandRepository $brandsRepo,
        ProductRepository $productRepo,
        OrdersRepository $ordersRepo,
        CategoryRepository $categoryRepo,
        SeoContentRepository $seoContentRepo,
        AttributeValueRepository $attributeValueRepo,
        ProductAttributeValueRepository $productAttributeValueRepository,
        VideoHomeRepository $videoHomeRepo,
        ImageNewRepository $imageNewRepo
    )
    {
        $this->productAttributeValueRepository = $productAttributeValueRepository;
        $this->ordersRepo = $ordersRepo;
        $this->productRepo = $productRepo;
        $this->brandsRepo = $brandsRepo;
        $this->categoryRepo = $categoryRepo;
        $this->seoContentRepo = $seoContentRepo;
        $this->attributeValueRepo = $attributeValueRepo;
        $this->videoHomeRepo = $videoHomeRepo;
        $this->imageNewRepo = $imageNewRepo;
    }

    public function index(Request $request)
    {
        $oldData = [];
        $dataCheckFilter = 1;
        $dataCheckFilter1 = 1;
        $dataFilter = $this->productRepo
            ->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
            ->orderBy('id', 'DESC')
            ->paginate(4);
        if (isset($request->checkFilter)) {
            $oldData = [
                'brand' => $request->filterBrand,
                'size' => $request->filterSize,
                'price' => $request->filterPrice,
                'wireType' => $request->filterWireType,
            ];
            $nonEmptyArrays = [];
            if (isset($request->filterBrand)) {
                $Brand = $this->productRepo
                    ->Where('brand_id', $request->filterBrand)
                    ->pluck('id')
                    ->toArray();
                $nonEmptyArrays[] = $Brand;
            }
            if (isset($request->filterSize)) {
                $id = $this->attributeValueRepo
                    ->where('code', 'kich-co')
                    ->value('id');
                $arrSize = $request->filterSize;
                $arrIdSize = [];
                switch ($arrSize) {
                    case 'less30':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->where('content', '<', 30)
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;
                    case '30to34':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->whereBetween('content', [30, 34])
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;

                    case '35to39':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->whereBetween('content', [35, 39])
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;
                    case '40to43':
                        $size = $this->productAttributeValueRepository
                            ->where('attribute_value_id', $id)
                            ->whereBetween('content', [40, 43])
                            ->pluck('product_id')
                            ->toArray();
                        $arrIdSize = array_merge($arrIdSize, $size);
                        break;
                    case 'greater43':
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
                $nonEmptyArrays[] = $arrIdSize;
            }
            if (isset($request->filterPrice)) {
                $arrPrice = $request->filterPrice;
                $arrIdPrice = [];
                switch ($arrPrice) {
                    case 'less2m':
                        $price = $this->productRepo
                            ->where('price', '<', 2000000)
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '2mto5m':
                        $price = $this->productRepo
                            ->whereBetween('price', [2000000, 5000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;

                    case '5mto10m':
                        $price = $this->productRepo
                            ->whereBetween('price', [5000000, 10000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '10mto20m':
                        $price = $this->productRepo
                            ->whereBetween('price', [10000000, 20000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '20mto50m':
                        $price = $this->productRepo
                            ->whereBetween('price', [20000000, 50000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '50mto100m':
                        $price = $this->productRepo
                            ->whereBetween('price', [50000000, 100000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    default:
                        break;
                }
                $nonEmptyArrays[] = $arrIdPrice;
            }
            if (isset($request->filterWireType)) {
                $arrWireType = $request->filterWireType;
                $wireType = $this->getIdProductAttributeValue('chat-lieu-day', $arrWireType);
                $nonEmptyArrays[] = $wireType;
            }
            $dataCheckFilter1 = 0;
            if (!empty($nonEmptyArrays)) {
                $array = call_user_func_array('array_intersect', $nonEmptyArrays);
                $dataFilter = $this->productRepo
                    ->with('images')
                    ->whereIn('id', $array)
                    ->paginate(4, ['*'], 'dataFilter')
                    ->appends(request()->except('dataFilter'));
            } else {
                $dataCheckFilter = 0;
            }
        }
        // dd($nonEmptyArrays);
        $id = $this->attributeValueRepo->where('code', 'chat-lieu-day')->value('id');
        $query = $this->attributeValueRepo
            ->where('id', $id)
            ->with('ProductAttributeValue')
            ->first();
        $query = $query->toarray()['product_attribute_value'];
        $collection = Collection::make($query);
        $wireType = $collection->unique('content')->values();
        $seoContent = $this->seoContentRepo->whereIn('entity_type', [SeoContent::SEO_HOME_PAGE])->first();
        $products = Product::
        whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])
            ->orderBy('id', 'DESC')
            ->paginate(8, ['*'], 'second_model')
            ->appends(request()->except('second_model'));
        $videos = $this->videoHomeRepo->get()->last();
        $imageNew = $this->imageNewRepo->get()->last();

        $categorySpecial = $this->categoryRepo->where('is_special', 1)->first();
        $category = $this->categoryRepo
            ->where('is_home', 1)
            ->where('id', '!=', $categorySpecial->id)
            ->where('parent_id', 0)->get();
        $customer = Customers::whereIn('status', [Ads::HIEN])->paginate(3);
        $imageUp = Ads::whereIn('status', [Ads::HIEN])->WhereIn('position', [Ads::POSITION_UP])->get()->last();
        $imageDown = Ads::whereIn('status', [Ads::HIEN])->WhereIn('position', [Ads::POSITION_DOWN])->get()->last();
        $policies = Policy::where('show_on_homepage', 1)->get();
        $banners = FuncLib::getBanner();
        $blog = FuncLib::getBlog();
        $getManBlogCategry = FuncLib::getManBlogCategry();
        $brands = FuncLib::getBrands();
        $logo = FuncLib::getLogo();
        $phone = \App\Models\Contact::query()->first();
        $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
        return view('web.home',
            [
                'videos' => $videos,
                'products' => $products,
                'slug' => '',
                'imageUp' => $imageUp,
                'imageDown' => $imageDown,
                'seoContent' => $seoContent,
                'request' => $request,
                'customer' => $customer,
                'wireType' => $wireType,
                'dataFilter' => $dataFilter,
                'dataCheckFilter' => $dataCheckFilter,
                'dataCheckFilter1' => $dataCheckFilter1,
                'oldData' => $oldData,
                'imageNew' => $imageNew,
                'dataCategory' => $category,
                'categorySpecial' => $categorySpecial,
                'policies' => $policies,
                'banners' => $banners,
                'blog' => $blog,
                'getManBlogCategry' => $getManBlogCategry,
                'brands' => $brands,
                'logo' => $logo,
                'phone' => $phone,
                'googleAnalyticsCode' => $googleAnalyticsCode,
            ]);
    }

    public function category($slug, Request $request)
    {
        $id = $this->attributeValueRepo->where('code', 'chat-lieu-day')->value('id');
        $query = $this->attributeValueRepo
            ->where('id', $id)
            ->with('ProductAttributeValue')
            ->first();
        $categorySpecial = $this->categoryRepo->where('is_special', 1)->first();

        $dataCategory = $this->categoryRepo
            ->where('is_home', 1)
            ->where('id', '!=', $categorySpecial->id)
            ->where('parent_id', 0)->take(2)->get();


        $query = $query->toarray()['product_attribute_value'];
        $collection = Collection::make($query);
        $wireType = $collection->unique('content')->values();
        $category = $this->categoryRepo->where('slug', $slug)->first();
        $dataFilter = $this->productRepo->whereIn('status', [Product::PRODUCT_STATUS_IS_ACTIVE])->paginate(4);
        $videos = $this->videoHomeRepo->get()->last();
        $imageNew = $this->imageNewRepo->get()->last();
        $customer = Customers::whereIn('status', [Ads::HIEN])->paginate(3);
        $imageUp = Ads::whereIn('status', [Ads::HIEN])->WhereIn('position', [Ads::POSITION_UP])->get()->last();
        $imageDown = Ads::whereIn('status', [Ads::HIEN])->WhereIn('position', [Ads::POSITION_DOWN])->get()->last();
        $policies = Policy::where('show_on_homepage', 1)->get();
        $banners = FuncLib::getBanner();
        $blog = FuncLib::getBlog();
        $getManBlogCategry = FuncLib::getManBlogCategry();
        $brands = FuncLib::getBrands();
        $logo = FuncLib::getLogo();
        $phone = \App\Models\Contact::query()->first();
        $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
        $products = $this->productRepo
            ->with('category')
            ->select('product.*')
            ->where('product.category_id', '=', $category->id)
            ->paginate(8);
        return view('web.home',
            [
                'products' => $products,
                'slug' => $slug,
                'imageUp' => $imageUp,
                'imageDown' => $imageDown,
                'request' => $request,
                'imageNew' => $imageNew,
                'customer' => $customer,
                'wireType' => $wireType,
                'dataFilter' => $dataFilter,
                'videos' => $videos,
                'dataCategory' => $dataCategory,
                'categorySpecial' => $categorySpecial,
                'policies' => $policies,
                'banners' => $banners,
                'blog' => $blog,
                'getManBlogCategry' => $getManBlogCategry,
                'brands' => $brands,
                'logo' => $logo,
                'phone' => $phone,
                'googleAnalyticsCode' => $googleAnalyticsCode,
            ]);
    }

    public function brands()
    {
        $listBrands = $this->brandsRepo->all();
        $listAlphabet = range('a', 'z');
        return view('web.brands', ['listAlphabet' => $listAlphabet, 'listBrands' => $listBrands]);
    }

    public function getBrands(Request $request)
    {
    }

    public function sendConfirmMail()
    {
        $order = $this->ordersRepo
            ->with('province', 'district', 'ward')
            ->with('items.product.images')
            ->find(51);
        Mail::send('emails.order_email_confirm', compact('order'), function ($email) use ($order) {
            $email->to("$order->email", "$order->phone_number");
        });
    }

    public function sendConfirmMailTest()
    {
        $order = $this->ordersRepo
            ->with('province', 'district', 'ward')
            ->with('items.product.images')
            ->find(53);
        return view('emails.order_email_confirm_test', compact('order'));
    }

    public function getIdProductAttributeValue($code, $array)
    {
        $id = $this->attributeValueRepo->where('code', $code)->value('id');
        return $this->productAttributeValueRepository
            ->Where('attribute_value_id', $id)
            ->Where('content', $array)
            ->pluck('product_id')
            ->toArray();
    }
}
