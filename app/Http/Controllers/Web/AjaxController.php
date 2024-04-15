<?php

namespace App\Http\Controllers\Web;

use App\Models\District;
use App\Repositories\District\DistrictRepository;
use App\Repositories\Province\ProvinceRepository;
use App\Repositories\Wards\WardsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    protected $provinceRepo, $districtRepo, $wardRepo;

    public function __construct(
        ProvinceRepository $provinceRepo,
        DistrictRepository $districtRepo,
        WardsRepository $wardRepo
    )
    {
        $this->provinceRepo = $provinceRepo;
        $this->districtRepo = $districtRepo;
        $this->wardRepo = $wardRepo;
    }

    public function districts(Request $request)
    {
        $provinceId = $request->input('provinceId');
        $districts = $this->districtRepo->where('province_id', $provinceId)->get();
        return response()->json($districts);
    }
    public function wards(Request $request)
    {
        $districtId = $request->input('districtID');
        $wards = $this->wardRepo->where('district_id', $districtId)->get();
        return response()->json($wards); 
    }
}
