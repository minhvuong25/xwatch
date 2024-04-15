<?php

namespace App\Services;

use App\Helper\FuncLib;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\BlogCategory\BlogCategoryRepository;
use Illuminate\Support\Facades\DB;


class BlogService
{
    private $blogRepo, $categoryRepo;

    public function __construct(BlogRepository $blogRepo, BlogCategoryRepository $categoryRepository)
    {
        $this->blogRepo = $blogRepo;
        $this->categoryRepo = $categoryRepository;
    }

    public function getAllData(array $payload)
    {
        $data = $this->blogRepo->all();
        $categoryBlog = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categoryBlog->toArray());
        return [$data, $categories];
    }

    public function getCreate()
    {
        $categories = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categories->toArray());
        return $categories;
    }

    public function store(array $input)
    {
        if (isset($input['default_image'])) {
            $image = $input['default_image'];
            $fileUpload = new FileUploadService();
            $path = "public/blog";
            $path = $fileUpload->upLoadImages($image, $path, ["size" => ["410" => ["width" => 410]]]);
            $name = last(explode("/", $path["path"]));
            $path = $path["path"];
            $input['path'] = str_replace("public", "image", $path);
            $input['default_image'] = $input['path'];
        }

        return $this->blogRepo->create($input);
    }

    public function getEdit(int $id)
    {
        $blog = $this->blogRepo->find($id);
        $categories = $this->categoryRepo->all();
        $categories = FuncLib::data_tree($categories->toArray());

        return [$categories, $blog];
    }

    public function update(array $params, int $id)
    {
        $blog = $this->blogRepo->find($id);

        if (isset($params['default_image']))
        {
            $image = $params['default_image'];
            $fileUpload = new FileUploadService();
            $path = "public/blog";
            $path = $fileUpload->upLoadImages($image, $path, ["size" => ["410" => ["width" => 410]]]);
            $name = last(explode("/", $path["path"]));
            $path = $path["path"];
            $params['path'] = str_replace("public", "image", $path);
            $params['default_image'] = $params['path'];
        }

        $blog->update($params);

        return $blog;
    }
    public function find($id)
    {
        return $this->blogRepo->find($id);
    }
    public function delete($id)
    {
        return $this->blogRepo->delete($id);
    }
    public function updateView($blog)
    {
        $view = $blog->view;
        $view++;

        DB::beginTransaction();

        try {
            $blog->update(['view' => $view]);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
    public function getRelatedCategorie($id)
    {
        return $this->categoryRepo->with('blog')->take(3)->get();

    }
}
