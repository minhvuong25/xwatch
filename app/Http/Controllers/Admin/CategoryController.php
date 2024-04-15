<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Services\CategoryServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    protected $cateService;

    public function __construct(CategoryServices $cateService)
    {
        $this->cateService = $cateService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $payload = $request->all();
        $data = $this->cateService->getAll($payload);
        return view('admin.categories.index')
            ->with('cat_tree', $data['cat_tree'])
            ->with('categories', $data['categories']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->cateService->getData();
        return view('admin.categories.create')->with("categories", $categories);

    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $params = $request->all();
        try {
            DB::beginTransaction();
            $category = $this->cateService->store($params);
            DB::commit();
            Flash::success('Category saved successfully.');

            $response = [
                'message' => trans('Tạo danh mục thành công'),
                'data'    => $category->toArray(),
            ];
            return redirect()->route('categories.index')->with('message', $response['message']);

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
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
        $category = $this->cateService->find($id);
        return view('admin.categories.edit')
            ->with("categories", $category['categories'])
            ->with("seoContent", $category['seoContent'])
            ->with('category', $category['category']);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $params = $request->validated();
        if (($request->hasFile('image'))) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/categories'), $filename);
            $params['image'] = "/storage/categories/".$filename;
        }
        try {
            $this->cateService->update($id, $params);
            Flash::success("Cập nhật danh mục thành công.");
            return redirect(route('categories.index'));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->cateService->destroy($id);
        $response = [
            'message' => trans('Xóa thành công'),
        ];
        return redirect()->route('categories.index')->with('message', $response['message']);

    }
}
