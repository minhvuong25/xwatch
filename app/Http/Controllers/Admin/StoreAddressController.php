<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use App\Models\StoreAddress;
use App\Models\Province;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\StoreAddressService;
use App\Http\Requests\StoreAddress\StoreAddressRequest;
use App\Http\Requests\StoreAddress\StoreAddressStoreRequest;
use App\Repositories\StoreAddress\StoreAddressRepository;
use App\Repositories\Province\ProvinceRepository;
use Illuminate\Http\Request;

class StoreAddressController extends Controller
{
    protected $service;
    protected $storeAddressRepo;
    protected $provinceRepository;

    public function __construct(StoreAddressService $service , StoreAddressRepository $storeAddressRepository ,ProvinceRepository $provinceRepository)
    {
        $this->service = $service;
        $this->storeAddressRepo = $storeAddressRepository;
        $this->provinceRepo = $provinceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payloads = $request->all();
        $data = $this->service->getAllData($payloads);
        $province = $this->provinceRepo->all();
        return view('admin.store_address.index')
            ->with('storeAddresses', $data, $province);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $province = $this->provinceRepo->all();
        return view('admin.store_address.create',[
            'province' => $province
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressStoreRequest $request)
    {

        $inputs = $request->validated();
        $inputs['province'] = $request->province;
        try {
            $storeAddress = $this->service->store($inputs);
            \Flash::success(' successfully');
            return redirect(route('storeAddresses.index'));
        } catch (\Exception $e) {

            \Log::error($e->getMessage());
             \Flash::error('Oops something went wrong!');
            return redirect(route('storeAddresses.index'));
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
    {;
        $province = $this->provinceRepo->all();
        $storeAddress = $this->service->getEdit($id);
        return view('admin.store_address.edit',
        ['storeAddress' => $storeAddress[0],
         'province'=> $province,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAddressStoreRequest $request, $id)
    {
        $params = $request->validated();
        $params['province'] = $request->province;

        try {
            $storeAddress = $this->service->update($params, $id);
            Flash::success('Cập nhật Store Address thành công');

            return redirect(route('storeAddresses.index'));

        } catch (\Exception $e) {
            Log::error($e);
            Flash::error('Cập nhật Store Address thất bại');
            return redirect(route('storeAddresses.index'));
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
            $this->service->destroy($id);
            Flash::success('Store Address delete successfully.');

            return redirect(route('storeAddresses.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
