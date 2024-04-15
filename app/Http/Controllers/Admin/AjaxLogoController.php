<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LogoAjaxService;
use Illuminate\Http\Request;

class AjaxLogoController extends Controller
{
    private $service;

    public function __construct(LogoAjaxService $service )
    {
        $this->service = $service;

    }

    public function UpdateLogo(Request $request)
    {
        $this->service->update($request);

        return response()->json(['success' => true]);
    }
}
