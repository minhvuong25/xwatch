<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getAttributeValue(Request $request)
    {
        if (!isset($request->attribute_id))
            return '';

        $attributeValues = AttributeValue::where("attribute_id", $request->attribute_id)->get();
        $str = '<option value="0">No select</option>';
        foreach ($attributeValues as $value) {
            $str .= '<option value="' . $value->id . '">' . $value->value . '</option>';
        }
        return $str;
    }

    public function getDistrict(Request $request)
    {
        if (!isset($request->id)) return '';

        $districts = District::where("province_id", $request->id)->orderBy('name', 'desc')->get();

        if ($districts->count() == 0) return '';

        $str = ' <option value="0"> -- Quận / Huyện --</option>';

        foreach ($districts as $district) {
            $str .= '<option value="' . $district->id . '">' . $district->name . '</option>';
        }

        return $str;
    }

    public function getStore(Request $request)
    {

        $request = $request->all();
        $query = RetailerAddress::with(["province", "districts"])
                ->where('status', RetailerAddress::STORE_IS_AVAILABLE)
                ->where('type', RetailerAddress::STORE_LOCATION);

        if (isset($request["province"]) && $request["province"] > 0)
            $query = $query->where("province_id", $request["province"]);

        if (isset($request["district"]) && $request["district"] > 0)
            $query = $query->where("district_id", $request["district"]);

        $retailers = $query->get();

        $html = view("web.store.ajax", ["retailers" => $retailers])->render();

        return ["str" => $html, "retailerAddress" => $retailers];
    }
    
}
