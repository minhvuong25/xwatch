<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;  

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Lấy danh sách quảng cáo
        $ads = Ads::where('status', 1)
        ->where('position', 1)
        ->whereNull('deleted_at')
        ->get();

        // Return view with ads data
       return view('web.home', compact('ads'));
    }
}
