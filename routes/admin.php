<?php
 use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'verifyAdminLevel'])->group(function () {

        Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('policy', App\Http\Controllers\Admin\PolicyController::class);
        Route::resource('warranty',App\Http\Controllers\Admin\WarrantyController::class);
        Route::post('upload', [App\Http\Controllers\Web\HomeController::class, 'ckFinder'])
            ->name('uploadAdmin');
        Route::resource('seoContents', App\Http\Controllers\Admin\SeoContentController::class);
        Route::post('/seoContents/list-data', [\App\Http\Controllers\Admin\SeoContentController::class, 'getData'])->name('seocontent.getData');
        Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);
        Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
        Route::resource('tagGroups', App\Http\Controllers\Admin\TagGroupController::class);
        Route::resource('attributes', App\Http\Controllers\Admin\AttributeController::class);
        Route::resource('categoryBrands', App\Http\Controllers\Admin\CategoryBrandController::class);
        Route::resource('categoryAttributeFilters', App\Http\Controllers\Admin\CategoryAttributeFilterController::class);
        Route::resource('categoryAttributeValueFilters', App\Http\Controllers\Admin\CategoryAttributeValueFiltersController::class);

        Route::resource('attributeValues', App\Http\Controllers\Admin\AttributeValueController::class);
        Route::post('categoryFilter/update-brand', [App\Http\Controllers\Admin\CategoryFilterController::class, 'updateCategoryBrand'])
            ->name('categoryFilter.updateCategoryBrand');

        Route::post('categoryFilter/update-price', [App\Http\Controllers\Admin\CategoryFilterController::class, 'updateCategoryPrice'])
            ->name('categoryFilter.updateCategoryPrice');

        Route::post('categoryFilter/update-attribute-value', [App\Http\Controllers\Admin\CategoryFilterController::class, 'updateCategoryAttributeValueFilter'])
            ->name('categoryFilter.updateCategoryAttributeValueFilter');

        Route::post('categoryFilter/category-tag', [App\Http\Controllers\Admin\CategoryFilterController::class, 'categoryTag'])
            ->name('categoryFilter.categoryTag');
        Route::resource('categoryPriceFilters', App\Http\Controllers\Admin\CategoryPriceFiltersController::class);

        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
        Route::resource('categoryBlog', App\Http\Controllers\Admin\CategoryBlogController::class);


        // Route::resource('vendors', App\Http\Controllers\Admin\VendorController::class);

        Route::resource('brands', App\Http\Controllers\Admin\BrandController::class);

        Route::resource('productVariants', App\Http\Controllers\Admin\ProductVariantController::class);

        Route::resource('productImages', App\Http\Controllers\Admin\ProductImageController::class);

        Route::resource('menus', App\Http\Controllers\Admin\MenuController::class);

        Route::get('/ajax/attribute-value', [App\Http\Controllers\Admin\AjaxController::class, 'getAttributeValue'])
            ->name('ajaxGetAttributeValue');


        Route::resource('productAttributeValues', App\Http\Controllers\Admin\ProductAttributeValueController::class);

        Route::resource('topProducts', App\Http\Controllers\Admin\TopProductController::class);

        Route::post('orders/addCart', [App\Http\Controllers\Admin\OrdersController::class, 'addCart'])
            ->name("addCart");

        Route::get('orders/removerCartItem', [App\Http\Controllers\Admin\OrdersController::class, 'removerCartItem'])
            ->name("removerCartItem");

        Route::post('orders/saveCart', [App\Http\Controllers\Admin\OrdersController::class, 'saveCart'])
            ->name("saveCart");

        Route::post('orders/postUpdate/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'postUpdate'])
            ->name("admin.order.postUpdate");

        Route::get('orders/loadCart/{orderId}', [App\Http\Controllers\Admin\OrdersController::class, 'loadCart'])
            ->name("admin.order.loadCart");

        Route::get('orders/postUpdateOrder/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'postUpdateOrder'])
            ->name("admin.order.postUpdateOrder");

        Route::get('logo/UpdateLogo', [App\Http\Controllers\Admin\AjaxLogoController::class, 'UpdateLogo'])
        ->name("admin.logo.UpdateLogo");

        Route::get('blogCategory/UpdateBlogCategory', [App\Http\Controllers\Admin\AjaxBlogCategoryController::class, 'UpdateBlogCategory'])
        ->name("admin.blogCategory.UpdateBlogCategory");

        Route::resource('orders', App\Http\Controllers\Admin\OrdersController::class);

        Route::get('orders/affiliate/user', [App\Http\Controllers\Admin\OrdersController::class, 'getAffiliateUser'])
            ->name("admin.order.affiliate");
        Route::get('/ajax/getDistrict', [App\Http\Controllers\Admin\AjaxController::class, 'getDistrict'])
            ->name('ajax.getDistrict');


        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

        Route::resource('banners', App\Http\Controllers\Admin\BannerController::class);

        Route::resource('logo', App\Http\Controllers\Admin\LogoController::class);

        Route::resource('storeAddresses', App\Http\Controllers\Admin\StoreAddressController::class);

        Route::resource('contact', App\Http\Controllers\Admin\ContactController::class);

        Route::resource('pageNews', App\Http\Controllers\Admin\PageNewsController::class);

        Route::resource('categoryBrands', App\Http\Controllers\Admin\CategoryBrandController::class);

        Route::resource('categoryAttributeFilters', App\Http\Controllers\Admin\CategoryAttributeFilterController::class);

        Route::resource('categoryAttributeValueFilters', App\Http\Controllers\Admin\CategoryAttributeValueFiltersController::class);

        Route::resource('categoryPriceFilters', App\Http\Controllers\Admin\CategoryPriceFiltersController::class);

        Route::post('productPromotions/file/upload', [App\Http\Controllers\Admin\ProductPromotionController::class, 'fileUpload'])
            ->name('productPromotions.fileUpload');
        Route::get('sync-promotion-netsuite', [App\Http\Controllers\Admin\ProductPromotionController::class, 'syncPromotion'])->name("sync_promotion_netsuite");
        Route::resource('productPromotions', App\Http\Controllers\Admin\ProductPromotionController::class);


        Route::resource('promotionImportLogs', App\Http\Controllers\Admin\PromotionImportLogController::class);

    
        Route::get('seoContents/brands', [App\Http\Controllers\Admin\SeoContentController::class, 'seoContentBrand'])
            ->name("seoContent_brand");

        Route::get('seoContents/finId', [App\Http\Controllers\Admin\SeoContentController::class, 'seoContentDetail'])
            ->name("seoContent_detail");

        Route::get('seoContents/finId/product', [App\Http\Controllers\Admin\SeoContentController::class, 'seoContentProduct'])
            ->name("seoContent_product");

        Route::resource('seoContents', App\Http\Controllers\Admin\SeoContentController::class);

    

        Route::resource('topProductCat', App\Http\Controllers\Admin\TopProductCategoryController::class);


        Route::resource('reviews', App\Http\Controllers\Admin\ReviewController::class);

        Route::post('review/file/upload', [App\Http\Controllers\Admin\ReviewController::class, 'fileUpload'])
            ->name('review.fileUpload');


        Route::get('changeStatus', [App\Http\Controllers\Admin\ProductController::class, 'changeStatus'])->name("productChangeStatus");
        Route::get('changeStatusHome', [App\Http\Controllers\Admin\AdsController::class, 'changeStatus'])->name("adsChangeStatus");
        Route::get('changelocation', [App\Http\Controllers\Admin\MenuController::class, 'changelocation'])->name("changelocation");

        Route::resource('notifySales', App\Http\Controllers\Admin\NotifySaleController::class);

        Route::get('add/notify-sale/product', [App\Http\Controllers\Admin\NotifySaleController::class, 'addNotifySaleProduct'])
            ->name("notify_sale_product");

        Route::resource('tags', App\Http\Controllers\Admin\TagController::class);

        Route::resource('productCustomerColumns', App\Http\Controllers\Admin\ProductCustomerColumnController::class);

        Route::resource('productCustomerValues', App\Http\Controllers\Admin\ProductCustomerValueController::class);

        Route::resource('productManual', App\Http\Controllers\Admin\ProductManualController::class);

        Route::resource('tagGroups', App\Http\Controllers\Admin\TagGroupController::class);

        Route::post('product/tags/{productId}', [App\Http\Controllers\Admin\ProductController::class, 'addTag'])
            ->name("admin.product.addTag");

        Route::post('product/import', [App\Http\Controllers\Admin\ProductController::class, 'import'])
            ->name("admin.product.import");

        Route::get('product/csvFacebook', [App\Http\Controllers\Admin\ProductController::class, 'csvFacebook'])
            ->name('admin.product.csvFacebook');

        Route::post('upload', [App\Http\Controllers\Web\HomeController::class, 'ckFinder'])
            ->name('uploadAdmin');

        Route::resource('productBestSellers', App\Http\Controllers\Admin\ProductBestSellerController::class);

        Route::resource('productSuggest', App\Http\Controllers\Admin\ProductSuggestController::class);


        Route::get('export-order', [App\Http\Controllers\Admin\OrdersController::class, 'export'])->name('export-order');

        Route::resource('labels', App\Http\Controllers\Admin\LabelController::class);

        Route::resource('productLabels', App\Http\Controllers\Admin\ProductLabelController::class);
        Route::resource('userAgents', App\Http\Controllers\Admin\UserAgentController::class);
        Route::resource('customerSays', App\Http\Controllers\Admin\CustomerSayController::class);
        Route::resource('consultation', App\Http\Controllers\Admin\ConsultationController::class);
        //DashboardController
        Route::resource('dashboard', App\Http\Controllers\Admin\DashboardController::class);
        Route::resource('bank', App\Http\Controllers\Admin\BankController::class);
        Route::resource('videoHome', App\Http\Controllers\Admin\VideoHomesController::class);
        Route::resource('imageNew', App\Http\Controllers\Admin\ImageNewController::class);
        Route::resource('ads', App\Http\Controllers\Admin\AdsController::class);
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.analytics');
        Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    });
});
