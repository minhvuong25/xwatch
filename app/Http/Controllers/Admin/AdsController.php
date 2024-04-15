<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ads\AdsStoreRequest;
use App\Repositories\Ads\AdsRepository;
use App\Http\Requests\ImageNew\ImageNewStoreRequest;

class AdsController extends Controller
{
    private $adsRepo;
 

    public function __construct(AdsRepository $adsRepo)
    {
        $this->adsRepo = $adsRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->adsRepo->all();
        return view('admin.ads.index')
            ->with('ads', $data);
    }
    public function changeStatus(Request $request)
    {
        $data = $this->adsRepo->find($request->id);
        $data->status = $request->status;
        $data->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsStoreRequest $request)
    {
        try{
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/imageHome'), $filename);
            }
            $params = $request->validated();
            $params['image'] = $filename;
             $this->adsRepo->create($params);
            Flash::success('ads was successfully created');
            return redirect(route('ads.index'));
        }catch(\Exception $e){
            Log::error($e);
        };
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = $this->adsRepo->find($id);
        return view('admin.ads.edit' , ['ads' => $ads]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsStoreRequest $request, $id)
    {
        try{
            $filename = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/imageHome'), $filename);
            }
            $params = $request->validated();
            $params['image'] = $filename;
            $this->adsRepo->update($params , $id);
            Flash::success('ads home was successfully created');
            return redirect(route('ads.index'));
        }catch(\Exception $e){
            Log::error($e);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $ads = $this->adsRepo->find($id);
            if(empty($ads)){
                Flash::error('Video not found');
            }
            $ads->delete();
            Flash::success('Video home was successfully created');
            return redirect(route('ads.index'));
        }catch(\Exception $e){
            Log::error($e);
        };
    }
}

