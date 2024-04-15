<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PromotionImportLogService;
use App\Http\Requests\PromotionImportLog\PromotionImportLogRequest;
use App\Http\Requests\PromotionImportLog\PromotionImportLogStoreRequest;

class PromotionImportLogController extends Controller
{
    //promotion
    protected $sevice;
    public function __construct(PromotionImportLogService $sevice)
    {
        $this->sevice = $sevice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotionImportLogs = $this->sevice->all();
        return view('admin.promotion_import_logs.index', ['promotionImportLogs' => $promotionImportLogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotion_import_logs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionImportLogStoreRequest $request)
    {
        $input = $request->all();
        
        $promotionImportLogs = $this->sevice->create($input);

        Flash::success('User Agent saved successfully.');

        return redirect(route('promotionImportLogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotionImportLogs = $this->sevice->find($id);
        if(empty($promotionImportLogs)){
            Flash::error('User Agent not found.');
            return redirect(route('promotionImportLogs.index'));
        }
        return view('admin.promotion_import_logs.show' , ['promotionImportLogs' => $promotionImportLogs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotionImportLogs = $this->sevice->find($id);
        if(empty($promotionImportLogs)){
            Flash::error('User Agent not found');
                        return redirect(route('promotionImportLogs.index'));
        }
        return view('admin.promotion_import_logs.edit', compact('promotionImportLogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionImportLogStoreRequest $request, $id)
    {
        $request = $request->validated();
        $params = $this->sevice->update($id , $request);
        Flash::success('User Agent updated successfully.');
        return redirect(route('promotionImportLogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotionImportLogs = $this->sevice->find($id);
        if(empty($promotionImportLogs)){
            Flash::error('User Agent not found');
                        return redirect(route('promotionImportLogs.index'));
        }
        $this->sevice->delete($id);
        return redirect(route('promotionImportLogs.index'));
    }
}
