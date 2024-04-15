@extends('web.layouts.master')
@section('title')
{{$seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng'}}
@stop

@section('meta')
@php
    $logo = \App\Helper\FuncLib::getLogo();
    $phone = \App\Models\Contact::query()->first();
    $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
@endphp
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />
    <link rel="shortcut icon" href="/image/favicon/favicon.png" />
    <link rel="icon" href="/image/favicon/favicon.png" type="image/x-icon" />
    <meta name="theme-color" content="#aa722b" />
    <meta name="description" content="{{ $seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta name="keywords" content="{{ $seoContent->meta_keyword ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="description" content="{{ $seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="og:title" content="{{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="dc:description og:description schema:description" name="description" content="{{ $seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}" />
    <meta property="og:image:alt" content="{{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}" />
    <meta proschperty="og:description" content="{{ $seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}" />
    <meta property="og:description" content="{{ $seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="og:site_name" content="{{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}" />

    <meta property="og:image" content="{{ ($logo) ? asset($logo->source_url) : '#' }}" />
    <meta property="og:image:secure_url" content="{{ ($logo) ? asset($logo->source_url) : '#' }}" />
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "{{ request()->url() }}",
            "name": "{{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "{{ $phone ? $phone->phone : '081.30.55555'}}",
                "contactType": "Customer service"
            }
        }
    </script>
@endsection
<!-- Google Analytics -->
@if(!empty($googleAnalyticsCode))
    {!! $googleAnalyticsCode !!}
@endif
@section('content')
    <div class="bota_body_center">
        <div class="bota_breadcrumb_main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                    <li><a href="/" title="Đồng hồ">Đồng hồ</a></li>
                    @if (!empty($category))<li><span> {{ $category->name }} </span></li>@endif
                </ul>
            </div>
        </div>
        <div class="bota_product_page">
            <div class="container">
                @if (!empty($category->name)) 
                <div class="bota_page_title">
                    <h1><span>{{ $category->name }} </span></h1>
                </div>
                @endif
                <div class="bota_filter_manufactory">

                    @foreach ($brands as $brand)
                        <a href="#" title="">
                            <img width="144" id="{{ $brand->id }}" class="image" height="90" alt="{{ $brand->name}}"
                                src="{!! asset('uploads/brands/' . $brand->image) !!}"   name="brand_cb" value="{{ $brand->id }}" >
                        </a>
                    @endforeach
                </div>
                @if (!empty($category->name)) 
                <div class="bota_all_summary">
                    <div class="bota_summary_content_filter">
                    {!! html_entity_decode($category->description) !!} 
                    </div>
                    <div class="bota_viewmore">Xem thêm</div>
                </div>
                @endif
            </div>
        </div>
        <div class="bota_product_center_page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-sm-3">
                        <div class="bota_block_product_filter clearfix">
                            <div class="bota_field_area bota_field_item" id="field_manufactory">
                                <div class="bota_field_name normal field field_opened " data-id="id_field_manufactory">
                                    Thương hiệu
                                    <span class="dropdow-svg">
                                        <svg x="0px" y="0px" viewBox="0 0 255 255"
                                            style="enable-background:new 0 0 255 255;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <polygon points="0,63.75 127.5,191.25 255,63.75"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div id="manufactory"
                                    class="bota_field_label bota_filters_in_field filters_in_field_2_column filter_4_manufactory">
                                    <div class="bota_bfilters_in_field_inner cls">
                                        @foreach ($brands as $brand)
                                            <div class="cls item filter60 filter_attribute">
                                                <input type="checkbox" {{ ($item && $brand->slug == $item) ? 'checked' : '' }}
                                                       @if(isset($brandId) &&  $brand->id == $brandId)
                                                           checked
                                                       @endif
                                                       name="brand_cb" value="{{ $brand->id }}">
                                                <i class="icon_v1 "></i>{{ $brand->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="bota_field_area bota_field_item" id="field_price">
                                <div class="bota_field_name normal field field_opened " data-id="id_field_price">
                                    Mức giá
                                    <span class="dropdow-svg">
                                        <svg x="0px" y="0px" viewBox="0 0 255 255"
                                            style="enable-background:new 0 0 255 255;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <polygon points="0,63.75 127.5,191.25 255,63.75"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div id="price"
                                    class="bota_field_label bota_filters_in_field filters_in_field_1_column filter_4_price">
                                    <div class="filters_in_field_inner cls">
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == "dong-ho-duoi-2-trieu") ? 'checked' : '' }}
                                                name="price_cb" @if(isset($price) && $price == 'dong-ho-duoi-2-trieu') checked @endif value="min"><i class="icon_v1 "></i>Dưới 2 triệu
                                        </div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == "dong-ho-2-5-trieu") ? 'checked' : '' }}
                                                name="price_cb" @if(isset($price) && $price == 'dong-ho-2-5-trieu') checked @endif value="2m"><i class="icon_v1 "></i>Từ 2 triệu - 5
                                            triệu</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == "dong-ho-5-10-trieu") ? 'checked' : '' }}
                                                name="price_cb" @if(isset($price) && $price  == 'dong-ho-5-10-trieu') checked @endif value="3m"><i class="icon_v1 "></i>Từ 5 triệu -
                                            10
                                            triệu</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == "dong-ho-10-20-trieu") ? 'checked' : '' }}
                                                name="price_cb" @if(isset($price) && $price  == 'dong-ho-10-20-trieu') checked @endif value="4m"><i class="icon_v1 "></i>Từ 10 triệu -
                                            20
                                            triệu</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == "ong-ho-20-50-trieu") ? 'checked' : '' }}
                                                name="price_cb" @if(isset($price) && $price  == 'dong-ho-20-50-trieu') checked @endif value="5m"><i class="icon_v1 "></i>Từ 20 triệu -
                                            50
                                            triệu</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == "dong-ho-50-100-trieu") ? 'checked' : '' }}
                                                name="price_cb" @if(isset($price) && $price  == 'dong-ho-50-100-trieu') checked @endif value="6m"><i class="icon_v1 "></i>Từ 50 triệu -
                                            100
                                            triệu</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bota_field_area bota_field_item" id="field_manufactory">
                                <div class="bota_field_name normal field field_opened " data-id="id_field_manufactory">
                                    Bộ máy
                                    <span class="dropdow-svg">
                                        <svg x="0px" y="0px" viewBox="0 0 255 255"
                                            style="enable-background:new 0 0 255 255;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <polygon points="0,63.75 127.5,191.25 255,63.75"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div id="manufactory"
                                    class="bota_field_label bota_filters_in_field filters_in_field_2_column filter_4_manufactory">
                                    <div class="bota_bfilters_in_field_inner cls">
                                        @foreach ($apparatus as $apparatus)
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == $apparatus['content']) ? 'checked' : '' }}
                                                    name="apparatus_cb" value="{{ $apparatus['content'] }}"><i
                                                    class="icon_v1 "></i>{{ $apparatus['content'] }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="bota_field_area bota_field_item" id="field_manufactory">
                                <div class="bota_field_name normal field field_opened " data-id="id_field_manufactory">
                                    Loại dây
                                    <span class="dropdow-svg">
                                        <svg x="0px" y="0px" viewBox="0 0 255 255"
                                            style="enable-background:new 0 0 255 255;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <polygon points="0,63.75 127.5,191.25 255,63.75"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div id="manufactory"
                                    class="bota_field_label bota_filters_in_field filters_in_field_2_column filter_4_manufactory">
                                    <div class="bota_bfilters_in_field_inner cls">
                                        @foreach ($wireType as $wireType)
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == $wireType['content']) ? 'checked' : '' }}
                                                    name="wire_type_cb" value="{{ $wireType['content'] }}"><i
                                                    class="icon_v1 "></i>{{ $wireType['content'] }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="bota_field_area bota_field_item" id="field_manufactory">
                                <div class="bota_field_name normal field field_opened " data-id="id_field_manufactory">
                                    LOẠI MẶT KÍNH
                                    <span class="dropdow-svg">
                                        <svg x="0px" y="0px" viewBox="0 0 255 255"
                                            style="enable-background:new 0 0 255 255;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <polygon points="0,63.75 127.5,191.25 255,63.75"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div id="manufactory"
                                    class="bota_field_label bota_filters_in_field filters_in_field_2_column filter_4_manufactory">
                                    <div class="bota_bfilters_in_field_inner cls">
                                        @foreach ($glassMaterial as $glassMaterial)
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == $glassMaterial['content']) ? 'checked' : '' }}
                                                    name="glass_material_cb" value="{{ $glassMaterial['content'] }}"><i
                                                    class="icon_v1 "></i>{{ $glassMaterial['content'] }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="bota_field_area bota_field_item" id="field_size_mat">
                                <div class="bota_field_name normal field  field_opened " data-id="id_field_size_mat">
                                    Size mặt
                                    <span class="dropdow-svg">
                                        <svg x="0px" y="0px" viewBox="0 0 255 255"
                                            style="enable-background:new 0 0 255 255;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <polygon points="0,63.75 127.5,191.25 255,63.75"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div id="size_mat"
                                    class="bota_field_label bota_filters_in_field filters_in_field_1_column filter_4_size_mat">
                                    <div class="bota_filters_in_field_inner cls">
                                        <div class="filters_in_field_inner cls">
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="min"><i class="icon_v1 "></i>&lt; 30 mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="30m"><i class="icon_v1 "></i>Từ 30mm - 34mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="35m"><i class="icon_v1 "></i>Từ 35mm - 39mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="40m"><i class="icon_v1 "></i>Từ 40mm - 43mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="max"><i class="icon_v1 "></i>Trên 43mm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bota_field_area bota_field_item" id="field_manufactory">
                                <div class="bota_field_name normal field field_opened " data-id="id_field_manufactory">
                                    XUẤT XỨ
                                    <span class="dropdow-svg">
                                        <svg x="0px" y="0px" viewBox="0 0 255 255"
                                            style="enable-background:new 0 0 255 255;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <polygon points="0,63.75 127.5,191.25 255,63.75"></polygon>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div id="manufactory"
                                    class="bota_field_label bota_filters_in_field filters_in_field_2_column filter_4_manufactory">
                                    <div class="bota_bfilters_in_field_inner cls">
                                        @foreach ($origin as $origin)
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox" {{ ($item && $item == $origin['content']) ? 'checked' : '' }}
                                                    name="origin_cb" value="{{ $origin['content'] }}"><i
                                                    class="icon_v1 "></i>{{ $origin['content'] }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-sm-9">
                        <div class="bota_field_title">
                            <div class="bota_title_name">
                                <div class="bota_cat_title">
                                    <div class="bota_cat_title_main">
                                        <div class="bota_title_icon">
                                            <ul class="bota_box_cat nxtActiveMenu">
                                                <li class="bota_cat_name">
                                                    <a href="{{ url('/filter/dong-ho-nam') }}" title="Dành cho nam" data-value="male">
                                                        <span class="svg-sex">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                x="0px" y="0px" viewBox="0 0 91.7 142.3"
                                                                style="enable-background:new 0 0 91.7 142.3;"
                                                                xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #100F15;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <g>
                                                                        <path class="st0"
                                                                            d="M55.7,34.3H21.5c-2.7,0-4.8-3.6-4.2-7.5l3.2-21.9C20.8,2.1,22.6,0,24.6,0h27.9c2,0,3.8,2.1,4.2,4.9l3.2,21.9    C60.4,30.7,58.4,34.3,55.7,34.3z">
                                                                        </path>
                                                                        <path class="st0"
                                                                            d="M21.5,108h34.2c2.7,0,4.8,3.6,4.2,7.5l-3.2,21.9c-0.4,2.9-2.2,4.9-4.2,4.9H24.6c-2,0-3.8-2.1-4.2-4.9    l-3.2-21.9C16.7,111.6,18.7,108,21.5,108z">
                                                                        </path>
                                                                    </g>
                                                                    <g>
                                                                        <path class="st0"
                                                                            d="M23.5,58.5l8.2,9.1c1.2,1.3,2.7,2.2,4.3,2.8l2.3,0.7l-0.8-1.8c-0.8-1.9-2.1-3.5-3.9-4.6L23.5,58.5z">
                                                                        </path>
                                                                        <path class="st0"
                                                                            d="M58.5,53.3L42.5,65c-1.3,1-2.3,2.2-3.1,3.6L38.3,71l1.9-0.4c2-0.5,3.8-1.5,5.2-3L58.5,53.3z">
                                                                        </path>
                                                                    </g>
                                                                    <g>
                                                                        <path
                                                                            d="M38.6,109.7C17.3,109.7,0,92.4,0,71.2c0-21.3,17.3-38.6,38.6-38.6s38.6,17.3,38.6,38.6C77.1,92.4,59.8,109.7,38.6,109.7z     M38.6,39.6C21.2,39.6,7,53.8,7,71.2c0,17.4,14.2,31.6,31.6,31.6s31.6-14.2,31.6-31.6C70.1,53.8,56,39.6,38.6,39.6z">
                                                                        </path>
                                                                    </g>
                                                                    <g>
                                                                        <path
                                                                            d="M64.6,50.7c-0.9,0-1.8-0.3-2.5-1c-1.4-1.4-1.4-3.6,0-4.9l17.1-17.1c1.4-1.4,3.6-1.4,4.9,0c1.4,1.4,1.4,3.6,0,4.9    L67.1,49.7C66.4,50.4,65.5,50.7,64.6,50.7z">
                                                                        </path>
                                                                        <path
                                                                            d="M88.2,44.4c-1.9,0-3.5-1.6-3.5-3.5V27.2H70.9c-1.9,0-3.5-1.6-3.5-3.5s1.6-3.5,3.5-3.5h20.8v20.6    C91.7,42.8,90.1,44.4,88.2,44.4z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        Dành cho nam
                                                    </a>
                                                </li>
                                                <li class="bota_cat_name">
                                                <a href="{{ url('/filter/dong-ho-nu') }}" title="Dành cho nữ" data-value="female">
                                                        <span class="svg-sex">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                x="0px" y="0px" viewBox="0 0 143.7 143.6"
                                                                style="enable-background:new 0 0 143.7 143.6;"
                                                                xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #100F15;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M115.7,71.8c0-11.1-4.2-21.2-11-29c0.2,0.1,0.3,0.2,0.3,0.2l-7.5-16.6L93.9,5.6c-0.5-2.9-2.6-4.9-5.1-4.9H55   c-2.5,0-4.6,2.1-5.1,4.9l-3.7,21.2L38.9,43c0,0,0,0,0.1,0c-6.8,7.7-10.9,17.8-10.9,28.9c0,11.1,4.1,21.2,10.9,28.9l7.1,15.8   l3.8,21.5c0.5,2.9,2.6,5,5.1,5h33.8c2.5,0,4.6-2.1,5.1-5l3.7-21.1l7.4-16.4C111.6,92.8,115.7,82.8,115.7,71.8z M81.1,126.1h-4.8   v4.8c0,2.4-2,4.4-4.4,4.4c-2.4,0-4.4-2-4.4-4.4v-4.8h-4.8c-2.4,0-4.4-2-4.4-4.4c0-0.8,0.2-1.6,0.7-2.3c0.8-1.2,2.1-2.1,3.7-2.1h4.8   v-1.9c0,0,0,0,0,0V111c0,0,0,0,0,0v0c-0.2,0-0.5-0.1-0.7-0.1c-2.7-0.3-5.3-1-7.8-1.8c-0.4-0.1-0.8-0.3-1.2-0.4h0   C43,103,32.4,88.6,32.4,71.8C32.4,55,43,40.6,57.9,34.9c4.4-1.7,9.1-2.6,14-2.6c4.9,0,9.7,0.9,14,2.6c14.8,5.7,25.4,20,25.4,36.9   c0,16.8-10.5,31.2-25.4,36.9h0c-0.9,0.4-1.9,0.7-2.9,1c-2,0.6-4.1,1-6.3,1.3c-0.2,0-0.3,0.1-0.5,0.1v0c0,0,0,0,0,0v4.4c0,0,0,0,0,0   v1.9h4.8c1.6,0,3,0.8,3.7,2.1c0.4,0.7,0.6,1.4,0.6,2.3C85.4,124.1,83.5,126.1,81.1,126.1z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M102.6,71.8c0-16.9-13.8-30.7-30.7-30.7c-16.9,0-30.7,13.8-30.7,30.7c0,16.6,13.3,30.2,29.9,30.7   c0.3,0,0.6,0,0.8,0c0.3,0,0.6,0,0.8,0C89.2,102,102.6,88.4,102.6,71.8z M71.9,98.1c-14.5,0-26.3-11.8-26.3-26.3   s11.8-26.3,26.3-26.3c14.5,0,26.3,11.8,26.3,26.3S86.4,98.1,71.9,98.1z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="56.8,59.1 66.7,70.2 71.6,71.7 69.6,66.9  ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="73.9,67.1 71.6,71.7 76.6,70.5 91,55.1  ">
                                                                    </polygon>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        Dành cho nữ
                                                    </a>
                                                </li>
                                                <li class="bota_cat_name">
                                                    <a href="{{ url('/filter/dong-ho-doi') }}" title="Cặp đôi" data-value="couple">
                                                        <span class="svg-sex">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                x="0px" y="0px" viewBox="0 0 143.7 143.6"
                                                                style="enable-background:new 0 0 143.7 143.6;"
                                                                xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #100F15;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M115.7,71.8c0-11.1-4.2-21.2-11-29c0.2,0.1,0.3,0.2,0.3,0.2l-7.5-16.6L93.9,5.6c-0.5-2.9-2.6-4.9-5.1-4.9H55   c-2.5,0-4.6,2.1-5.1,4.9l-3.7,21.2L38.9,43c0,0,0,0,0.1,0c-6.8,7.7-10.9,17.8-10.9,28.9c0,11.1,4.1,21.2,10.9,28.9l7.1,15.8   l3.8,21.5c0.5,2.9,2.6,5,5.1,5h33.8c2.5,0,4.6-2.1,5.1-5l3.7-21.1l7.4-16.4C111.6,92.8,115.7,82.8,115.7,71.8z M81.1,126.1h-4.8   v4.8c0,2.4-2,4.4-4.4,4.4c-2.4,0-4.4-2-4.4-4.4v-4.8h-4.8c-2.4,0-4.4-2-4.4-4.4c0-0.8,0.2-1.6,0.7-2.3c0.8-1.2,2.1-2.1,3.7-2.1h4.8   v-1.9c0,0,0,0,0,0V111c0,0,0,0,0,0v0c-0.2,0-0.5-0.1-0.7-0.1c-2.7-0.3-5.3-1-7.8-1.8c-0.4-0.1-0.8-0.3-1.2-0.4h0   C43,103,32.4,88.6,32.4,71.8C32.4,55,43,40.6,57.9,34.9c4.4-1.7,9.1-2.6,14-2.6c4.9,0,9.7,0.9,14,2.6c14.8,5.7,25.4,20,25.4,36.9   c0,16.8-10.5,31.2-25.4,36.9h0c-0.9,0.4-1.9,0.7-2.9,1c-2,0.6-4.1,1-6.3,1.3c-0.2,0-0.3,0.1-0.5,0.1v0c0,0,0,0,0,0v4.4c0,0,0,0,0,0   v1.9h4.8c1.6,0,3,0.8,3.7,2.1c0.4,0.7,0.6,1.4,0.6,2.3C85.4,124.1,83.5,126.1,81.1,126.1z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M102.6,71.8c0-16.9-13.8-30.7-30.7-30.7c-16.9,0-30.7,13.8-30.7,30.7c0,16.6,13.3,30.2,29.9,30.7   c0.3,0,0.6,0,0.8,0c0.3,0,0.6,0,0.8,0C89.2,102,102.6,88.4,102.6,71.8z M71.9,98.1c-14.5,0-26.3-11.8-26.3-26.3   s11.8-26.3,26.3-26.3c14.5,0,26.3,11.8,26.3,26.3S86.4,98.1,71.9,98.1z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="56.8,59.1 66.7,70.2 71.6,71.7 69.6,66.9  ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="73.9,67.1 71.6,71.7 76.6,70.5 91,55.1  ">
                                                                    </polygon>
                                                                </g>
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                x="0px" y="0px" viewBox="0 0 143.7 143.6"
                                                                style="enable-background:new 0 0 143.7 143.6;"
                                                                xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #100F15;
                                                                    }
                                                                </style>
                                                                <g>
                                                                    <path class="st0"
                                                                        d="M115.7,71.8c0-11.1-4.2-21.2-11-29c0.2,0.1,0.3,0.2,0.3,0.2l-7.5-16.6L93.9,5.6c-0.5-2.9-2.6-4.9-5.1-4.9H55   c-2.5,0-4.6,2.1-5.1,4.9l-3.7,21.2L38.9,43c0,0,0,0,0.1,0c-6.8,7.7-10.9,17.8-10.9,28.9c0,11.1,4.1,21.2,10.9,28.9l7.1,15.8   l3.8,21.5c0.5,2.9,2.6,5,5.1,5h33.8c2.5,0,4.6-2.1,5.1-5l3.7-21.1l7.4-16.4C111.6,92.8,115.7,82.8,115.7,71.8z M81.1,126.1h-4.8   v4.8c0,2.4-2,4.4-4.4,4.4c-2.4,0-4.4-2-4.4-4.4v-4.8h-4.8c-2.4,0-4.4-2-4.4-4.4c0-0.8,0.2-1.6,0.7-2.3c0.8-1.2,2.1-2.1,3.7-2.1h4.8   v-1.9c0,0,0,0,0,0V111c0,0,0,0,0,0v0c-0.2,0-0.5-0.1-0.7-0.1c-2.7-0.3-5.3-1-7.8-1.8c-0.4-0.1-0.8-0.3-1.2-0.4h0   C43,103,32.4,88.6,32.4,71.8C32.4,55,43,40.6,57.9,34.9c4.4-1.7,9.1-2.6,14-2.6c4.9,0,9.7,0.9,14,2.6c14.8,5.7,25.4,20,25.4,36.9   c0,16.8-10.5,31.2-25.4,36.9h0c-0.9,0.4-1.9,0.7-2.9,1c-2,0.6-4.1,1-6.3,1.3c-0.2,0-0.3,0.1-0.5,0.1v0c0,0,0,0,0,0v4.4c0,0,0,0,0,0   v1.9h4.8c1.6,0,3,0.8,3.7,2.1c0.4,0.7,0.6,1.4,0.6,2.3C85.4,124.1,83.5,126.1,81.1,126.1z">
                                                                    </path>
                                                                    <path class="st0"
                                                                        d="M102.6,71.8c0-16.9-13.8-30.7-30.7-30.7c-16.9,0-30.7,13.8-30.7,30.7c0,16.6,13.3,30.2,29.9,30.7   c0.3,0,0.6,0,0.8,0c0.3,0,0.6,0,0.8,0C89.2,102,102.6,88.4,102.6,71.8z M71.9,98.1c-14.5,0-26.3-11.8-26.3-26.3   s11.8-26.3,26.3-26.3c14.5,0,26.3,11.8,26.3,26.3S86.4,98.1,71.9,98.1z">
                                                                    </path>
                                                                    <polygon class="st0"
                                                                        points="56.8,59.1 66.7,70.2 71.6,71.7 69.6,66.9  ">
                                                                    </polygon>
                                                                    <polygon class="st0"
                                                                        points="73.9,67.1 71.6,71.7 76.6,70.5 91,55.1  ">
                                                                    </polygon>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        Cặp đôi
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <select class="filter_attribute order-select" id="filter_sort">
                                <option value="price_asc">Giá từ thấp tới cao</option>
                                <option value="price_desc">Giá từ cao tới thấp</option>
                                <option value="newest">Mới nhất</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row bota_product_grid">
                            <div id="filtered-results" class="row bota_product_grid"></div>
                        </div>
                        <div class="row bota_product_grid" id="filter-attribute-results">
                            <div  class="row bota_product_grid">
                                @foreach ($products as $product)
                                <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                    <div class="bota_pr_item">
                                        <div class="bota_pr_image ">
                                            <a href="{{ route('web.product.show', $product->slug) }}" title="">
                                                @if ($product->images->first() === null)
                                                    <img src="" alt="{{ $request->getHost() }}">
                                                @else
                                                    <img width="320px" height="365" alt="{{ $request->getHost() }}"
                                                        src="{{ route('productImageShow', [
                                                            'id' => $product->id,
                                                            'fileName' => $product->images->last()->name ?? 'default.jpg',
                                                        ]) }}">
                                                @endif
                                                {{-- <img width="320" height="365" class="lazy" alt="" src="" /> --}}
                                            </a>
                                            <span class="bota_pr_installment">Trả góp 0%</span>
                                        </div>
                                        <h3 class="bota_pr_name">
                                            <a href="{{ route('web.product.show', $product->slug) }}" title="">
                                                {{ $product->sku }}
                                            </a>
                                            <span class="bota_pr_cat_name">
                                                {{ $product->name }}
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

                            </div>
                            <div class="bota_pagination" id="bota_pagination">
                                {{ $products->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')

    <script>
        var sex = "male";
        $(document).ready(function() {
            $('.bota_cat_name a').click(function(e) {
                $('.bota_cat_name').removeClass('active');
                $(this).closest('.bota_cat_name').addClass('active');
                sex = $(this).attr("data-value");
            });
        });
        $(document).ready(function() {
            $('.filter_attribute').change(function() {
                var selectedAttributesSize = [];
                var selectedAttributesBrand = [];
                var selectedAttributesPrice = [];
                var selectedAttributesOrigin = [];
                var selectedAttributesApparatus = [];
                var selectedAttributesWireType = [];
                var selectedAttributesGlassMaterial = [];
                var selectElement = document.getElementById("filter_sort");
                var sort = selectElement.value;
                $('input[type="checkbox"][name="size_cb"]:checked').each(function() {
                    selectedAttributesSize.push($(this).val());
                });
                $('input[type="checkbox"][name="brand_cb"]:checked').each(function() {
                    selectedAttributesBrand.push($(this).val());
                });
                $('input[type="checkbox"][name="price_cb"]:checked').each(function() {
                    selectedAttributesPrice.push($(this).val());
                });
                $('input[type="checkbox"][name="origin_cb"]:checked').each(function() {
                    selectedAttributesOrigin.push($(this).val());
                });
                $('input[type="checkbox"][name="apparatus_cb"]:checked').each(function() {
                    selectedAttributesApparatus.push($(this).val());
                });
                $('input[type="checkbox"][name="wire_type_cb"]:checked').each(function() {
                    selectedAttributesWireType.push($(this).val());
                });
                $('input[type="checkbox"][name="glass_material_cb"]:checked').each(function() {
                    selectedAttributesGlassMaterial.push($(this).val());
                });
                console.log(sort, selectedAttributesBrand, selectedAttributesPrice,
                    selectedAttributesOrigin, selectedAttributesApparatus,
                    selectedAttributesWireType, selectedAttributesGlassMaterial,sex)
                $.ajax({
                    url: "{{ route('testfilter') }}",
                    method: 'GET',
                    data: {
                        sex: sex,
                        size: selectedAttributesSize,
                        sort: sort,
                        brand: selectedAttributesBrand,
                        price: selectedAttributesPrice,
                        origin: selectedAttributesOrigin,
                        apparatus: selectedAttributesApparatus,
                        wireType: selectedAttributesWireType,
                        glassMaterial: selectedAttributesGlassMaterial
                    },
                    success: function(response) {
                        $('#filter-attribute-results').empty();
                        $('#filter-attribute-results').html(response);
                    },
                    error: function(xhr) {
                        console.log("error");
                    }
                });
            });
        });
    </script>
    <script>
        var images = document.getElementsByClassName('image');
        for (var i = 0; i < images.length; i++) {
            images[i].addEventListener('click', function() {
                var brandId = this.id;
                var checkbox = document.querySelector('input[name="brand_cb"][value="' + brandId + '"]');
                if (checkbox) {
                    checkbox.checked = !checkbox.checked;
                }
                var selectedAttributesSize = [];
                var selectedAttributesBrand = [];
                var selectedAttributesPrice = [];
                var selectedAttributesOrigin = [];
                var selectedAttributesApparatus = [];
                var selectedAttributesWireType = [];
                var selectedAttributesGlassMaterial = [];
                var selectElement = document.getElementById("filter_sort");
                var sort = selectElement.value;
                $('input[type="checkbox"][name="size_cb"]:checked').each(function() {
                    selectedAttributesSize.push($(this).val());
                });
                $('input[type="checkbox"][name="brand_cb"]:checked').each(function() {
                    selectedAttributesBrand.push($(this).val());
                });
                $('.image').click(function() {
                    selectedAttributesBrand.push($(this).val());
                });

                $('input[type="checkbox"][name="price_cb"]:checked').each(function() {
                    selectedAttributesPrice.push($(this).val());
                });
                $('input[type="checkbox"][name="origin_cb"]:checked').each(function() {
                    selectedAttributesOrigin.push($(this).val());
                });
                $('input[type="checkbox"][name="apparatus_cb"]:checked').each(function() {
                    selectedAttributesApparatus.push($(this).val());
                });
                $('input[type="checkbox"][name="wire_type_cb"]:checked').each(function() {
                    selectedAttributesWireType.push($(this).val());
                });
                $('input[type="checkbox"][name="glass_material_cb"]:checked').each(function() {
                    selectedAttributesGlassMaterial.push($(this).val());
                });
                console.log(sort, selectedAttributesBrand, selectedAttributesPrice,
                    selectedAttributesOrigin, selectedAttributesApparatus,
                    selectedAttributesWireType, selectedAttributesGlassMaterial)
                $.ajax({
                    url: "{{ route('testfilter') }}",
                    method: 'GET',
                    data: {
                        sex: sex,
                        size: selectedAttributesSize,
                        sort: sort,
                        brand: selectedAttributesBrand,
                        price: selectedAttributesPrice,
                        origin: selectedAttributesOrigin,
                        apparatus: selectedAttributesApparatus,
                        wireType: selectedAttributesWireType,
                        glassMaterial: selectedAttributesGlassMaterial
                    },
                    success: function(response) {
                        $('#filter-attribute-results').empty();
                        $('#filter-attribute-results').html(response);
                    },
                    error: function(xhr) {
                        console.log("error");
                    }
                });
            });
        }
    </script>
    <script>
    function filterProducts(category) {
        // Gửi yêu cầu AJAX để lọc sản phẩm theo danh mục
        $.ajax({
            url: '/filter/filter/' + category,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Cập nhật nội dung sản phẩm đã lọc
                $('#filtered-results').html(response.products);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    // Active Menu
    function NxtActiveMenu(){
            var urlNow=window.location.href;
            var allA=$('.nxtActiveMenu').find('a');
            $.each(allA, function(k, v) {
                var self=$(this);
                if(self.attr('href')==urlNow){
                    $('.nxtActiveMenu').find('li.active').removeClass('active');
                    self.parents('li').addClass('active');
                }
            });
        };
        NxtActiveMenu();
</script>
@stop
