<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarrantyRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Warranty;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $warranty = \App\Models\Warranty::all();

        return view('admin.warranty.index', compact('warranty'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.warranty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarrantyRequest $request)
    {
        $filename = null ; 
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/warranty'),$filename);
        }
        
        $parrams = $request->all();
        $parrams['image'] = $filename ;
        $warranty = Warranty::create($parrams);
        Flash::success('Warranty was successfull created');
        return redirect(route('warranty.index'));
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
        $warranty = Warranty::find($id);
return view('admin.warranty.edit', compact('warranty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarrantyRequest $request, $id)
    {
        $warranty = Warranty::find($id);
        $filename = null ; 
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/warranty'),$filename);
        }else {
           $filename = $warranty->image;
        }
        $parrams = $request->all();
        $parrams['image'] = $filename;
        $warranty->update($parrams);
        Flash::success('Warranty was successfully updated');
        return redirect(route("warranty.index"));
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
            $warranty = Warranty::find($id);
            if(empty($warranty)){
                Flash::error('Warranty not found');
            }
            $warranty->delete();
            Flash::success('Warranty home was successfully delete');
            return redirect(route('warranty.index'));
        }catch(Exception $e){
            Log::error($e);
        };
    }
}
