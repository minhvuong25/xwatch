<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Services\PageNewsService;
use App\Services\FileUploadService;
use App\Http\Controllers\Controller;
use CKSource\CKFinder\Command\FileUpload;

class PageNewsController extends Controller
{
    protected $service;
    public function __construct(PageNewsService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $pageNews = $request->all();
        $data = $this->service->getAll($pageNews);
        return view('admin.page_news.index')
            ->with('pageNews', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page_news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $image = $input['default_img'];
        $fileUpload = new FileUploadService();
        $path = "public/page_news";
        $path = $fileUpload->upLoadImages($image , $path , ["size" => ["174"=>["width"=> 174]]]);
        $name = last(explode("/", $path["path"]));
        $input['name'] = $name;
        $input['path'] = $path["path"];

        $pageNews = $this->service->create($input);
        Flash::success('Page  News saved successfully.');

        return redirect(route('pageNews.index'));
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
        //
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
        //
    }
}
