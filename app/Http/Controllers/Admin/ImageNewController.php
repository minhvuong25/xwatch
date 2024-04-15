<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\ImageNew\ImageNewRepository;
use App\Http\Requests\ImageNew\ImageNewStoreRequest;
use App\Http\Requests\VideoHome\VideoHomeStoreRequest;

class ImageNewController extends Controller
{
    private $imageNewRepo;
 

    public function __construct(ImageNewRepository $imageNewRepo)
    {
        $this->imageNewRepo = $imageNewRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->imageNewRepo->all();
        // image_news
        // imageNew
        return view('admin.image_news.index')
            ->with('imageNew', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image_news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageNewStoreRequest $request)
    {
        try{
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/imageNew'), $filename);
            }
            $params = $request->validated();
            $params['image'] = $filename;
            // dd($params);
            $params['status'] = 1 ;
             $this->imageNewRepo->create($params);
            Flash::success('Image was successfully created');
            return redirect(route('imageNew.index'));
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
        $imageNew = $this->imageNewRepo->find($id);
        return view('admin.image_news.edit' , ['imageNew' => $imageNew]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageNewStoreRequest $request, $id)
    {
        try{
            $filename = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/imageNew'), $filename);
            }
            $params = $request->validated();
            $params['image'] = $filename;
            $params['status'] = 1 ;
            $this->imageNewRepo->update($params , $id);
            Flash::success('Video home was successfully created');
            return redirect(route('imageNew.index'));
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
            $imageNew = $this->imageNewRepo->find($id);
            if(empty($imageNew)){
                Flash::error('Video not found');
            }
            $imageNew->delete();
            Flash::success('Video home was successfully created');
            return redirect(route('imageNew.index'));
        }catch(\Exception $e){
            Log::error($e);
        };
    }
}
