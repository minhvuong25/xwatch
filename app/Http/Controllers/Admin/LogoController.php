<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Logo\LogoRequest;
use App\Http\Requests\Logo\LogoStoreRequest;
use App\Models\Logo;
use App\Services\FileUploadService;
use App\Repositories\Logo\LogoRepository;
use Illuminate\Http\Request;
use App\Services\LogoService;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Log;

class LogoController extends Controller
{
    private $service;
    private $logoRepo;

    public function __construct(LogoService $service , LogoRepository $logoRepository)
    {
        $this->service = $service;
        $this->logoRepo = $logoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $payloads = $request->all();
        $data = $this->service->getAllData($payloads);

        return view('admin.logo.index')
            ->with('logos', $data);;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogoStoreRequest $request)
    {

        $input = $request->validated();
        try {
            $banner = $this->service->store($input);
            \Flash::success('logo successfully');
            return redirect(route('logo.index'));
        } catch (\Exception $e) {

            \Log::error($e->getMessage());
             \Flash::error('Oops something went wrong!');
            return redirect(route('logo.index'));
        }

    }
    public function edit($id)
    {
        $logo = $this->service->getEdit($id);
        return view('admin.logo.edit', ['logo' => $logo[0]]);
    }
    public function update(LogoStoreRequest $request, $id)
    {
        $input = $request->validated();
        $logo= $this->service->update($input, $id);
        if($logo)  {
            Flash::success('logo saved successfully.');
            return redirect(route('logo.index'));
        }
        else
        {
            \Flash::error('Oops something went wrong!');
            return redirect(route('logo.index'));
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
            Flash::success('logo delete successfully.');

            return redirect(route('logo.index'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Flash::error('Oops something went wrong!');
            return redirect(route('logo.index'));
        }

    }
    /**
     * @param $id
     * @param $image
     * @return ProductImage|bool
     */
    public function createProductImage($id, $image)
    {
        $fileUpload = new FileUploadService();
        $path = "public/logo/" . $id;
        $result = $fileUpload->upLoadImages($image, $path, [
            "size" => [
                "280" => [
                    "width" => 280,
                    "height" => 280
                ],
                "420" => [
                    "width" => 420,
                    "height" => 508
                ],
            ]
        ]);
        if ($result["status"]) {
            $productImage = new Logo();
            $productImage->source_url = $result["path"];
            $productImage->save();
            return $productImage;

        }

        return false;
    }
}
