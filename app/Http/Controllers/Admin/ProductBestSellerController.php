<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\ProductBestSellerService;
use App\Http\Requests\ProductBestSeller\ProductBestSellerStoreRequest;

class ProductBestSellerController extends Controller
{
    protected $service;

    public function __construct(ProductBestSellerService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productBestSellers = $this->service->all();
        return view('admin.product_best_sellers.index', compact('productBestSellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_best_sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductBestSellerStoreRequest $request)
    {
        $params = $request->validated();
        try {
            $productBestSellers = $this->service->create($params);
            Flash::success('Product created successfully');
            return redirect(route('productBestSellers.index'));
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
        $productBestSeller = $this->service->find($id);

        if (empty($productBestSeller)) {
            Flash::error('Product not found');
            return redirect(route('productBestSellers.index'));
        }
        return view('admin.product_best_sellers.show')->with('productBestSeller' , $productBestSeller);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productBestSeller = $this->service->find($id);

        if (empty($productBestSeller)) {
            Flash::error('Product not found');
            return redirect(route('productBestSellers.index'));
        }
        return view('admin.product_best_sellers.edit', compact('productBestSeller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id , ProductBestSellerStoreRequest $request)
    {
        $params = $request->validated();
        try {
            $productBestSellers = $this->service->update($id , $params);
            Flash::success('Product created successfully');
            return redirect(route('productBestSellers.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productBestSellers = $this->service->find($id);
        if (empty($productBestSellers)) {
            Flash::error('Product not found');
            return redirect(route('productBestSellers.index'));
        }
        $productBestSellers = $this->service->delete($id);
        Flash::success('Product deleted successfully');
        return redirect(route('productBestSellers.index'));
    }
}
