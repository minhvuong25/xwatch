<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand; 

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('web.brands.index', compact('brands'));
    }

    public function showByChar($char)
    {
        $brands = Brand::where('name', 'like', "%Đồng hồ {$char}%")->get();
        return view('web.brands.show_by_char', compact('brands', 'char'));
    }

}
