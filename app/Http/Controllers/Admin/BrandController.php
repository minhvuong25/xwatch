<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Services\BrandService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandRequest;
use App\Repositories\Brand\BrandRepository;
use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdateRequest;



class BrandController extends Controller
{
    protected $brandService;
    protected $brandRepo;
    public function __construct(BrandService $brandService ,BrandRepository $brandRepo)
    {
        $this->brandService = $brandService;
        $this->brandRepo = $brandRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $payloads = $request->all();
        $data = $this->brandService->getAll($payloads);
        return view('admin.brands.index')->with('brands', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        try {
            $brand = $this->brandService->store($request);
            Flash::success('Brands saved successfully.');

            return redirect(route('brands.index'));

        } catch (\Exception $e) {
            Log::error($e);
            return redirect(route('brands.index'));

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->brandService->getBrand($id);
        return view('admin.brands.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, $id)
    {
        $params = $request->validated();
        if (($request->hasFile('brand_img'))) {
            $file = $request->file('brand_img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/brands'), $filename);
            $params['image'] = $filename;
        }
        try {
            $this->brandRepo->update($params , $id);
            Flash::success('Cập nhật thương hiệu thành công.');
            return redirect(route('brands.index'));
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
        try {
            $this->brandService->destroy($id);
            Flash::success('Brands delete successfully.');

            return redirect(route('brands.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }

    }
}
