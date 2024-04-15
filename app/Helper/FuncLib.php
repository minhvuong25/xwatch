<?php

namespace App\Helper;

use Flash;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Menu;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Province;
use App\Models\BlogCategory;
use GuzzleHttp\Psr7\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class FuncLib
{
    public static function data_tree(array $data, $parent_id = 0, $level = 0)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                $child = FuncLib::data_tree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
                unset($data[$item['id']]);
            }
        }
        return $result;
    }

    public static function success($code = Response::HTTP_OK, $name = '', $return = '', array $data = null)
    {
        if (!empty($data)) {
            foreach ($data as $key => $item) {
            }
        }
        if ($code == Response::HTTP_NOT_FOUND) {
            return  Flash::error('Not Found');
        }
        Flash::success($name . ' saved successfully.');

        return redirect(route($return . '.index'));
    }

    public static function getBrands()
    {
        $listBrands = Brand::orderBy('position', 'ASC')->get();
        return $listBrands;
    }

    public static function getContact()
    {
        $Contacts = Contact::all();
        return $Contacts;
    }
    public static function getBanner()
    {
        $Banners = Banner::orderBy('position', 'asc')->get();
        return $Banners;
    }
    public static function getStoreAddress()
    {
        $StoreAddress = Province::with('storeAddress')->get();
        $StoreAddress = $StoreAddress->toarray();
        return $StoreAddress;
    }
    static function convertString($input)
    {
        if ($input) {

            $array = explode('_', $input); // Tách chuỗi thành mảng các phần tử cách nhau bởi dấu "_"
            $output = '';

            foreach ($array as $value) {
                $output .= $value . 'mm ; '; // Thêm 'mm ; ' vào cuối mỗi phần tử trong mảng
            }

            $output = rtrim($output, ' ; '); // Xóa dấu "; " thừa ở cuối chuỗi

            return $output;
        }elseif($input === null){
            $output = '';
        }else{
            $output = '';
        }

    }
    public static function getLogo()
    {
        $logo = Logo::where('status', 1)->first();
        return $logo;
    }
    public static function getBlog()
    {
        $blog = Blog::all();
        return $blog;
    }
    public static function  getBlogCategory()
    {
        $relatedList = BlogCategory::with('blog')->inRandomOrder()->take(3)->get();
        $relatedList = $relatedList->toarray();
        return $relatedList;
    }
    public static function getViewBlog()
    {
        $blogView = Blog::orderBy('view', 'desc')
            ->take(5)
            ->get();
         return $blogView;
    }
    public static function getManBlogCategry()
    {
        $blogCategory = BlogCategory::where('main',1)->with('blog')->first();
        return $blogCategory;
    }

    public static function getMenu($parent_id)
    {
        $data = Menu::where([
            ["parent_id", $parent_id],
            ["location", 0]
        ])
        ->orderBy('position', 'asc')
        ->get();
        return $data;
    }

    public static function fomatTime($date_str)
    {
        $date_obj = Carbon::parse($date_str);
        // $date_obj->setTimezone('Asia/Ho_Chi_Minh');
        $data = $date_obj->format('j \g\i\ờ i \p\hú\t , \n\gà\y j \t\h\á\n\g m \n\ă\m Y');
        return $data;
    }
    public static function  getmenuFooter()
    {
        $menuFooter = Menu::where('location', '=', 1)
        ->where('parent_id', '=', 0)
        ->get();
        return $menuFooter;
    }
    public static function convertYoutube($url) {
        $video_id = explode("?v=", $url);
        if (empty($video_id[1]))
            $video_id = explode("/v/", $url);
        $video_id = explode("&", $video_id[1]);
        $video_id = $video_id[0];
        return "https://www.youtube.com/embed/".$video_id;
    }
    public static function image( $request)
    {
        $image = Image::make($request->file('image'));
        $image->encode('jpg' , 80);
        $image = $image->getEncoded();
        return $image ;
    }
}
