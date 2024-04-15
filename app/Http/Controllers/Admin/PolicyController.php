<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PolicyStorteRequest;
use App\Models\Policy as ModelsPolicy;
use Carbon\Exceptions\Exception;
use CKSource\CKFinder\Acl\MaskBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use PhpParser\Node\Stmt\TryCatch;

class PolicyController extends Controller   
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies  = ModelsPolicy::all();
        return  view('admin.policy.index')->with('policies',$policies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicyStorteRequest $request)
    {
       try{
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/policy'),$filename);
        }else {
            $filename = '' ;
        }
       
        // $params = $request->validate();
      
        if ($request->input('url') == '') {
            $request->merge(['url' => '#']);
        }        
        $params['image'] = $filename;
        $params=[
            'image'=> $filename ,
            'title' => $request->input('title') ,
            'url' => $request->input('url'),
        ];
        $params['show_on_homepage'] = $request->has('show_on_homepage') ? 1 : 0;
        ModelsPolicy::create($params);
        Flash::success('Policy was successfully created');
        return redirect(route('policy.index'));
       } catch(Exception $e){
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
        $policy  = ModelsPolicy::find($id);
        return  view('admin.policy.create')->with('policy', $policy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $policy = ModelsPolicy::find($id);
       return view('admin.policy.edit' , ['policy' => $policy]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PolicyStorteRequest $request, $id)
    {
        $policy =  ModelsPolicy::find($id);
        if ($request->input('url') == '') {
            $request->merge(['url' => '#']);
        }  
        if($request->hasFile('image')){
            $image  = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/policy/' ),$filename ); 
        }else {
            $filename= $policy -> image;
        }
            $params = $request->all();
            $params['show_on_homepage'] = $request->has('show_on_homepage') ? 1 : 0; 
            $params['image'] =  $filename; 
            $policy->update($params);
            Flash::success('Chính sách đã được cập nhật thành công');
            return redirect(route( 'policy.index'));
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
        $policy = ModelsPolicy::find($id);
        if (empty($policy)){
            Flash::error('not found policy');
       }
       $policy->delete();
       Flash::success('Policy was successfully created');
            return redirect(route('policy.index'));
        }catch(Exception $e){
            Log::error($e);
        };
    }
}
