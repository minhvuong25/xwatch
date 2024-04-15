<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\ProductSuggest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\ProductSuggestService;
use App\Http\Requests\ProductSuggest\ProductSuggestStoreRequest;

class ProductSuggestController extends Controller
{
    protected $service;
    public function __construct(ProductSuggestService $service)
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
        $productSuggest = $this->service->all();
        return view('admin.product_suggest.index', ['productSuggest' => $productSuggest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_suggest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSuggestStoreRequest $request)
    {
        $request = $request->validated();
        
        try {
            $tagGroup = $this->service->create($request);
            Flash::success('Category saved successfully.');
            return redirect(route('productSuggest.index'));

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
        $productSuggest = $this->service->find($id);
        if(empty($productSuggest)){
            Flash::error('Tag Group not found');
            return redirect(route('productSuggest.index'));
        }
        return view('admin.product_suggest.show')->with('productSuggest', $productSuggest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSuggest = $this->service->find($id);
        if(empty($productSuggest)){
            Flash::error('Tag Group not found');
            return redirect(route('productSuggest.index'));
        }
        return view('admin.product_suggest.edit' , array('productSuggest' => $productSuggest));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSuggestStoreRequest $request, $id)
    {
        $productSuggest = $this->service->find($id);
        if(empty($productSuggest)){
            Flash::error('Tag Group not found');
            return redirect(route('productSuggest.index'));
        }
        $request = $request->validated();
        
        try {
            $tagGroup = $this->service->update($id , $request);
            Flash::success('Category saved successfully.');
            return redirect(route('productSuggest.index'));

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
        $productSuggest = $this->service->find($id);
        if(empty($productSuggest)){
            Flash::error('Tag Group not found');
            return redirect(route('productSuggest.index'));
        }

        try {
            $tagGroup = $this->service->delete($id);
            Flash::success('Category delete successfully.');
            return redirect(route('productSuggest.index'));

        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
