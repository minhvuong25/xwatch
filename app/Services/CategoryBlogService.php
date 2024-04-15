<?php

namespace App\Services;

use App\Helper\FuncLib;
use App\Repositories\BlogCategory\BlogCategoryRepository;

class CategoryBlogService
{
    private $categoryBlogRepo;

    public function __construct(BlogCategoryRepository $categoryBlogRepo)
    {
        $this->categoryBlogRepo = $categoryBlogRepo;
    }

    public function getAllData(array $payload)
    {
        $categories =  $this->categoryBlogRepo->all();
        $cat_tree = FuncLib::data_tree($categories->toArray());
        return [
            $categories, $cat_tree
        ];
    }

    public function store(array $params)
    {
        return $this->categoryBlogRepo->create($params);
    }

    public function update(array $params, $id)
    {
        $blogCate = $this->categoryBlogRepo->find($id);
        $blogCate->update($params);
        return $blogCate;
    }

    public function edit($id)
    {
        $category = $this->categoryBlogRepo->find($id);
        $categories = $this->categoryBlogRepo->all();
        $categories = FuncLib::data_tree($categories->toArray());
        return [$category, $categories];
    }
    public function destroy($id)
    {
        $cateBlog = $this->categoryBlogRepo->find($id);
        $cateBlog->delete($id);
        return null;
    }

    public function getCreate()
    {
        $cate = $this->categoryBlogRepo->all();
        $categories = FuncLib::data_tree($cate->toArray());
        return $categories;
    }
    public function getblogCategory($slug)
    {
        return $this->categoryBlogRepo->with('blog')->where('slug',$slug)->first();
    }

    public function updateMain($request)
    {
        $categoryBlog = $this->categoryBlogRepo->find($request->id);
        $params['main'] = $request->main =='on' ? 1 : 0;
        if ($params['main'] == 1) {
            $this->categoryBlogRepo->where('main', 1)->update(['main' => 0]);
        }
        $categoryBlog->update($params);
        return $categoryBlog;


    }
}
