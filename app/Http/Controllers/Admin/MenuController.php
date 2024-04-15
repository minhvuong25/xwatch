<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateMenuRequest;
use App\Http\Requests\Menus\MenusStoreRequest;
use App\Http\Requests\Menus\MenuUpdateRequest;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Repositories\Menu\MenuRepository;
use Flash;

class MenuController extends Controller
{
    protected $service,$menuRepo;
    public function __construct(MenuService $service ,MenuRepository $menuRepo)
    {
        $this->service = $service;
        $this->menuRepo = $menuRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $payload = $request->all();
        $data = $this->service->getAll($payload);
        // dd($data[1]);
        return view('admin.menus.index')
            ->with('menusTree', $data[1])
            ->with('menus', $data[0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->service->getCreate();
        return view('admin.menus.create')->with("menus", $data[0])->with('routes', $data[1]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenusStoreRequest $request)
    {
        $params = $request->validated();
        try {
            $menu = $this->service->store($params);

            Flash::success('Menu saved successfully.');

            return redirect(route('menus.index'));

        } catch (\Exception $e) {
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
        $menu = $this->service->show($id);

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('menus.index'));
        }

        return view('admin.menus.show')->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->service->getEdit($id);
        return view('admin.menus.edit')
            ->with("menus", $data[1])
            ->with('menu', $data[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, $id)
    {

        $params = $request->validated();

        $this->service->update($params, $id);

        Flash::success('Menu updated successfully.');

        return redirect(route('menus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = $this->service->destroy($id);

        Flash::success('Menu deleted successfully.');
        return redirect(route('menus.index'));
    }

    public function changelocation(Request $request)
    {
        $menu = $this->menuRepo->find($request->id);
        $menu->location = $request->location;
        $menu->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
}
