<?php

namespace App\Services;

use App\Repositories\Logo\LogoRepository;
use Flash;

class LogoService
{
    protected $logoRepo;
    public function __construct(LogoRepository $logoRepository)
    {
        $this->logoRepo = $logoRepository;
    }

    public function getAllData(array $payload)
    {
        $data = $this->logoRepo->all();
        return $data;
    }

    public function getCreate()
    {
        $logo = $this->logoRepo->all();
        return $logo;
    }

    public function store(array $input)
    {
        if (isset($input['source_url'])) {
            $image = $input['source_url'];
            $fileUpload = new FileUploadService();
            $path = "public/logo";
            $path = $fileUpload->upLoadImages($image, $path, ["size" => ["410" => ["width" => 410]]]);
            $name = last(explode("/", $path["path"]));
            $path = $path["path"];
            $input['path'] = str_replace("public", "image", $path);
            $input['source_url'] = $input['path'];
        }
        $this->logoRepo->create($input);

        Flash::success('logo saved successfully.');

        return redirect(route('logo.index'));
    }

    public function getEdit(int $id)
    {
        $logo = $this->logoRepo->find($id);
        return [$logo];
    }

    public function update(array $input, int $id)
    {
        $logo = $this->logoRepo->find($id);
        if (isset($input['source_url']))
        {
            $image = $input['source_url'];
            $fileUpload = new FileUploadService();
            $path = "public/logo";
            $path = $fileUpload->upLoadImages($image, $path, ["size" => ["410" => ["width" => 410]]]);
            $name = last(explode("/", $path["path"]));
            $path = $path["path"];
            $input['path'] = str_replace("public", "image", $path);
            $params['source_url'] = $input['path'];
        }
        $params['status'] = $input['status'];
        if ($params['status'] == 1) {
            $image = $this->logoRepo->where('status', 1)->update(['status' => 0]);
        }
        $logo->update($params);
        return $logo;
    }

    public function destroy(int $id)
    {
        $logo = $this->logoRepo->find($id);
        if (empty($logo)) {
            \Flash::error('Không tìm thấy logo');

            return;
        }

        $logo->delete($id);
        return null;
    }
}
