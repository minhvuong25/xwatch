<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeoContent;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SeoContentService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\SeoContent\SeoContentRequest;
use App\Http\Requests\SeoContent\SeoContentStoreRequest;


class SeoContentController extends Controller
{
    protected $service, $productRepo, $brandRepo, $categoryRepo, $blogRepo;

    public function __construct(
        SeoContentService $serviceSeocontent,
        ProductRepository $productRepository,
        BrandRepository $brandRepository,
        CategoryRepository $categoryRepo,
        BlogRepository $blogRepo,
    )
    {
        $this->service = $serviceSeocontent;
        $this->productRepo = $productRepository;
        $this->brandRepo = $brandRepository;
        $this->categoryRepo = $categoryRepo;
        $this->blogRepo = $blogRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seoContents = $this->service->data();
        return view('admin.seo_contents.index', ['seoContens' => $seoContents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->categoryRepo->get();
        return view('admin.seo_contents.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeoContentStoreRequest $request)
    {

        $input = $request->validated();
        try {
            $this->service->create($input);
            Flash::success('SeoContent saved successfully');
            return redirect(route('seoContents.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seoConten = $this->service->find($id);
        if (empty($seoConten)) {
            Flash::error('SeoContent not found');
            return redirect(route('seoContents.index'));
        }
        return view('admin.seo_contents.show')->with('seoConten', $seoConten);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seoConten = $this->service->find($id);
        if (empty($seoConten)) {
            Flash::error('SeoContent not found');
            return redirect(route('seoContents.index'));
        }
        $category = $this->categoryRepo->all();
        return view('admin.seo_contents.edit')
        ->with('category', $category)
        ->with('seoConten', $seoConten);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeoContentStoreRequest $request, $id)
    {
        $request = $request->validated();
        $this->service->update($id , $request);
        Flash::success('Seocontent updated successfully');

        return redirect(route('seoContents.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->service->destroy($id);
            Flash::success('Seocontent updated successfully.');

            return redirect(route('seoContents.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function getData(Request $request)
    {
        $entityType = $request->input('entityType');
        $page = $request->input('page');
        switch ($entityType) {
            case SeoContent::SEO_PRODUCT:
                $listProduct = $this->productRepo->all();
                return response()->json([
                    'data' => $listProduct,
                    'product' => true,
                    'status' => Response::HTTP_OK
                ]);
                break;
            case SeoContent::SEO_BRAND:
                $listBrandRepo = $this->brandRepo->all();
                return \response()->json([
                    'status' => Response::HTTP_OK,
                    'brand' => true,
                    'data' => $listBrandRepo
                ]);
            case SeoContent::SEO_CATEGORY:
                $listCategory = $this->categoryRepo->all();
                return \response()->json([
                    'status' => Response::HTTP_OK,
                    'category' => true,
                    'data' => $listCategory
                ]);
            case SeoContent::SEO_NEWS:
                $listBlog = $this->blogRepo->all();
                return \response()->json([
                    'status' => Response::HTTP_OK,
                    'blog' => true,
                    'data' => $listBlog
                ]);
            default:
                break;
        }
    }
}
