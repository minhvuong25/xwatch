@php
    $relatedList = App\Helper\FuncLib::getBlogCategory();
@endphp
@extends('web.layouts.master')
@section('title')
{{'Đồng Hồ Thịnh Vượng'}}
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
                    <li><a href="{{ route('web.blogCategory.show', $value['slug'] = 'tin-tuc') }}" title="Tin tức">Tin tức</a>
                    </li>
                    @if (isset($blogCategory->title) && !empty($blogCategory->title))
                        <li><a href="{{ route('web.blogCategory.show', $blogCategory->slug) }}"
                                title="{{ $blogCategory->title }}">{{ $blogCategory->title }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="bota_news_page">
            <div class="container">
                <h1 class="bota_page_title">
                    <span>{{ $blogCategory->title }}</span>
                    <div class="bota_search_news">
                        <div class="bota_block_title"><span>Tìm kiếm tin tức</span></div>
                        <div id="block_content" class="block_content">
                            <form action="{{ route('search.blog') }}" name="search_form" id="news_search_form" method="get">
                                <div class="search_form">
                                    <input type="text" placeholder="Nhập nội dung muốn tìm kiếm" name="keyword_news"
                                        class="keyword_news" value="">
                                    <button type="submit" class="button-search button">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="search" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            class="svg-inline--fa fa-search fa-w-16">
                                            <path
                                                d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"
                                                class=""></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </h1>

                <div class="bota_news_page_list">
                    <div class="row">
                        @foreach ($blog as $index => $value)
                            @if ($index == 0)
                                <div class="col-xl-6 col-lg-6 col-sm-6">
                                    <div class="bota_news_list_item">
                                        <figure class="bota_news_list_img">
                                            <a class="item-img" href="{{ route('web.blog.show', $value->slug) }}">
                                                <img class="" src="{{ asset($value->default_image) }}"
                                                    alt="{{ asset($value->default_image) }}">
                                            </a>
                                        </figure>
                                        <h2 class="bota_news_list_title"><a
                                                href="{{ route('web.blog.show', $value->slug) }}"
                                                title="{{ asset($value->title) }}">{{ $value->title }}</a></h2>
                                        <div class="bota_news_list_datetime">
                                            {{ $value->updated_at->format('d/m/Y ') }}
                                        </div>
                                        <div class="bota_news_list_summary">{!! $value->description !!}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="row">
                                @foreach ($blog as $index => $value)
                                    @if ($index >= 1 && $index <= 4)
                                        <div class="col-xl-6 col-lg-6 col-sm-6 col-6">
                                            <div class="bota_news_inner_item">
                                                <figure class="bota_news_inner_img">
                                                    <a class="item-img" href="{{ route('web.blog.show', $value->slug) }}">
                                                        <img src="{{ asset($value->default_image) }}" alt="donghothinhvuong.bota.vn">
                                                    </a>
                                                </figure>
                                                <div class="bota_news_inner_title">
                                                    <h2 class="item_title"><a
                                                            href="{{ route('web.blog.show', $value->slug) }}"
                                                            title="{!! $value->title !!}">{!! $value->title !!}</a></h2>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bota_news_page_bottom">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-sm-8">
                            {{-- danh dau3  --}}

                            <div class="bota_list_news_left">
                                @foreach ($blog as $index => $value)
                                    @if ($index >= 5)
                                        <div class="bota_list_left_item clearfix">
                                            <figure class="bota_list_left_img">
                                                <a class="item-img" href="{{ route('web.blog.show', $value->slug) }}">
                                                    <img class="lazy" alt="{!! $value->title !!}"
                                                        src="{{ asset($value->default_image) }}"
                                                        style="display: inline-block;">
                                                </a>
                                            </figure>
                                            <div class="bota_list_left_right">
                                                <h2 class="title"><a href="{{ route('web.blog.show', $value->slug) }}"
                                                        title="{!! $value->title !!}">{!! $value->title !!}</a></h2>
                                                <div class="datetime">
                                                    {{ $value->updated_at->format('d/m/Y ') }}
                                                </div>
                                                <div class="sum">
                                                    {!! $value->description !!}
                                                </div>
                                                <a class="view-more" href="{{ route('web.blog.show', $value->slug) }}">
                                                    <svg x="0px" y="0px" viewBox="0 0 31.49 31.49"
                                                        style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                                        <path
                                                            d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z">
                                                        </path>
                                                    </svg>
                                                    Xem thêm
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="bota_pagination">
                                {{ $blog->links() }}
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-4">
                            <div class="bota_list_news_right">
                                @if ($relatedList[0]['blog'] !== [])
                                    <div class="bota_block_news_distinguish">
                                        <div class="bota_block_title">
                                            <span>{{ $relatedList[0]['title'] }}</span>
                                        </div>
                                        @foreach ($relatedList[0]['blog'] as $key => $value)
                                            @if ($key <= 4)
                                                <div class="news_list_body_default">
                                                    <div class="news-item clearfix">
                                                        <figure>
                                                            <a href="{{ route('web.blog.show', $value['slug']) }}"
                                                                title="{{ $value['title'] }}	">
                                                                <img src="{{ asset($value['default_image']) }}"
                                                                    alt="{{ $value['title'] }}	">
                                                            </a>
                                                        </figure>
                                                        <div class="content-r">
                                                            <a href="{{ route('web.blog.show', $value['slug']) }}"
                                                                title="{{ $value['title'] }}">{{ $value['title'] }} </a>
                                                            <div class="datetime">
                                                                {{ date('d/m/Y', strtotime($value['updated_at'])) }}
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                <div class="bota_block_news_knowledge">
                                    @if ($relatedList[1]['blog'] !== [])
                                        <div class="bota_block_title"><span>{{ $relatedList[1]['title'] }}</span></div>
                                        <div class="news_list_body_default">
                                            @foreach ($relatedList[1]['blog'] as $key => $value)
                                                @if ($key <= 9)
                                                    <div class="news-item clearfix">
                                                        <figure>
                                                            <a href="{{ route('web.blog.show', $value['slug']) }}"
                                                                title="{{ $value['title'] }}">
                                                                <img src="{{ asset($value['default_image']) }}" alt="{{ $value['title'] }}">
                                                            </a>
                                                        </figure>
                                                        <div class="content-r">
                                                            <a href="{{ route('web.blog.show', $value['slug']) }}"
                                                                title="{{ $value['title'] }}">{{ $value['title'] }} </a>
                                                            <div class="datetime">
                                                                {{ date('d/m/Y', strtotime($value['updated_at'])) }}
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bota_block_news_new">
            @if ($relatedList[2]['blog'] !== [])
                <div class="container">

                    <div class="bota_block_title"><span>{{ $relatedList[2]['title'] }}</span></div>
                    <div class="bota_news_list_body bota_news_list_column4">
                        @foreach ($relatedList[2]['blog'] as $key => $value)
                            @if ($key <= 3)
                                <div class="bota_cate_news_item">
                                    <div class="img">
                                        <a href="{{ route('web.blog.show', $value['slug']) }}" title="">
                                            <img width="270" height="154" class="lazy"
                                                alt="{{ $value['title'] }}" src="{{ asset($value['default_image']) }}"
                                                style="display: inline-block;">
                                        </a>
                                    </div>
                                    <div class="title">
                                        <a href="{{ route('web.blog.show', $value['slug']) }}" title="{{ $value['title'] }}">
                                            {{ $value['title'] }} </a>
                                    </div>
                                    <div class="date">
                                        <svg viewBox="0 0 511.634 511.634"
                                            style="enable-background:new 0 0 511.634 511.634;" xml:space="preserve">
                                            <g>
                                                <path
                                                    d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261   C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41   h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05   c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989   c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639   C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358   h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712   c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05   C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365   v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z    M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333   c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268   c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423   c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23   h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z">
                                                </path>
                                            </g>
                                        </svg>
                                        {{ date('d/m/Y', strtotime($value['updated_at'])) }}
                                    </div>
                                    <div class="summary">
                                        {!! $value['description'] !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
            @endif
        </div>

    </div>
    <div class="bota_adv_pos">
        <div class="bota_block_strengths">
            <div class="container">
                <div class="bota_adv_pos_content">
                    <div class="item">
                        <a href="" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">
                            <svg x="0px" y="0px" viewBox="0 0 186.61 160.29"
                                style="enable-background:new 0 0 186.61 160.29;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M92.34,145.82c-30.88,0-57.83-22.02-64.09-52.35l-0.59-2.85H47.1L23.55,66.99L0,90.63h13.17l0.31,2    c6.04,38.57,39.94,67.66,78.86,67.66c36.62,0,67.9-24.54,77.11-59.38l-6.4,6.42l-8.1-8.13    C146.65,126.85,121.47,145.82,92.34,145.82">
                                        </path>
                                        <path
                                            d="M171.2,67.66C165.17,29.09,131.26,0,92.34,0C55.12,0,22.93,26.14,14.61,61.93l8.94-8.97l6.63,6.66    c8.77-26.78,33.78-45.15,62.17-45.15c30.88,0,57.83,22.02,64.08,52.35l0.59,2.85h-17.5l23.55,23.64l23.55-23.64h-15.09    L171.2,67.66z">
                                        </path>
                                    </g>
                                    <g>
                                        <path d="M86.79,157.04l-26.78-7.88l24.54-92.43H63.02l57.09-29.16L86.79,157.04z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <div class="content-right">
                            <a class="title" href="" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">1
                                đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất</a>
                            <a class="summary" href=""
                                alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất"></a>
                        </div>
                    </div>
                    <div class="item">
                        <a href="" alt="Miễn phí vận chuyển">
                            <svg x="0px" y="0px" viewBox="0 0 277.1 146.9"
                                style="enable-background:new 0 0 277.1 146.9;" xml:space="preserve">
                                <style type="text/css">
                                    .th1 {
                                        fill: none;
                                        stroke: #000000;
                                        stroke-width: 9;
                                        stroke-linecap: round;
                                        stroke-miterlimit: 10;
                                    }

                                    .th2 {
                                        fill: #100F15;
                                    }
                                </style>
                                <g>
                                    <path class="th1"
                                        d="M137.3,106.7h50.3c6,0,10.8-4.8,10.8-10.8V15.3c0-6-4.8-10.8-10.8-10.8H58.2c-6,0-10.8,4.8-10.8,10.8v5.5">
                                    </path>
                                    <path class="th1"
                                        d="M198.8,27.4h37.8c4.7,0,9,2.6,11.2,6.7l24.9,46.9v33.7c0,3.9-3.2,7.1-7.1,7.1h-19.7">
                                    </path>
                                    <path class="th1" d="M48.4,108.6v8c0,3.7,3,6.7,6.7,6.7h30.3"></path>
                                    <line class="th1" x1="127.8" y1="122.8" x2="202.1" y2="122.8">
                                    </line>
                                    <path class="th1" d="M250.2,45.1H224v30.3c0,6.1,4.9,11,11,11h37.6"></path>
                                    <circle class="th1" cx="222.9" cy="122.2" r="20.2"></circle>
                                    <circle class="th1" cx="222.9" cy="122.2" r="6.6"></circle>
                                    <circle class="th1" cx="106.7" cy="122.2" r="20.2"></circle>
                                    <circle class="th1" cx="106.7" cy="122.2" r="6.6"></circle>
                                    <g>
                                        <g>
                                            <path
                                                d="M103.9,48.1H91.8l-2.7,13.3h-7.6l6.6-33.1H110l-1.2,5.9H94.6l-1.6,8h12.1L103.9,48.1z">
                                            </path>
                                            <path
                                                d="M115.6,48.7l-2.5,12.7h-7.6l6.6-33.1h12c3.4,0,6,0.9,7.8,2.7c1.9,1.8,2.5,4.2,1.9,7.2c-0.4,1.8-1.1,3.4-2.2,4.6     c-1.1,1.2-2.5,2.2-4.4,2.9c1.7,0.6,2.9,1.6,3.5,3c0.6,1.4,0.7,3,0.4,4.9l-0.4,2.1c-0.2,0.9-0.3,1.9-0.2,3c0,1.1,0.3,1.9,0.8,2.3     l-0.1,0.5h-7.8c-0.5-0.5-0.7-1.3-0.6-2.4c0.1-1.2,0.2-2.3,0.4-3.4l0.4-2c0.3-1.7,0.2-2.9-0.3-3.7c-0.5-0.8-1.5-1.2-3-1.2H115.6z      M116.8,42.8h4.5c1.2,0,2.2-0.4,3.1-1.1c0.9-0.7,1.5-1.7,1.7-3c0.3-1.4,0.1-2.5-0.4-3.3c-0.6-0.8-1.5-1.2-2.8-1.2h-4.4     L116.8,42.8z">
                                            </path>
                                            <path
                                                d="M156.5,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L156.5,47.2z">
                                            </path>
                                            <path
                                                d="M181.3,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L181.3,47.2z">
                                            </path>
                                        </g>
                                        <g>
                                            <path
                                                d="M97.8,66.1c-1.4-1.3-3.4-2-5.9-2c-2.4,0-4.5,0.6-6.2,1.7c-1.7,1.1-2.8,2.7-3.2,4.8c-0.4,2,0,3.6,1.3,4.9     c1.3,1.3,3.2,2.4,5.9,3.4c1.4,0.6,2.4,1.2,2.8,1.6c0.5,0.5,0.6,1.2,0.4,2.2c-0.1,0.6-0.5,1.1-1.1,1.5c-0.4,0.3-0.9,0.5-1.4,0.5     c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.4,0c-0.2,0-0.4,0-0.7,0H81c0.3,1,0.8,1.9,1.8,2.5c1.7,1.2,3.8,1.8,6.2,1.8     c2.5,0,4.6-0.5,6.3-1.6c1.7-1.1,2.8-2.7,3.2-4.8c0.4-2.1,0.1-3.8-1-5.1c-1.1-1.3-2.9-2.4-5.3-3.2c-1.8-0.7-3-1.3-3.6-1.7     c-0.5-0.4-0.7-1.1-0.5-2c0.1-0.6,0.5-1,1.1-1.5c0.6-0.4,1.2-0.6,1.9-0.6c1,0,1.7,0.3,2.2,0.9c0.5,0.6,0.7,1.4,0.5,2.3h5.4l0-0.1     C99.7,69.2,99.3,67.4,97.8,66.1z">
                                            </path>
                                            <path
                                                d="M118.6,88.7h-5.6l2-9.8h-7.9l-2,9.8h-5.6l4.9-24.3h5.6l-2,10.2h7.9l2-10.2h5.6L118.6,88.7z">
                                            </path>
                                            <path d="M128,88.7h-5.6l4.9-24.3h5.6L128,88.7z"></path>
                                            <path
                                                d="M139.1,80.4l-1.7,8.3h-5.6l4.9-24.3h9.3c2.5,0,4.5,0.7,5.9,2.2c1.4,1.5,1.8,3.4,1.4,5.7c-0.5,2.5-1.7,4.5-3.5,5.9     c-1.8,1.4-4.1,2.1-6.9,2.1H139.1z M140,76h3.8c1,0,1.9-0.3,2.6-1c0.7-0.7,1.2-1.5,1.4-2.6c0.2-1.1,0.1-2-0.3-2.7     c-0.4-0.7-1.2-1-2.3-1h-3.7L140,76z">
                                            </path>
                                            <path d="M90.4,84.7L90.4,84.7l-0.2,0C90.3,84.7,90.3,84.7,90.4,84.7z"></path>
                                        </g>
                                        <g>
                                            <path class="th2"
                                                d="M49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7s12.9,28.7,28.7,28.7C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5      M49.1,82.3C35.3,82.3,24,71,24,57.2c0-13.8,11.3-25.1,25.1-25.1c13.8,0,25.1,11.3,25.1,25.1C74.2,71,62.9,82.3,49.1,82.3">
                                            </path>
                                            <polygon class="th2"
                                                points="62.7,82.3 52.9,72.6 28.7,96.7 12.4,96.7 56.3,52.8 85.8,82.3    ">
                                            </polygon>
                                            <path class="th2"
                                                d="M49.1,85.9C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7S33.3,85.9,49.1,85.9      M49.1,32.1c13.8,0,25.1,11.3,25.1,25.1c0,13.8-11.3,25.1-25.1,25.1C35.3,82.3,24,71,24,57.2C24,43.4,35.3,32.1,49.1,32.1">
                                            </path>
                                            <polygon class="th2"
                                                points="35.6,32.1 45.4,41.8 69.5,17.7 85.8,17.7 41.9,61.6 12.4,32.1    ">
                                            </polygon>
                                        </g>
                                    </g>
                                    <line class="th1" x1="4.5" y1="106.7" x2="76.8" y2="106.7">
                                    </line>
                                </g>
                            </svg>
                        </a>
                        <div class="content-right">
                            <a class="title" href="" alt="Miễn phí vận chuyển">Vận chuyển toàn quốc</a>
                            <a class="summary" href="" alt="Miễn phí vận chuyển"></a>
                        </div>
                    </div>
                    <div class="item">
                        <a href="" alt="Tặng gói bảo hành người dùng trong 5 năm">
                            <svg x="0px" y="0px" viewBox="0 0 198.9 199.07"
                                style="enable-background:new 0 0 198.9 199.07;" xml:space="preserve">
                                <g>
                                    <path
                                        d="M50.53,47.99l-1.71-6.38l2.6,1.57c7.04-4.38,14.67-7.54,22.72-9.42l4.32-17.55h25.94l4.32,17.55   c8.05,1.87,15.68,5.04,22.72,9.42l15.47-9.36l3.28,3.28l-26.79,26.79l-0.93-0.65c-9.14-6.4-19.87-9.78-31.04-9.78   c-11.32,0-21.83,3.49-30.53,9.45L48.25,50.26L50.53,47.99z">
                                    </path>
                                    <path
                                        d="M26.97,67.63l-1.21-2l5.63,1.51l2.27-2.27l12.72,12.72c-5.76,8.61-9.13,18.94-9.13,30.06c0,11.17,3.38,21.9,9.78,31.04   c3.61,5.15,8.04,9.6,13.17,13.23c9.18,6.49,19.98,9.91,31.22,9.91c29.88,0,54.18-24.3,54.18-54.18c0-11.25-3.43-22.05-9.91-31.22   l-0.66-0.93l26.77-26.77l3.44,3.44l-9.37,15.47c4.38,7.04,7.54,14.67,9.42,22.72l17.55,4.32v25.94l-17.55,4.32   c-1.88,8.05-5.04,15.69-9.42,22.72l9.37,15.47l-18.34,18.34l-15.47-9.36c-7.04,4.38-14.67,7.55-22.72,9.42l-4.32,17.55H78.46   l-4.31-17.55c-8.05-1.87-15.68-5.04-22.72-9.42l-15.47,9.36l-18.34-18.34l9.37-15.47c-4.38-7.04-7.54-14.67-9.42-22.72L0,120.61   V94.67l17.55-4.32C19.43,82.3,22.59,74.67,26.97,67.63">
                                    </path>
                                    <path
                                        d="M4.95,31.7l14.53,14.53c0.76,0.76,1.99,0.76,2.75,0l7.4-7.4c0.76-0.76,0.76-1.99,0-2.75L15.1,21.56l3.22-3.21l22.64,6.07   l6.07,22.64l-3.22,3.22l42.46,42.46c1.62-0.56,3.35-0.88,5.16-0.88c2.45,0,4.76,0.57,6.82,1.57L167,24.66l-2.72-2.72l4.64-17.31   L186.23,0l3.3,3.3l-11.12,11.12c-0.58,0.58-0.58,1.52,0,2.1l3.97,3.97c0.58,0.58,1.52,0.58,2.1,0L195.6,9.36l3.3,3.3l-4.64,17.31   l-17.31,4.64l-2.72-2.72l-68.69,68.69c1.06,2.12,1.68,4.51,1.68,7.05c0,8.72-7.07,15.79-15.79,15.79   c-8.72,0-15.79-7.07-15.79-15.79c0-1.59,0.24-3.12,0.68-4.57L33.66,60.41l-3.21,3.21L7.81,57.56L1.74,34.92L4.95,31.7z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                        <div class="content-right">
                            <a class="title" href="" alt="Tặng gói bảo hành người dùng trong 5 năm">Tặng gói bảo hành vàng lên đến 10 năm</a>
                            <a class="summary" href="" alt="Tặng gói bảo hành người dùng trong 5 năm"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop
