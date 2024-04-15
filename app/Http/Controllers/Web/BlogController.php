<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Blog\BlogRepository;
use App\Models\Blog;
use App\Models\SeoContent;
use App\Services\BlogService;
use App\Services\CategoryBlogService;
use App\Repositories\BlogCategory\BlogCategoryRepository;
use App\Repositories\Customers\CustomersRepository;

class BlogController extends Controller
{
    private $blogRepo ,$blogCategoryRepo, $service, $categoryService , $customerRepo;

    public function __construct(BlogRepository $blogRepo, BlogCategoryRepository $blogCategoryRepo,
    BlogService $service ,CategoryBlogService $categoryService ,CustomersRepository $customerRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepo = $blogCategoryRepo;
        $this->service = $service;
        $this->categoryService = $categoryService;
        $this->customerRepo = $customerRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer()
    {
        $data = $this->customerRepo->paginate(8);
        return view('web.about.customer' , ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $blog = $this->blogRepo->with('blogCategory')->where('slug',$slug)->with('SeoContents')->first();
        if (isset($blog)) {
            $this->service->updateView($blog);
            $blogRelated  = Blog::where('category_blog_id',$blog->category_blog_id)->take(3)->get();
            return view('web.blog.detailed_blog',
                        [ 'blog'=> $blog,
                          'blogRelated'=> $blogRelated
                        ]);
        } else {
            return response()->view('web.blog.404');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function blogCategory($slug)
    {
        if($slug == 'tin-tuc')
        {
            $seoContent = SeoContent::whereIn('entity_type' , [SeoContent::SEO_NEWS])->first();
            $blogCategory = $this->blogCategoryRepo->first();
            $blog  = $this->blogRepo->where('category_blog_id',$blogCategory->id)->paginate(10);
            return view('web.blog.blog_category',
            [
              'blogCategory'=> $blogCategory,
              'blog' => $blog,
              'seoContent' => $seoContent
            ]);
        }
        $blogCategory = $this->categoryService->getblogCategory($slug);
        $blog  = $this->blogRepo->where('category_blog_id',$blogCategory->id)->paginate(10);
        return view('web.blog.blog_category',
        [
          'blogCategory'=> $blogCategory,
          'blog' => $blog
        ]);
    }

    public function search(Request $request)
    {
        $selectedFilters = $request->keyword_news;
        $seoContent = SeoContent::whereIn('entity_type' , [SeoContent::SEO_NEWS])->first();
        $blog = $this->blogRepo->where('title',"like" , '%'. $selectedFilters. '%')->orWhere('content', 'like', '%'.$selectedFilters.'%')
        ->paginate(20);
        $totalResults = $blog->total();
        return view('web.blog.search', compact('blog','selectedFilters','totalResults','seoContent'));
    }
}
