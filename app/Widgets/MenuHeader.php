<?php

namespace App\Widgets;

use App\Models\Logo;
use App\Models\Menu;
use App\Repositories\Logo\LogoRepository;
use App\Repositories\Menu\MenuRepository;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuHeader extends AbstractWidget
{
    protected $menuRepo, $logoRepo;
    public function __construct(array $config = [], MenuRepository $menuRepo, LogoRepository $logoRepo)
    {
        parent::__construct($config);
        $this->menuRepo = $menuRepo;
        $this->logoRepo = $logoRepo;
    }

    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(Request $request)
    {
        $menus = $this->menuRepo->orderBy('position', 'asc')->get();
        $logos = $this->logoRepo->all();
        $requestUrl = env("APP_URL") . $request->segment(1);
        $menus = $this->showCategories($menus->toArray(), 0, 0, 0, $requestUrl);
        return view('widgets.menu_header', ["menus" => $menus, 'logos' => $logos]);
    }

    /**
     * @param $categories
     * @param int $parent_id
     * @param int $level
     * @param int $count
     * @param string $requestUrl
     * @return string
     */
    private function showCategories($categories, $parent_id = 0, $level = 0, $count = 0, $requestUrl = '')
    {
        // $html = '';
        // $cate_data = array();
        // usort($categories, function ($a, $b) {
        //     return $a['position'] - $b['position'];
        // });
        // foreach ($categories as $key => $item) {
        //     if ($item['parent_id'] == $parent_id) {
        //         $cate_data[] = $item;
        //         unset($categories[$key]);
        //     }
        // }
        $html = '';
        $cate_data = array();
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                $cate_data[] = $item;
                unset($categories[$key]);
            }
        }
        if ($cate_data) {
            $html .= '<ul class="menu-root">';

            foreach ($cate_data as $key => $item) {
                // dd($item);
                $submenu = $this->showCategories($categories, $item['id'], $level + 1, $count, '');

                $html .= '<li class="item">';

                // Update the href attribute to include the category parameter as Str::slug($item["name"])
                // $html .= '<a href="' . route('product', ['category' => Str::slug($item["name"])]) . '" class="name" title="' . $item["name"] . '">' . $item["name"] . '</a>';
                $html .= '<a  href="' . $item["url"];
                $html .= '" class="name ';
                if ($requestUrl == $item["url"]) $html .= 'active';

                $html .= '"><span>';
                $html .= $item['name'] . '</span></a>';
                if (!empty($submenu)) {
                    $html .= '<div class="highlight layer_menu_' . ($level + 1) . '">';
                    $html .= $submenu;
                    $html .= '</div>';
                }

                $html .= '</li>';

                $count++;
            }

            $html .= '</ul>';
        }

        return $html;
    }

    
}
