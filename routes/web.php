<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('image/products/{id}/{fileName}', function ($id, $fileName) {
    $extension = last(explode('.', $fileName));
    $storagePath = storage_path('app/public/products/' . $id . "/" . $fileName);
    if ($fileName === "default.jpg")
        return response()->file(public_path("image/product_default.jpg"), array('Content-Type' => 'image/' . $extension));

    return response()->file($storagePath, array('Content-Type' => 'image/' . $extension));
})->name("productImageShow");

Route::get('image/{folder}/{fileName}', function ($folder, $fileName) {
    $extension = last(explode('.', $fileName));
    $storagePath = storage_path('app/public/' . $folder . '/' . $fileName);
    return response()->file($storagePath, array('Content-Type' => 'image/' . $extension));
})->name("showImageFolder");

Route::get('image/L/{fileName}', function ($fileName) {
    $extension = last(explode('.', $fileName));
    $storagePath = storage_path('app/public/banners/' . $fileName);
    return response()->file($storagePath, array('Content-Type' => 'image/' . $extension));
})->name("showImageBanner");



Route::get('image/{entity}/{id}/{size}/{fileName}', function ($entity, $id, $size, $fileName) {
    try {
        $extension = last(explode('.', $fileName));
        $storagePath = 'app/public/' . $entity . '/' . $id;

        if ($size > 0) {
            if (file_exists(storage_path($storagePath . "/" . $size . "/" . $fileName))) {
                $storagePath .= "/" . $size;
            }
        }

        $storagePath = storage_path($storagePath . "/" . $fileName);

        if ($fileName === "default.jpg")
            return response()->file(public_path("image/product_default.jpg"), array('Content-Type' => 'image/' . $extension));

        return response()->file($storagePath, array('Content-Type' => 'image/' . $extension));
    } catch (\Exception $exception) {
        return null;
    }
})->name("showImage");

Route::get('/view-daily-log', [\App\Http\Controllers\LogController::class, 'viewDailyLog'])->name('view-daily-log');


include("admin.php");
include("client.php");
//about/he-thong-cua-hang
Route::prefix('/about')->group(function () {
    Route::get('.html', [App\Http\Controllers\Web\AboutController::class, 'about'])->name('about');
    Route::get('/introduce.html', [App\Http\Controllers\Web\AboutController::class, 'introduce'])->name('introduce');
    Route::get('/philosophy.html', [App\Http\Controllers\Web\AboutController::class, 'philosophy'])->name('philosophy');
    Route::get('/guarantee.html', [App\Http\Controllers\Web\AboutController::class, 'guarantee'])->name('guarantee');
    Route::get('/he-thong-cua-hang.html', [App\Http\Controllers\Web\AboutController::class, 'shopSystem'])->name('shopSystem');
});
Route::prefix('/filter')->group(function () {
    Route::get('', [App\Http\Controllers\Web\ProductController::class, 'index'])->name('product');
    Route::get('/{category}', [App\Http\Controllers\Web\ProductController::class, 'index']);
    Route::post('/filter', [App\Http\Controllers\Web\ProductController::class, 'filter'])->name('web.products.filter');
    Route::post('/products/sort', [App\Http\Controllers\Web\ProductController::class, 'sort'])->name('products.sort');
    Route::get('/filter/{category?}', [App\Http\Controllers\Web\ProductController::class, 'index'])->name('product');
});
Route::get('/thuong-hieu/{char}.html', [App\Http\Controllers\Web\BrandController::class, 'showByChar'])->name('brand.showByChar');
Route::prefix('/accessory.html')->group(function () {
    Route::get('', [App\Http\Controllers\Web\AccessoryController::class, 'index'])->name('product');
    Route::get('/{type}', [App\Http\Controllers\Web\AccessoryController::class, 'index']);
});
Route::get('accessory/{type}', [App\Http\Controllers\Web\AccessoryController::class, 'index']);
Route::get('/accessoryfilter', [App\Http\Controllers\Web\AccessoryController::class, 'filter'])->name('accessoryfilter');

Route::post('/tim-kiem.html', [App\Http\Controllers\Web\SearchController::class, 'search'])->name('search.home');
Route::get('/tim-kiem-tin-tuc.html', [App\Http\Controllers\Web\BlogController::class, 'search'])->name('search.blog');
Route::get('/thuong-hieu.html', [App\Http\Controllers\Web\BrandController::class, 'index'])->name('brand');
Route::get('/he-thong-cua-hang.html', [App\Http\Controllers\Web\StoreAddressController::class, 'index'])->name('address');

// chi itet san pham
Route::get('products/{slug}.html', [App\Http\Controllers\Web\ProductController::class, 'product'])->name('web.product.show');
Route::post('/consulation.html', [App\Http\Controllers\Web\ProductController::class, 'consulation'])->name('consulation');

// gio hang
Route::any('/add-to-cart/{id}', [App\Http\Controllers\Web\CartController::class, 'addToCart'])->name('cart.addToCart');
Route::get('/addCartAjax/{id}', [App\Http\Controllers\Web\CartController::class, 'addCartAjax'])->name('addToCart');
Route::get('/show-cart.html', [App\Http\Controllers\Web\CartController::class, 'showCart'])->name('cart.showCart');
Route::get('/update-cart', [App\Http\Controllers\Web\CartController::class, 'updateCart'])->name('cart.updateCart');
Route::get('/delete-cart-item', [App\Http\Controllers\Web\CartController::class, 'deleteCartItem'])->name('cart.deleteCartItem');
Route::get('/delete-cart', [App\Http\Controllers\Web\CartController::class, 'clearCart'])->name('cart.deleteCart');


Route::post('/districts', [App\Http\Controllers\Web\AjaxController::class, 'districts'])->name('cart.postDistrict');
Route::post('/wards', [App\Http\Controllers\Web\AjaxController::class, 'wards'])->name('cart.postWards');
//order
Route::post('/order.html', [App\Http\Controllers\Web\OrderController::class, 'addOrder'])->name('addOrder');

//sendmail
Route::get('/test-mail', [App\Http\Controllers\Client\HomeController::class, 'sendConfirmMailTest']);
Route::get('/send-mail-confirm', [App\Http\Controllers\Client\HomeController::class, 'sendConfirmMail']);
//filter
Route::get('/test', [App\Http\Controllers\Web\ProductController::class, 'filterAttributes'])->name('testfilter');

//blog

Route::get('/tin-tuc/{slug}.html', [App\Http\Controllers\Web\BlogController::class, 'show'])->name('web.blog.show');
Route::get('/danh-muc/{slug}.html', [App\Http\Controllers\Web\BlogController::class, 'blogCategory'])->name('web.blogCategory.show');

//Kh hang noi
Route::get('/khachhang.html', [App\Http\Controllers\Web\BlogController::class, 'customer'])->name('web.customer');

Route::get('/sitemap', [SitemapController::class, 'createSitemap']);

Route::get('testShopee', [TestController::class, 'init']);

Route::fallback(function () {
    return view('errors.404');
});
Route::get('/expired', function () {
    $expirationDate = env('EXPIRATION_DATE', 'Ngày hết hạn không được cấu hình');
    return view('expired', compact('expirationDate'));
})->name('expired');