<?php

namespace App\Services;

use App\Helper\FuncLib;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Support\Collection;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Repositories\ProductImage\ProductImageRepository;
use App\Repositories\CategoryBrand\CategoryBrandRepository;
use App\Repositories\AttributeValue\AttributeValueRepository;
use App\Repositories\ProductVariant\ProductVariantRepository;
use App\Repositories\ProductAttributeValue\ProductAttributeValueRepository;

class ProductService
{
    private $productAttributeValueRepo;
    private $attributeValueRepo;
    private $productRepository;
    private $productVariantRepository;
    private $brandRepo, $categoryRepo, $categoryBrandRepo;
    private $imageRepo;

    public function __construct(
        ProductRepository $productRepository,
        ProductVariantRepository $productVariantRepository,
        BrandRepository $brandRepo,
        CategoryRepository $categoryRepo,
        CategoryBrandRepository $categoryBrandRepo,
        ProductImageRepository $productImageRepository,
        ProductAttributeValueRepository $productAttributeValueRepository,
        AttributeValueRepository $attributeValueRepository
    )
    {
        $this->productAttributeValueRepo = $productAttributeValueRepository;
        $this->attributeValueRepo = $attributeValueRepository;
        $this->productRepository = $productRepository;
        $this->productVariantRepository = $productVariantRepository;
        $this->brandRepo = $brandRepo;
        $this->categoryRepo = $categoryRepo;
        $this->categoryBrandRepo = $categoryBrandRepo;
        $this->imageRepo = $productImageRepository;
    }

    public function getData(array $request)
    {
        $brands = $this->brandRepo->all();
        $category = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($category->toArray());

        $query = $this->productRepository->with(['brand', 'variants', 'images' , "category"]);
        // dd($query);


        if (isset($request["status"]) && $request["status"] > 0)
            $query = $query->where("status", $request["status"]);


        if (isset($request['category_id'])  && $request['category_id'] >= 0) {
            $category = $this->categoryRepo->find($request['category_id']);

            $categoryBrand = $this->categoryBrandRepo->where('category_id', $request['category_id'])
                ->get('brand_id')->toArray();

            $brands = $this->brandRepo->whereIn('id', $categoryBrand)->get();
        }

        if (isset($request['brand_id']) && $request["brand_id"] > 0) {
            $query = $query->where('brand_id', $request['brand_id']);
        }

        if (isset($request['search'])) {
            $query = $query->where("name", "like", '%' . $request["search"] . '%');

        }

        if (isset($request["product_id"]))
            $query = $query->where("id", $request["product_id"]);

        if (isset($request["sync_seo"]) && $request["sync_seo"] != -1)
            $query = $query->where("sync_seo_content", $request["sync_seo"]);

        if (isset($request["sku"])) {
            $productVariant = $this->productVariantRepository->where("sku", $request["sku"])->first();
            if (!empty($productVariant))
                $query = $query->where("id", $productVariant->product_id);
        }

        $products = $query->paginate(15);
        // dd($products);

        return [$products, $categories, $brands];
    }

    public function getCreate()
    {
        $brands = $this->brandRepo->all();
        $categories = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categories->toArray());
        return ['brand' => $brands, 'categories' => $categories];
    }


    public function getEdit($id)
    {
        $categories = $this->categoryRepo->all();
        $brands = $this->brandRepo->all();
        $product = $this->productRepository->with(['brand' , 'variant' , 'images'])->find($id);
        return ['categories' => $categories, 'product' => $product , 'brands' => $brands];
    }

    public function getAttribution($code)
    {
        $id = $this->attributeValueRepo->where('code', $code)->value('id');
        $query = $this->attributeValueRepo
            ->where('id', $id)
            ->with('ProductAttributeValue')
            ->first();
        $query = $query->toarray()['product_attribute_value'];
        $collection = Collection::make($query);
        return $collection->unique('content')->values();
    }

    public function getIdProductAttributeValue($code, $array)
    {
        $id = $this->attributeValueRepo->where('code', $code)->value('id');
        return $this->productAttributeValueRepo
            ->Where('attribute_value_id', $id)
            ->WhereIn('content', $array)
            ->pluck('product_id')
            ->toArray();
    }

    // public function store(array $params)
    // {
    //     if (!empty($params["video_url"])){
    //         $video_url= $params["video_url"];
    //         $video_url=str_replace('shorts/','watch?v=',$video_url);
    //         $params["video_url"] = $video_url;
    //     }

    //     if (isset($params['price'])) {
    //         $params['price'] = str_replace('.', '', $params['price']);
    //     }

    //     if (isset($params["default_img"]) && !empty($params["default_img"])) {

    //         foreach ($params["default_img"] as $image) {
    //            $listDataImage =  $this->createProductImage($image);
    //         }
    //     }

    //     $product = $this->productRepository->create($params);

    //     return $product;
    // }

    protected $model;
    public function create($input)
    {
        if($input !== null) {
            dd($input);
            $model = $this->model->newInstance($input);
            $model->save();
            return $model;
        }else{
            echo "sai";
        }


    }

    // public function store($request)
    // {
    //     if ($request->hasFile('default_img')) {
    //         $image = $request->file('default_img');
    //         $filename = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('uploads/brands'), $filename);
    //     }
    //     $params = $request->validated();
    //     $params['image'] = $filename;
    
    //     $product = $this->productRepository->create($params);
    //     return $product;
    // }
  

  

    public function find($id)
    {
        $product = $this->productRepository->find($id); 
        return $product;
    }


    private function createProductImage($image)
    {
        $fileUpload = new FileUploadService();
        $path = "public/products/" . $id;
        $result = $fileUpload->upLoadImages($image, $path, [
            "size" => [
                "280" => [
                    "width" => 280,
                    "height" => 280
                ],
                "600" => [
                    "width" => 600,
                    "height" => 600
                ],
            ]
        ]);

        if ($result["status"]) {
            $productImage = new ProductImage();
            $productImage->product_id = $id;
            $productImage->name = last(explode("/", $result["path"]));
            $productImage->path = $result["path"];
            $productImage->save();
            return $productImage;

        }

        return false;

        // $imageName[] = time().'.'.$image->extension();
        // $imagePath = $this->imageRepo->save($imageName,);
        // // $product = $this->productRepository->find($id);
        // return $imagePath;
    }
}
