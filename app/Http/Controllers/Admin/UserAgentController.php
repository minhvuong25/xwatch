<?php

namespace App\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Faker\Provider\UserAgent;
use App\Services\UserAgentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAgent\UserAgentRequest;
use App\Http\Requests\UserAgent\UserAgentStoreRequest;

class UserAgentController extends Controller
{
    protected $service;
    public function __construct(UserAgentService $service)
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
        $userAgents = $this->service->all();
        return view('admin.user_agents.index', compact('userAgents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAgentStoreRequest $request)
    {
        // $arrDataSource = $request->all();
        $input = $request->all();

        $userAgent = $this->service->create($input);

        Flash::success('User Agent saved successfully.');

        return redirect(route('userAgents.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userAgent = $this->service->find($id);
        if (empty($userAgent)) {
            Flash::error('User Agent not found');
            return redirect(route('userAgents.index'));
        }

        return view('admin.user_agents.show', compact('userAgent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userAgent = $this->service->find($id);
        if (empty($userAgent)) {
            Flash::error('User Agent not found');
            return redirect(route('userAgents.index'));
        }

        return view('admin.user_agents.edit', compact('userAgent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserAgentStoreRequest $request, $id)
    {
        $request = $request->validated();
        $userAgent = $this->service->update($id, $request);
        Flash::success('User Agent updated successfully.');

        return redirect(route('userAgents.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userAgent = $this->service->find($id);

        if (empty($userAgent)) {
            Flash::error('User Agent not found');
            return redirect(route('userAgents.index'));
        }
        $this->service->delete($id);
        Flash::success('User Agent deleted successfully.');
        return redirect(route('userAgents.index'));
    }
}
