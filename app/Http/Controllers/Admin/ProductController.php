<?php

namespace App\Http\Controllers\Admin;

use Response;
use Exception;
use App\Helper\FuncLib;
use App\Models\TagGroup;
use App\Models\ProductTag;
use App\Models\SeoContent;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Services\ProductService;
use App\Models\ProductDescription;
use Illuminate\Support\Facades\DB;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\productVariantService;
use App\Repositories\Tags\TagsRepository;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Warranty;
use App\Repositories\CategoryBrand\CategoryBrandRepository;
use App\Repositories\ProductVariant\ProductVariantRepository;
use App\Repositories\ProductDescription\ProductDescriptionRepository;

class ProductController extends Controller
{
    /** @var  ProductRepository */
    private $productRepository;
    private $productVariantRepository;
    private $productServices;
    private $brandRepository;
    private $categoryRepository;
    private $categoryBrandRepository;
    private $tagsRepository;
    private $productVariantService;
    private $promotionRepo;

    public function __construct(
        ProductRepository $productRepo,
        BrandRepository $brandRepository,
        CategoryRepository $categoryRepository,
        ProductVariantRepository $productVariantRepo,
        ProductService $productServices,
        CategoryBrandRepository $categoryBrandRepository,
        TagsRepository $tagsRepository,
        ProductDescriptionRepository $promotionRepo,
        productVariantService $productVariantService
    ) {
        $this->productRepository = $productRepo;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productVariantRepository = $productVariantRepo;
        $this->productServices = $productServices;
        $this->productRepository = $productRepo;
        $this->productServices = $productServices;
        $this->productVariantRepository = $productVariantRepo;
        $this->categoryBrandRepository = $categoryBrandRepository;
        $this->tagsRepository = $tagsRepository;
        $this->productVariantService = $productVariantService;
        $this->promotionRepo = $promotionRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $request = $request->all();

        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->all();
        $categories = FuncLib::data_tree($categories->toArray());
        $query = $this->productRepository->with(["brand", "variants", "images", "category"]);


        if (isset($request["status"]) && $request["status"] > 0)
            $query = $query->where("status", $request["status"]);

        if (isset($request["category_id"]) && $request["category_id"] > 0) {
            $category = $this->categoryRepository->find($request["category_id"]);
            $categoryBrand = $this->categoryBrandRepository->where("category_id", $request["category_id"])
                ->get(["brand_id"])
                ->toArray();

            $brands = $this->brandRepository->whereIn("id", $categoryBrand)->get();
            if (empty($category->children_path)) {
                $query = $query->where("category_id", $request["category_id"]);
            } else {
                $aryId = explode("/", $category->children_path);
                $query = $query->whereIn("category_id", $aryId);
            }
        }

        if (isset($request["brand_id"]) && $request["brand_id"] > 0) {
            $query = $query->where("brand_id", $request["brand_id"]);
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
        if (isset($request["search"]))
            $query = $query->where("name", "like", '%' . $request["search"] . '%');

        $products = $query->orderBy('id', 'DESC')->paginate(20);
        return view('admin.products.index')
            ->with('products', $products)
            ->with("categories", $categories)
            ->with('brands', $brands);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $promotional = $this->promotionRepo->all();
        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->all();
        $categories = FuncLib::data_tree($categories->toArray());
        $warranty = Warranty::all();
        return view('admin.products.create')
            ->with("categories", $categories)
            ->with('brands', $brands)
            ->with('warranty',$warranty)
            ->with('promotional', $promotional);
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(ProductStoreRequest $request)
    {
        $input = $request->all();
        if (!empty($input['size'])) {
            $input['size'] =  implode("_", $input['size']);
        }
        
        if (empty($input["slug"]))
            $input["slug"] = Str::slug($request->name, "-");

        $images = $input['default_img'] ?? [];
        unset($input['default_img']);

        if (!empty($input['promotionalInformation'])) {
            $param['description'] =  $input['promotionalInformation'];
        }

        $product = $this->productRepository->create($input);
     
        if ($images) {
            foreach ($images as $image) {
                $this->createProductImage($product->id, $image);
            }
        }

        $mImages = $input['multiple_img'] ?? [];
        unset($input['multiple_img']);
        if ($mImages) {
            foreach ($mImages as $image) {
                $this->createProductMultipeImage($product->id, $image);
            }
        }
        $param['product_id'] = $product->id;
        $this->promotionRepo->create($param);
        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);
        $promotional = $this->promotionRepo->where('product_id', $id)->first();
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('admin.products.show')->with('product', $product)->with('promotional', $promotional);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->all();
        $categories = FuncLib::data_tree($categories->toArray());
        $product = $this->productRepository->with(["variants", "images", "description"])->find($id);
        $brands = $this->brandRepository->all();

        $warranty = Warranty::all();  
        $tagGroup = TagGroup::with('tags')->get();
        $productTags = ProductTag::where('product_id', $id)->pluck('tag_id')->toArray();
        $seoContent = SeoContent::where("entity_type", SeoContent::SEO_PRODUCT)
            ->where("entity_id", $product->id)
            ->first();
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }
        //  $product_variants = $this->productVariantService->getVariantByProductId($id);
        $promotionalInformation  = $this->promotionRepo->where('product_id', $id)->first();
        return view('admin.products.edit')
            ->with('warranty', $warranty)
            ->with('brands', $brands)
            ->with('seoContent', $seoContent)
            ->with('categories', $categories)
            ->with('promotionalInformation', $promotionalInformation)
            ->with('productTags', $productTags)
            // ->with('product_variants', $product_variants)
            ->with('product', $product);
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request)
    {
        $product = $this->productRepository->find($request->id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, ProductUpdateRequest $request)
    {
       
        try {
            $product = $this->productRepository->find($id);
            if (empty($product)) {
                Flash::error('Product not found');
                return redirect(route('products.index'));
            }
            $data = $request->all();

            if (empty($data["slug"]))
                $data["slug"] = Str::slug($request->name, "-");
                if (!empty($data['size'])) {
                    $data['size'] =  implode("_", $data['size']);
                }
            // product edit
            
            if (isset($data["multiple_img"]) && !empty($data["multiple_img"])) {
                foreach ($data["multiple_img"] as $image) {
                    $this->createProductMultipeImage($id, $image);
                }
            }
            if (!empty($data['promotionalInformation'])) {
                $param['description'] =  $data['promotionalInformation'];
            }
            if (empty($data["multiple_img"]))
            
                unset($data["multiple_img"]);
            
                // dd($data);
            $this->productRepository->update($data, $id);
           
            $images = $data['default_img'] ?? [];
            unset($data['default_img']);
           
            if ($images) {
                
                foreach ($images as $image) {
                    
                    $this->createProductImage($id, $image);
                }
            }
            
            $desciption = $this->promotionRepo->with('product')->where('product_id', $id)->first();
            if(isset($desciption)){
                
                $this->promotionRepo->update($param , $desciption->id);
            }else{
                
                $param['product_id'] = $id;
                ProductDescription::create($param);
            }
          
            Flash::success('Product updated successfully.');
            return redirect(route('products.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * @param $id
     * @param $image
     * @return ProductImage|bool
     */
    public function createProductImage($id, $image)
    {
        $fileUpload = new FileUploadService();
        $path = "public/products/" . $id;
        $result = $fileUpload->upLoadImages($image, $path, [
            "size" => [
                "280" => [
                    "width" => 280,
                    "height" => 280
                ],
                // "600" => [
                //     "width" => 600,
                //     "height" => 600
                // ],
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
    }

    public function createProductMultipeImage($id, $image)
    {
        $fileUpload = new FileUploadService();
        $path = "public/products/" . $id;
        $result = $fileUpload->upLoadImages($image, $path, [
            "size" => [
                "280" => [
                    "width" => 280,
                    "height" => 280
                ],
                "420" => [
                    "width" => 420,
                    "height" => 508
                ],
            ]
        ]);
        if ($result["status"]) {
            $productImage = new ProductImage();
            $productImage->product_id = $id;
            $productImage->name = last(explode("/", $result["path"]));
            $productImage->path = $result["path"];
            $productImage->type = "1";
            $productImage->save();
            return $productImage;
        }

        return false;
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }
        $desciption = $this->promotionRepo->with('product')->where('product_id', $id)->first();
        $this->productRepository->delete($id);
        if(isset($desciption)){
            $this->promotionRepo->delete($desciption->id);
        }

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }

    public function import(Request $request) 
    {
        if ($request->hasFile('excel_file')) {
            $path = $request->file('excel_file')->getRealPath();
            try{
                DB::beginTransaction();
                Excel::import(new ProductImport, $path);
                Flash::success('Import data successfully');
                DB::commit();
            }catch(Exception $e){
                DB::rollBack();
                Flash::error('Product name must be unique');
            }
            return redirect()->back();
        }
        Flash::error('No file uploaded');
        return redirect()->back();
    }
}
