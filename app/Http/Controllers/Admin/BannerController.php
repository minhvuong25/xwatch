<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use App\Services\BannerService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\BannerRequest;
use App\Http\Requests\Banner\BannerStoreRequest;
use App\Http\Requests\Banner\CreateBannerRequest;

class BannerController extends Controller
{
    protected $service;

    public function __construct(BannerService $service)
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
        $banners = $this->service->data();
        return view('admin.banners.index', ['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerStoreRequest $request)
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $banner = $this->service->store($input);
            \Flash::success('Banner successfully');
            DB::commit();
            return redirect(route('banners.index'));
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error($e->getMessage());
            \Flash::error('Oops something went wrong!');
            return redirect(route('banners.index'));
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
        $banners = $this->service->find($id);
        return view('admin.banners.show', compact('banners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this->service->find($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            Flash::success('Banner delete successfully.');

            return redirect(route('banners.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
