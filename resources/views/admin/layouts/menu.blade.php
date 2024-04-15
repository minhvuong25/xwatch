<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{{ route('dashboard.index') }}"><span><i class="glyphicon glyphicon-home"></i>Tổng quan</span></a>
</li>
<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><span><i class="glyphicon glyphicon-shopping-cart"></i>Danh sách đơn hàng</span></a>
</li>

<li class="{{ Request::is('admin/policy*') ? 'active' : '' }}">
    <a href="{{ route('policy.index') }}"><span><i class="glyphicon glyphicon-cloud"></i>Điều khoản</span></a>
</li>

<li class="{{ Request::is('admin/menus*') ? 'active' : '' }}">
    <a href="{{ route('menus.index') }}">
        <span><i class="glyphicon glyphicon-list"></i>Menus</span>
    </a>
</li>

{{-- <li class="">
    <a href="{{ route('admin.order.affiliate') }}"><span>Đơn hàng đã xác nhận</span></a>
</li> --}}
<li class="{{ Request::is('admin/blog*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span><i class="glyphicon glyphicon-duplicate"></i>Tin tức</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/blog/create') ? 'active' : '' }}">
            <a href="{{ route('blog.create') }}"><span>Đăng tin tức</span></a>
        </li>
        <li class="{{ Request::is('admin/blog') ? 'active' : '' }}">
            <a href="{{ route('blog.index') }}"><span>Danh sách tin tức</span></a>
        </li>
        <li class="{{ Request::is('admin/categoryBlog*') ? 'active' : '' }}">
            <a href="{{ route('categoryBlog.index') }}"><span>Danh mục tin tức</span></a>
        </li>
    </ul>
</li>



