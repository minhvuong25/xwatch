<?php

namespace App\Http\Controllers\Admin;

use App\Helper\FuncLib;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TopProductCategory;
use App\Http\Controllers\Controller;

class TopProductCategoryController extends Controller
{
    // protected $topProductRepo;
    // public function __construct(TopProductCategoryRepository $topProductRepo)
    // {
    //     $this->topProductRepo = $topProductRepo;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FuncLib::data_tree(Category::where('parent_id', 0)->get()->toArray());
        $query = new TopProductCategory;

        if (isset($request["category_id"]) && $request["category_id"] > 0) 
            $query = $query->where("category_id", $request["category_id"]);

        $topProductCategories = $query->get();
        return view('admin.top_products_cats.index')
            ->with('categories', $categories)
            ->with('topProductCategories', $topProductCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
