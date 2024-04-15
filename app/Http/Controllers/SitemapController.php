<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Blog;
use App\Models\Product;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Brand;

class SitemapController extends Controller
{
    public function createSitemap()
    {
        $sitemap = Sitemap::create();

        $blogPosts = Blog::all(); 

        foreach ($blogPosts as $post) {
            $updatedDate = $post->updated_at instanceof \DateTimeInterface ? $post->updated_at : new \Carbon\Carbon($post->updated_at);

            $sitemap->add(Url::create('/tin-tuc/' . $post->slug . '.html')
                ->setLastModificationDate($updatedDate)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        }

        $products = Product::all();
        foreach ($products as $product) {
            $updatedDate = $product->updated_at instanceof \DateTimeInterface ? $product->updated_at : new \Carbon\Carbon($product->updated_at);
            $sitemap->add(Url::create('/products/' . $product->slug . '.html') 
                ->setLastModificationDate($updatedDate)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9)); 
        }
        $blogCategories = BlogCategory::all();
        foreach ($blogCategories as $category) {
            $updatedDate = $category->updated_at instanceof \DateTimeInterface ? $category->updated_at : new \Carbon\Carbon($category->updated_at);
            $sitemap->add(Url::create('/danh-muc/' . $category->slug . '.html')
                ->setLastModificationDate($updatedDate)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7));
        }
        $productCategories = Category::all();
        foreach ($productCategories as $category) {
            $updatedDate = $category->updated_at instanceof \DateTimeInterface ? $category->updated_at : new \Carbon\Carbon($category->updated_at);
            $sitemap->add(Url::create('/category/' . $category->slug . '.html') 
                ->setLastModificationDate($updatedDate)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.6));
        }
        $brands = Brand::all();
        foreach ($brands as $brand) {
            $updatedDate = $brand->updated_at instanceof \DateTimeInterface ? $brand->updated_at : new \Carbon\Carbon($brand->updated_at);
            $sitemap->add(Url::create('/filter/' . $brand->slug) 
                ->setLastModificationDate($updatedDate)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.5));
        }
         // Lưu sitemap ban đầu vào file
        $filePath = public_path('sitemap.xml');
        $sitemap->writeToFile($filePath);

        // Đọc nội dung file sitemap ban đầu
        $xmlContent = file_get_contents($filePath);

        // Thêm processing instruction cho XML stylesheet vào đầu nội dung
        $xslPath = '/statics/stylemap/sitemap.xsl';
        $xmlContent = preg_replace(
            '/<\?xml version="1.0" encoding="UTF-8"\?>/i',
            "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<?xml-stylesheet type=\"text/xsl\" href=\"$xslPath\"?>", 
            $xmlContent
        );

        // Ghi đè nội dung sitemap với XML đã được chỉnh sửa
        file_put_contents($filePath, $xmlContent);

        return 'Sitemap has been generated with XSL and saved to ' . $filePath;
    }
}