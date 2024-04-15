<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Laracasts\Flash\Flash;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Repositories\Contact\ContactRepository;
use App\Http\Requests\Contact\ContactStoreRequest;

class ContactController extends Controller
{
    private $service;
    private $contactRepo;

    public function __construct(ContactService $service , ContactRepository $contactRepository)
    {
        $this->service = $service;
        $this->contactRepo = $contactRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $payloads = $request->all();
        $data = $this->service->getAllData($payloads);

        return view('admin.contact.index')
            ->with('contacts', $data);;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $input = $request->all();
        $contact = $this->contactRepo->create($input);
        Flash::success('Contact saved successfully.');

        return redirect(route('contact.index'));
    }
    public function edit($id)
    {
        $contact = $this->service->getEdit($id);
        return view('admin.contact.edit', ['contact' => $contact[0]]);
    }

    public function update(ContactStoreRequest $request, $id)
    {
        $params = $request->validated();

        try {
            $contact = $this->service->update($params, $id);
            Flash::success('Cập nhật Contact thành công');

            return redirect(route('contact.index'));

        } catch (\Exception $e) {
            Log::error($e);
            Flash::error('Cập nhật Contact thất bại');
            return redirect(route('contact.index'));
        }
    }
    public function destroy($id)
    {
        try {
            $this->service->destroy($id);
            Flash::success('Contact delete successfully.');
            return redirect(route('contact.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}