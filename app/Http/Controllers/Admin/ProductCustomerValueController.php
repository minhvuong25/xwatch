<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\ProductCustomerValueService;
use App\Http\Requests\ProductCustomerValue\ProductCustomerValueRequest;
use App\Http\Requests\ProductCustomerValue\ProductCustomerValueStoreRequest;
use App\Models\ProductCustomerValue;

class ProductCustomerValueController extends Controller
{
    protected $service;

    public function __construct(ProductCustomerValueService $service)
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
        $productCustomerValues  = $this->service->all();
        return view('admin.product_customer_values.index')->with('productCustomerValues', $productCustomerValues );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_customer_values.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCustomerValueStoreRequest $request)
    {
        $inputs = $request->validated();
        // dd($inputs);
        try {
            $productCustomerValues = $this->service->create($inputs);
            Flash::success('Product Image create successfully.');
            return redirect(route('productCustomerValues.index'));

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
        $productCustomerValues = $this->service->find($id);

        if (empty($productCustomerValues)) {
            \Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }

        return view('admin.product_customer_values.show')->with('productCustomerValues', $productCustomerValues);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCustomerValue = $this->service->find($id);

        if (empty($productCustomerValue)) {
            Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }

        return view('admin.product_customer_values.edit')->with('productCustomerValue', $productCustomerValue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCustomerValueStoreRequest $request, $id)
    {
        $params = $request->validated();

        try {
            $this->service->update($id ,  $params );

            Flash::success('Product Image update successfully.');
            return redirect(route('productCustomerValues.index'));
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
        $productCustomerValue = $this->service->find($id);

        if(empty($productCustomerValue)){
            Flash::error('Không tìm thay');
            return redirect(route('productCustomerValues.index'));
        }
        $productCustomerValue = $this->service->delete($id);
        Flash::success('Product Customer value deleted successfully');
        return redirect(route('productCustomerValues.index'));
    }
}
