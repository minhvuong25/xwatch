<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductCustomerColumnService;
use App\Http\Requests\ProductCustomerColumn\ProductCustomerColumnRequest;
use App\Http\Requests\ProductCustomerColumn\ProductCustomerColumnStoreRequest;

class ProductCustomerColumnController extends Controller
{
    protected $service;
    public function __construct(ProductCustomerColumnService $service)
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
        $productCustomerColumns = $this->service->all();
        return view('admin.product_customer_columns.index')->with('productCustomerColumns', $productCustomerColumns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_customer_columns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCustomerColumnStoreRequest $request)
    {
        $input = $request->all();
        $input = array_merge(["cloumn_code" => strtoupper(Str::slug($request->cloumn_name , "_"))], $input);
        $productCustomerColumns = $this->service->create($input);

        Flash::success('Product Customer Column saved successfully');
        return redirect(route('productCustomerColumns.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productCustomerColumn = $this->service->find($id);

        if(empty($productCustomerColumn)){
            Flash::error('Không tìm thấy sản phẩm');
            return redirect(route('productCustomerColumns.index'));
        }
        return view('admin.product_customer_columns.show')->with('productCustomerColumn' , $productCustomerColumn);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCustomerColumn = $this->service->find($id);

        if(empty($productCustomerColumn)){
            Flash::error('Không tìm thấy sản phẩm');
            return redirect(route('productCustomerColumns.index'));
        }
        return view('admin.product_customer_columns.edit')->with('productCustomerColumn' , $productCustomerColumn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProductCustomerColumnStoreRequest $request)
    {
        $params = $request->validated();

        $this->service->update($id , $params);

        Flash::success('Menu updated successfully.');

        return redirect(route('productCustomerColumns.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCustomerColumns = $this->service->find($id);

        if(empty($productCustomerColumns)){
            Flash::error('Không tìm thấy sản phẩm');
            return redirect(route('productCustomerColumns.index'));
        }
        $productCustomerColumns = $this->service->delete($id);
        Flash::success('Product Customer Column deleted successfully');
        return redirect(route('productCustomerColumns.index'));
    }
}
