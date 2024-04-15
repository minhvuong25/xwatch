<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryBlogService;

class AjaxBlogCategoryController extends Controller
{

    private $service;

    public function __construct(CategoryBlogService $service)
    {
        $this->service = $service;
    }
    public function UpdateBlogCategory(Request $request)
    {
        $this->service->updateMain($request);

        return response()->json(['success' => true]);
    }
}