<li class="{{ Request::is('admin/attributes*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span><i class="glyphicon glyphicon-object-align-left"></i>Thuộc tính</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/attributes*') ? 'active' : '' }}">
            <a href="{{ route('attributes.index') }}"><span>Thuộc tính</span></a>
        </li>

        <li class="{{ Request::is('admin/attributeValues*') ? 'active' : '' }}">
            <a href="{{ route('attributeValues.index') }}"><span>Giá trị thuộc tính</span></a>
        </li>
        <li class="{{ Request::is('admin/productAttributeValues*') ? 'active' : '' }}">
            <a href="{{ route('productAttributeValues.index') }}"><span>Giá trị thuộc tính sản phẩm</span></a>
        </li>
        {{-- //productAttributeValues --}}
    </ul>
</li>

{{-- <li class="{{ Request::is('admin/productCustomerColumns*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Cột code khách hàng sản phẩm</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('productCustomerColumns*') ? 'active' : '' }}">
            <a href="{{ route('productCustomerColumns.index') }}"><i class="fa fa-edit"></i><span>Cột code khách hàng sản phẩm</span></a>
        </li>

        <li class="{{ Request::is('productCustomerValues*') ? 'active' : '' }}">
            <a href="{{ route('productCustomerValues.index') }}"><i
                    class="fa fa-edit"></i><span>Giá trị code Khách hàng sản phẩm</span></a>
        </li>

    </ul>
</li> --}}

<li class="{{ Request::is('admin/products*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span><i class="glyphicon glyphicon-folder-close"></i>Sản phẩm</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/products/create') ? 'active' : '' }}">
            <a href="{{ route('products.create') }}"><span>Đăng sản phẩm</span></a>
        </li>
        <li class="{{ Request::is('admin/products') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}"><span>Quản lý sản phẩm</span></a>
        </li>
        <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}"><span>Danh mục sản phẩm</span></a>
        </li>
       
        <li class="{{ Request::is('admin/brands*') ? 'active' : '' }}">
            <a href="{{ route('brands.index') }}">
                <span>Thương hiệu</span>
            </a>
        </li>
        <li class="{{ Request::is('admin/warranty*') ? 'active' : '' }}">
            <a href="{{ route('warranty.index') }}"><span>Chế độ Bảo hành</span></a>
        </li>
         <li class="{{ Request::is('admin/productManual*') ? 'active' : '' }}">
            <a href="{{ route('productManual.index') }}"><span>Hướng dẫn sử dụng sản phẩm</span></a>
        </li> 
        <li class="{{ Request::is('admin/productImages*') ? 'active' : '' }}">
            <a href="{{ route('productImages.index') }}"><span>Hình ảnh sản phẩm</span></a>
        </li>
        {{-- <li class="{{ Request::is('admin/productAttributeValues*') ? 'active' : '' }}">
            <a href="{{ route('productAttributeValues.index') }}"><span>Product Attribute Values</span></a>
        </li> --}}
        {{-- <li class="{{ Request::is('topProducts*') ? 'active' : '' }}">
            <a href="{{ route('topProducts.index') }}"><span>Top Sản phẩm</span></a>
        </li> --}}
        {{-- <li class="{{ Request::is('productPromotions*') ? 'active' : '' }}">
            <a href="{{ route('productPromotions.index') }}"><span>Product Promotions</span></a>
        </li> --}}
        {{-- <li class="{{ Request::is('topProductCat*') ? 'active' : '' }}">
            <a href="{{ route('topProductCat.index') }}"><span>Top Sản phẩm theo danh mục</span></a>
        </li>
        <li class="{{ Request::is('productBestSellers*') ? 'active' : '' }}">
            <a href="{{ route('productBestSellers.index') }}"><span>Sản phẩm bán chạy</span></a>
        </li>
        <li class="{{ Request::is('productSuggest*') ? 'active' : '' }}">
            <a href="{{ route('productSuggest.index') }}"><span>Sản phẩm gợi ý</span></a>
        </li>
        <li class="{{ Request::is('productVariants*') ? 'active' : '' }}">
            <a href="{{ route('productVariants.index') }}"><span>Biến thể sản phẩm</span></a>
        </li> --}}
    </ul>
</li>
<li class="{{ Request::is('contact*') ? 'active' : '' }}">
    <a href="{{ route('contact.index') }}"><span><i class="glyphicon glyphicon-earphone"></i>Liên hệ</span></a>
</li>
<li class="{{ Request::is('banners*') ? 'active' : '' }}">
    <a href="{{ route('banners.index') }}"><span><i class="glyphicon glyphicon-plus"></i>Quản lý slide ảnh</span></a>
</li>
<li class="{{ Request::is('videoHome*') ? 'active' : '' }}">
    <a href="{{ route('videoHome.index') }}"><span><i class="glyphicon glyphicon-facetime-video"></i>Video Homes</span></a>
</li>
<!-- <li class="{{ Request::is('admin/categories*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span>Danh mục</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}"><span>Danh mục sản phẩm</span></a>
        </li>
        {{-- <li class="{{ Request::is('categoryBrands*') ? 'active' : '' }}">
            <a href="{{ route('categoryBrands.index') }}"><span>Danh mục Thương hiệu</span></a>
        </li>

        <li class="{{ Request::is('categoryAttributeFilters*') ? 'active' : '' }}">
            <a href="{{ route('categoryAttributeFilters.index') }}">
                <span>Bộ lọc danh mục</span>
            </a>
        </li> --}}

        {{--<li class="{{ Request::is('categoryAttributeValueFilters*') ? 'active' : '' }}">--}}
        {{--<a href="{{ route('categoryAttributeValueFilters.index') }}"><span>Category Attribute Value Filters</span></a>--}}
        {{--</li>--}}

        {{--<li class="{{ Request::is('categoryPriceFilters*') ? 'active' : '' }}">--}}
        {{--<a href="{{ route('categoryPriceFilters.index') }}">--}}
        {{--<span>Category Price Filters</span>--}}
        {{--</a>--}}
        {{--</li>--}}
    </ul>
</li> -->
<li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.analytics') }}">
        <span><i class="glyphicon glyphicon-equalizer"></i> Google analytics</span>
    </a>
</li>
<li class="{{ Request::is('admin/other*') ? 'active menu-open' : '' }} treeview">
    <a href="#">
        <span><i class="glyphicon glyphicon-th-large"></i>Khác</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        {{-- <li class="{{ Request::is('promotionImportLogs*') ? 'active' : '' }}">
            <a href="{{ route('promotionImportLogs.index') }}"><span>Promotion Import Logs</span></a>
        </li> --}}

        <li class="{{ Request::is('seoContents*') ? 'active' : '' }}">
            <a href="{{ route('seoContents.index') }}"><span>Nội dung Seos</span></a>
        </li>
        <li class="{{ Request::is('customerSays*') ? 'active' : '' }}">
            <a href="{{ route('customerSays.index') }}"><span>Khách hang nói về chúng tôi</span></a>
        </li>

        <li class="{{ Request::is('logo*') ? 'active' : '' }}">
            <a href="{{ route('logo.index') }}"><span>Logo</span></a>
        </li>

        <li class="{{ Request::is('storeAddresses*') ? 'active' : '' }}">
            <a href="{{ route('storeAddresses.index') }}"><span>Địa chỉ</span></a>
        </li>
        {{-- consultation --}}
        <li class="{{ Request::is('consultation*') ? 'active' : '' }}">
            <a href="{{ route('consultation.index') }}"><span>Tư vấn khách hàng</span></a>
        </li>
        <li class="{{ Request::is('bank*') ? 'active' : '' }}">
            <a href="{{ route('bank.index') }}"><span>Thông tin Ngân Hàng</span></a>
        </li>
      
        <li class="{{ Request::is('ads*') ? 'active' : '' }}">
            <a href="{{ route('ads.index') }}"><span>Quản cáo homes</span></a>
        </li>
        <li class="{{ Request::is('imageNew*') ? 'active' : '' }}">
            <a href="{{ route('imageNew.index') }}"><span>Ảnh bên mục tin tức homes</span></a>
        </li>
    </ul>
</li>


{{-- <li class="{{ Request::is('reviews*') ? 'active' : '' }}">
    <a href="{{ route('reviews.index') }}"><i class="fa fa-edit"></i><span>Đánh giá</span></a>
</li> --}}


{{-- <li class="{{ Request::is('tags*') ? 'active' : '' }}">
    <a href="{{ route('tags.index') }}"><i class="fa fa-edit"></i><span>Thẻ sản phẩm</span></a>
</li>


<li class="{{ Request::is('tagGroups*') ? 'active' : '' }}">
    <a href="{{ route('tagGroups.index') }}"><i class="fa fa-edit"></i><span>Nhóm thẻ</span></a>
</li>


<li class="{{ Request::is('labels*') ? 'active' : '' }}">
    <a href="{{ route('labels.index') }}"><i class="fa fa-edit"></i><span>Nhãn</span></a>
</li>

<li class="{{ Request::is('productLabels*') ? 'active' : '' }}">
    <a href="{{ route('productLabels.index') }}"><i class="fa fa-edit"></i><span>Nhãn sản phẩm</span></a>
</li>


<li class="{{ Request::is('userAgents*') ? 'active' : '' }}">
    <a href="{{ route('userAgents.index') }}"><i class="fa fa-edit"></i><span>Danh sách người dùng</span></a>
</li> --}}




