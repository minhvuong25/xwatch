<?php

namespace App\Http\Controllers\Web;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\SeoContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;

class AccessoryController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index($type = null)
    {
        if ($type == null) {
            $products = $this->productRepo
                ->where('status', '1')
                ->where('category_id', 18)
                ->with('images')
                ->orderBy('id', 'DESC')
                ->paginate(8);
        } else {
            $products = $this->productRepo
                ->where('status', '1')
                ->where('category_id', 18)
                ->with('images')
                ->orderBy('id', 'DESC')
                ->paginate(8);
            switch ($type) {
                case 'day-dong-ho':
                    $accessory_type = 1;
                    break;
                case 'khoa-dong-ho':
                    $accessory_type = 2;
                    break;
                case 'hop-dung-dong-ho':
                    $accessory_type = 3;
                    break;
                case 'hop-xoay-dong-ho':
                    $accessory_type = 4;
                    break;
                default:
                    $accessory_type = 0;
                    break;
            }
            if ($accessory_type != 0) {
                $products = $this->productRepo
                    ->where('status', '1')
                    ->where('category_id', 18)
                    ->where('ccessory_type', $accessory_type)
                    ->with('images')
                    ->orderBy('id', 'DESC')
                    ->paginate(8);
            }
        }
        $accessory = Category::where('slug', 'phu-kien')->first();
        $blogRelated = Blog::take(4)->get();
        return view('web.accessory.list', compact('products', 'blogRelated', 'accessory', 'type'));
    }
    public function filter(Request $request)
    {
        $nonEmptyArrays = [];
        if (!empty($request->type)) {
            $arrType = $request->type;
            $Type = $this->productRepo
                ->where('status', '1')
                ->WhereIn('ccessory_type', $arrType)
                ->pluck('id')
                ->toArray();
            $nonEmptyArrays[] = $Type;
        }
        if (!empty($request->price)) {
            $arrPrice = $request->price;
            $arrIdPrice = [];
            foreach ($arrPrice as $p) {
                switch ($p) {
                    case 'less500':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('price', '<', 500000)
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case '500to1m':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->whereBetween('price', [500000, 1000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;

                    case '1mto2m':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->whereBetween('price', [1000000, 2000000])
                            ->pluck('id')
                            ->toArray();
                        $arrIdPrice = array_merge($arrIdPrice, $price);
                        break;
                    case 'more2m':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('price', '>', 2000000)
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
        if (!empty($request->size)) {
            $arrSize = $request->size;
            $arrIdSize = [];
            foreach ($arrSize as $p) {
                switch ($p) {
                    case '12':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('size', 'LIKE', '%12%')
                            ->pluck('id')
                            ->toArray();
                        $arrIdSize = array_unique(array_merge($arrIdSize, $price));
                        break;
                    case '14':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('size', 'LIKE', '%14%')
                            ->pluck('id')
                            ->toArray();
                        $arrIdSize = array_unique(array_merge($arrIdSize, $price));
                        break;
                    case '16':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('size', 'LIKE', '%16%')
                            ->pluck('id')
                            ->toArray();
                        $arrIdSize = array_unique(array_merge($arrIdSize, $price));
                        break;
                    case '18':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('size', 'LIKE', '%18%')
                            ->pluck('id')
                            ->toArray();
                        $arrIdSize = array_unique(array_merge($arrIdSize, $price));
                        break;
                    case '20':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('size', 'LIKE', '%20%')
                            ->pluck('id')
                            ->toArray();
                        $arrIdSize = array_unique(array_merge($arrIdSize, $price));
                        break;
                    case '22':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('size', 'LIKE', '%22%')
                            ->pluck('id')
                            ->toArray();
                        $arrIdSize = array_unique(array_merge($arrIdSize, $price));
                        break;
                    case '24':
                        $price = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->where('size', 'LIKE', '%24%')
                            ->pluck('id')
                            ->toArray();
                        $arrIdSize = array_unique(array_merge($arrIdSize, $price));
                        break;
                    default:
                        break;
                }
            }
            $nonEmptyArrays[] = $arrIdSize;
        }
        if (empty($nonEmptyArrays)) {
            switch ($request->sort) {
                case 'price_desc':
                    $data = $this->productRepo
                        ->where('status', '1')
                        ->where('category_id', 18)
                        ->with('images')
                        ->orderBy('price', 'desc')
                        ->Paginate(8);
                    break;
                case 'price_asc':
                    $data = $this->productRepo
                        ->where('status', '1')
                        ->where('category_id', 18)
                        ->with('images')
                        ->orderBy('price', 'asc')
                        ->Paginate(8);
                    break;
                case 'newest':
                    $data = $this->productRepo
                        ->where('status', '1')
                        ->where('category_id', 18)
                        ->with('images')
                        ->latest()
                        ->Paginate(8);
                    break;
                default:
                    break;
            }
        } else {
            $array = call_user_func_array('array_intersect', $nonEmptyArrays);
            if (!empty($request->sort)) {
                switch ($request->sort) {
                    case 'price_desc':
                        $data = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->with('images')
                            ->whereIn('id', $array)
                            ->orderBy('price', 'desc')
                            ->Paginate(8);
                        break;
                    case 'price_asc':
                        $data = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->with('images')
                            ->whereIn('id', $array)
                            ->orderBy('price', 'asc')
                            ->Paginate(8);
                        break;
                    case 'newest':
                        $data = $this->productRepo
                            ->where('status', '1')
                            ->where('category_id', 18)
                            ->with('images')
                            ->whereIn('id', $array)
                            ->latest()
                            ->Paginate(8);
                        break;
                    default:
                        break;
                }
            }
        }
        return view('web.filter.ajax ', ['data' => $data]);
    }
}
