<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutController extends Controller
{
    public function about(){
        return view('web.about.index');
    }
    public function introduce(){
        return view('web.about.introduce');
    }
    public function philosophy(){
        return view('web.about.philosophy');
    }
    public function guarantee(){
        return view('web.about.guarantee');
    }
    public function shopSystem(){
        return view('web.about.shopSystem');
    }
    
}
