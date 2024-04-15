<?php

namespace App\Http\Controllers\Web;

use App\Models\SeoContent;
use App\Models\StoreAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreAddressController extends Controller
{
    public function index(Request $request)
    {
        $seoContent = SeoContent::whereIn('entity_type' , [SeoContent::SEO_STORE])->first();
        $storeAddresses = StoreAddress::all();
        return view('web.store_address', compact('storeAddresses', 'seoContent'));
    }

}
