@extends('web.layouts.master')
@section('title')
{{'Đồng Hồ Thịnh Vượng'}}
@stop
@php
    $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
@endphp
@section('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />
    <link rel="shortcut icon" href="/image/favicon/favicon.png" />
    <link rel="icon" href="/image/favicon/favicon.png" type="image/x-icon" />
    <meta name="theme-color" content="#aa722b" />
      <meta name="description" content="{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta name="keywords" content="{{$seoContent->meta_keyword ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="name" content="{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="description" content="{{$seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="og:title" content="{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}">
      <meta property="og:description" content="{{$seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng'}}">
  
@stop
<!-- Google Analytics -->
@if(!empty($googleAnalyticsCode))
    {!! $googleAnalyticsCode !!}
@endif

@section('content')
    <link rel="stylesheet" href="{!! asset('css/search.css') !!}">
    <div class="container-header container">
        <div id="main_container" class="mt20">
            <div class="main-column">
                <div class='breadcrumbs cls '>

                    <div class='breadcrumbs_wrapper' itemscope itemtype="http://schema.org/WebPage">
                        <ul class="breadcrumb" itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList">

                            <li class="breadcrumb__item" itemprop="itemListElement" itemscope="itemscope"
                                itemtype="http://schema.org/ListItem">
                                <a title='Đồng hồ chính hãng ' href="" itemprop="item">
                                    <span itemprop="name">Trang chủ</span>
                                    <meta content="1" itemprop="position">
                                </a>

                            </li>
                            <li class="breadcrumb__item" itemprop="itemListElement" itemscope="itemscope"
                                itemtype="http://schema.org/ListItem">

                                <span itemprop="name">Tìm kiếm</span>
                                <meta content="2" itemprop="position">

                            </li>


                        </ul>
                    </div>

                </div>


                <div class="center-1col">



                    <div class='product_search'>
                        <div class="products-cat-search">
                            <div class="field_title">
                                <div class="title-name">
                                    <div class="cat-title">
                                        <div class="cat-title-main">
                                            <div class="title_icon">
                                                <h1><span>Có <strong>{{ count($products) }}</strong> sản phẩm với từ khóa:
                                                        <strong>{{ $selectedFilters }}</strong></span></h1>
                                            </div>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>

                            <section class='products-cat-frame'>
                                <div class='products-cat-frame-inner'>

                                    <div class="row bota_product_grid">
                                        @foreach($products as $product)
                                        <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                            <div class="bota_pr_item">
                                                <div class="bota_pr_image ">
                                                    <a href="{{  route('web.product.show', $product->slug) }}" title="">


                                                        @if ($product->images->first() === null)
                                                        <img src="" alt="donghothinhvuong.bota.vn">
                                                         @else
                                                        <img width="320px" height="365" alt="anh"
                                                        src="{{route("productImageShow", [
                                                            "id" => $product->id,
                                                            "fileName" => $product->images->first()->name ?? "default.jpg"
                                                            ])}}">
                                                         @endif


                                                        {{-- <img width="320" height="365" class="lazy" alt="" src="" /> --}}
                                                    </a>
                                                    <span class="bota_pr_installment">Trả góp 0%</span>
                                                </div>
                                                <h3 class="bota_pr_name">
                                                    <a href="{{  route('web.product.show', $product->slug) }}" title="">
                                                        {{$product->sku}}
                                                    </a>
                                                    <span class="bota_pr_cat_name">
                                                        {{$product->name}}
                                                  </span>
                                                </h3>
                                                <div class="discount">
                                                @if (!empty($product->compare_price) && !empty($product->price) && $product->price < $product->compare_price)
                                                    @php
                                                        $discountPercentage = round((1 - ($product->price / $product->compare_price)) * 100);
                                                    @endphp
                                                    <span>- {{ $discountPercentage }}%</span>
                                                @endif
                                                </div>
                                                <div class="bota_pr_price_arae">
                                                    @if (!empty($product->compare_price))
                                                        <div class="bota_price_old">
                                                            {{ number_format($product->compare_price, 0, '.', '.') }}₫
                                                        </div>
                                                    @endif
                                                    @if (!empty($product->price))
                                                        <div class="bota_pr_price_current">
                                                            {{ number_format($product->price, 0, '.', '.') }}₫
                                                        </div>
                                                    @else
                                                        <p style="color: red">Liên hệ với chúng tôi!</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach


                                        <div>
                                            {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                                        </div>

                                    <div class="bota_readmore_btn">
                                    <!--end: .vertical-->
                                </div>
                            </section>

                            {{-- <div class='pagination'><span title='Page 1' class='current'><span>1</span></span><a
                                    class='other-page' title='Page 2' href='/search-page2.html?q=1'><span>2</span></a><a
                                    class='other-page' title='Page 3' href='/search-page3.html?q=1'><span>3</span></a><a
                                    class='other-page' title='Page 4'
                                    href='/search-page4.html?q=1'><span>4</span></a><b>..</b><a class='next-page'
                                    title='Next page' href='/search-page2.html?q=1'>›</a><a class='last-page'
                                    title='Last page' href='/search-page166.html?q=1'>››</a>
                            </div> --}}
                        </div>

                    </div>


                </div>
                <!--end: .center-col-->



                <div class="clear"></div>
            </div>
        </div><!-- end.row -->
    </div> <!-- end.container -->
@stop
@section('script')
    <script></script>
@stop
