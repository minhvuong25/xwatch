<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use App\Models\CustomerSay;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\Customers\CustomersRepository;
use App\Http\Requests\Customers\CustomersStoreRequest;

class CustomerSayController extends Controller
{
    protected $customerSaysRepo;
    public function __construct(CustomersRepository $customerSaysRepo)
    {
        $this->customerSaysRepo = $customerSaysRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerSays = $this->customerSaysRepo->paginate(10);
        return view('admin.customer_say.index', compact('customerSays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer_say.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomersStoreRequest $request)
    {
        try{
        if ($request->hasFile('default_image')) {
            $image = $request->file('default_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/customer'), $filename);
        }
        if ($request->hasFile('video_image')) {
            $imageVideo = $request->file('video_image');
            $filenameVideo = time() .'a'. '.' . $imageVideo->getClientOriginalExtension();
            $imageVideo->move(public_path('uploads/customer'), $filenameVideo);
        }
        $params = $request->validated();
        $params['default_image'] = $filename;
        $params['video_image'] = $filenameVideo;
        $this->customerSaysRepo->create($params);
        Flash::success('successfully.');
        return redirect(route('customerSays.index'));
        }catch(\Exception $e){
            Log::error($e);
        };
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
        $customerSays = $this->customerSaysRepo->find($id);

        if (empty($customerSays)) {
            Flash::error('Product Image not found');

            return redirect(route('customerSays.index'));
        }

        return view('admin.customer_say.edit')->with('customerSays', $customerSays);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomersStoreRequest $request, $id)
    {
        try{
        $filename = null;
        $filenameVideo = null;
        if ($request->hasFile('default_image')) {
            $image = $request->file('default_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/customer'), $filename);
        }
        if ($request->hasFile('video_image')) {
            $imageVideo = $request->file('video_image');
            $filenameVideo = time() . '.' . $imageVideo->getClientOriginalExtension();
            $imageVideo->move(public_path('uploads/customer'), $filenameVideo);
        }
        $params = $request->validated();
        $params['default_image'] = $filename;
        $params['video_image'] = $filenameVideo;
        $this->customerSaysRepo->update($params, $id);
        Flash::success('successfully.');

        return redirect(route('customerSays.index'));
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
    { {
            $customerSays = $this->customerSaysRepo->find($id);

            if (empty($customerSays)) {
                Flash::error('Không tìm thay');
                return redirect(route('customerSays.index'));
            }
            $productCustomerValue = $this->customerSaysRepo->delete($id);
            Flash::success('Product Customer value deleted successfully');
            return redirect(route('customerSays.index'));
        }
    }
}
