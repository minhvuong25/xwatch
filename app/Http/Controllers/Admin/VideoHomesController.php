<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Helper\FuncLib;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\VideoHome\VideoHomeRepository;
use App\Http\Requests\VideoHome\VideoHomeStoreRequest;

class VideoHomesController extends Controller
{
    private $videoRepo;
 

    public function __construct(VideoHomeRepository $videoRepo)
    {
        $this->videoRepo = $videoRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->videoRepo->all();

        return view('admin.video_homes.index')
            ->with('videos', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video_homes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoHomeStoreRequest $request)
    {
        try{
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/videoHome'), $filename);
            }
            $params = $request->validated();
            $params['image'] = $filename;
            $params['status'] = 1 ;
            // $params['link']= FuncLib::convertYoutube($params['link']);
            $this->videoRepo->create($params);
            Flash::success('Video home was successfully created');
            return redirect(route('videoHome.index'));
        }catch(Exception $e){
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
        $videos = $this->videoRepo->find($id);
        return view('admin.video_homes.edit' , ['videos' => $videos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoHomeStoreRequest $request, $id)
    {
        // try{
            $filename = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/videoHome'), $filename);
            }
            $params = $request->validated();
            $params['image'] = $filename;
            $params['status'] = 1 ;
            // $params['link']= FuncLib::convertYoutube($params['link']);
            $this->videoRepo->update($params , $id);
            Flash::success('Video home was successfully created');
            return redirect(route('videoHome.index'));
        // }catch(Exception $e){
        //     Log::error($e);
        // };
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
            $videos = $this->videoRepo->find($id);
            if(empty($videos)){
                Flash::error('Video not found');
            }
            $videos->delete();
            Flash::success('Video home was successfully created');
            return redirect(route('videoHome.index'));
        }catch(Exception $e){
            Log::error($e);
        };
    }
}
