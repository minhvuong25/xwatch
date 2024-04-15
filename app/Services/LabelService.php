<?php

namespace App\Services;

use App\Models\Label;
use App\Repositories\BaseRepository;
use App\Http\Requests\Label\LabelRequest;
use App\Repositories\Label\LabelRepository;
use App\Http\Requests\Label\LabelStoreRequest;

/**
 * Class LabelRepository
 * @package App\Repositories
 * @version November 18, 2021, 2:23 pm +07
*/

class LabelService
{
    protected $labelRepo;
    public function __construct(LabelRepository $labelRepo)
    {
        $this->labelRepo = $labelRepo;
    }

    public function all()
    {
        return $this->labelRepo->all();
    }

    public function create(LabelStoreRequest $request)
    {
        $input = $request->all();
        $input["code"] = Str::slug($input["name"], "");
        $input["img"] = "default.jpg";
        $label = $this->labelRepo->create($input);
        if (!empty($label)) {
            $fileUpload = new FileUploadService();
            $path = "public/labels/" . $label->id;
            $result = $fileUpload->upLoadImages($input["img_label"], $path, []);
            if ($result["status"]) {
                $label->img = last(explode("/", $result["path"]));
                $label->save();
            }
        }
        return $result;       

    }


    protected $fieldSearchable = [
        'name',
        'code',
        'img'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Label::class;
    }
}
