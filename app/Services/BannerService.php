<?php

namespace App\Services;

use App\Models\Banner;
use Laracasts\Flash\Flash;
use App\Http\Requests\Banner\BannerRequest;
use App\Repositories\Banner\BannerRepository;

class BannerService
{
    protected $bannerRepo;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
    }

    public function data()
    {
        return $this->bannerRepo->all();
    }

    public function store($input)
    {

        if (isset($input['default_image'])) {
            $image = $input['default_image'];
            $fileUpload = new FileUploadService();
            $path = "public/banners";
            $path = $fileUpload->upLoadImages($image, $path,
                ["size" => [
                    "1170" => [
                        "width" => 1170,
                        "height" => 400
                    ]
                ]]);
            $name = last(explode("/", $path["path"]));
            $path = $path["path"];
            $input['name'] = $name;
            $input['path'] = str_replace("public", "image", $path);
            $input['url'] = $input['path'];
            $input['default_image'] = null;
        }
        $this->bannerRepo->create($input);

        Flash::success('Banner saved successfully.');

        return redirect(route('banners.index'));
    }

    protected $fieldSearchable = [
        'name',
        'path',
        'title',
        'slost',
        'status',
        'type',
        'url',
        'position',
    ];

    public function getFieldSearchable()
    {
        return $this->fieldSearchable;
    }

    public function find($id)
    {
        return $this->bannerRepo->find($id);
    }

    public function model()
    {
        return Banner::class;
    }

    public function destroy(int $id)
    {
        $banner = $this->bannerRepo->find($id);
        if (empty($banner)) {
            \Flash::error('Không tìm thấy banner');
            return;
        }
        $banner->delete($id);
        return null;
    }
}
