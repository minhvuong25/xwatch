<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\LabelService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Label\LabelStoreRequest;
use function Ramsey\Uuid\v1;

class LabelController extends Controller
{
    protected $service;

    public function __construct(LabelService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = $this->service->all();
        return view('admin.labels.index', ['labels' => $labels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.labels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabelStoreRequest $request)
    {

        $inputs = $request->validated();

        try {
            $labels = $this->service->create($inputs);
            \Flash::success('Label create successfully.');
            return redirect(route('labels.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
