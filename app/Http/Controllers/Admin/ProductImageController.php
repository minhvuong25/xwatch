<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImage\ProductImageRequest;
use App\Repositories\ProductImage\ProductImageRepository;
use App\Http\Requests\ProductImage\ProductImageStoreRequest;

class ProductImageController extends Controller
{
    protected $repository;
    protected $imageRepo;

    public function __construct(ProductImageRepository $repository, ProductImageRepository $imageRepo)
    {
        $this->repository = $repository;
        $this->imageRepo = $imageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = $request->all();
        $productImages = $this->repository->paginate(10);
        if (isset($request["search"]))
            $productImages =$this->imageRepo->where("product_id", "like", '%'. $request["search"] .'%')->paginate(10);

        return view('admin.product_images.index', compact('productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductImageStoreRequest $request)
    {
        $inputs = $request->validated();
        try {
            $productImage = $this->repository->create($inputs);
            Flash::success('Product Image create successfully.');
            return redirect(route('productImages.index'));

        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
        $productImage = $this->repository->find($id);

        if (empty($productImage)) {
            Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }

        return view('admin.product_images.show')->with('productImage', $productImage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productImage = $this->repository->find($id);

        if (empty($productImage)) {
            Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }
        return view('admin.product_images.edit', ['productImage' => $productImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductImageStoreRequest $request, $id)
    {
        $params = $request->validated();

        $productImage = $this->repository->find($id);
        if (empty($productImage)) {
            Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }

        try {
            $productImage = $this->repository->find($id);
            $productImage->update($params);

            Flash::success('Product Image update successfully.');
            return redirect(route('productImages.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productImage = $this->repository->find($id);

        if (empty($productImage)) {
            Flash::error('Khong tìm thấy thông tin');
            return redirect(route('productImages.index'));
        }
        
        $this->repository->delete($id);
        Flash::success('xóa dữ liệu thành công.');
        return redirect(route('productImages.index'));
    }
}
