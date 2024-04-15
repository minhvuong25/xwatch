@php
    $blogView = App\Helper\FuncLib::getViewBlog();
    $relatedList = App\Helper\FuncLib::getBlogCategory();
        $logo = \App\Helper\FuncLib::getLogo();
    $phone = \App\Models\Contact::query()->first();
    $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
@endphp
@extends('web.layouts.master')
@section('title')
   @if (empty($blog->seoContents))
      {{ $blog->title }}
   @else
      {{$blog->seoContents->meta_title}}
   @endif
@stop
@section('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />
    <link rel="shortcut icon" href="/image/favicon/favicon.png" />
    <link rel="icon" href="/image/favicon/favicon.png" type="image/x-icon" />
    <meta name="theme-color" content="#aa722b" />
   @if (empty($blog->seoContents))
      <meta name="description" content="{{ $blog->title ?? 'Đồng Hồ Thịnh Vượng' }}">
      <meta name="keywords" content="{{ $blog->title ?? 'Đồng Hồ Thịnh Vượng' }}">
      <meta property="description" content="{{ $blog->title ?? 'Đồng Hồ Thịnh Vượng' }}">
      <meta property="og:title" content="{{ $blog->title ?? 'Đồng Hồ Thịnh Vượng' }}">
      <meta property="dc:description og:description schema:description" name="description" content="{{ $blog->title ?? 'Đồng Hồ Thịnh Vượng' }}" />
      <meta property="og:image:alt" content="{{$blog->title ?? 'Đồng Hồ Thịnh Vượng' }}" />
      <meta proschperty="og:description" content="{{$blog->title ?? 'Đồng Hồ Thịnh Vượng' }}" />
      <meta property="og:description" content="{{ $blog->title?? 'Đồng Hồ Thịnh Vượng' }}">
      <meta property="og:site_name" content="{{ $blog->title?? 'Đồng Hồ Thịnh Vượng' }}" />
   @else
    <meta name="description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta name="keywords" content="{{ $seoContents->meta_keyword ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="og:title" content="{{ $seoContents->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="dc:description og:description schema:description" name="description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}" />
    <meta property="og:image:alt" content="{{ $seoContents->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}" />
    <meta proschperty="og:description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}" />
    <meta property="og:description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="og:site_name" content="{{ $seoContents->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}" />
   @endif
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
    <body>
        <div class="bota_body_main">
            <div class="bota_body_center">
                <div class="bota_breadcrumb_main">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                            <li><a href="{{ route('web.blogCategory.show', $value['slug'] = 'tin-tuc') }}" title="Tin tức">Tin
                                    tức</a></li>
                            @if (isset($blog->blogCategory->title) && !empty($blog->title))
                                <li><a href="{{ route('web.blogCategory.show', $blog->blogCategory->slug) }}"
                                        title="{{ $blog->blogCategory->title }}">{{ $blog->blogCategory->title }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="bota_news_details_page">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-sm-8">
                                <div class="bota_news_detail">
                                    <h1 class="bota_news_detail_title">
                                        {{ $blog->title }}
                                    </h1>
                                    <div class="time_rate clearfix">
                                        <span class="rate">
                                            <i class="icon_v1 star_on"><svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="#FF9727" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg></i>
                                            <i class="icon_v1 star_on"><svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="#FF9727" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg></i>
                                            <i class="icon_v1 star_on"><svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="#FF9727" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg></i>
                                            <i class="icon_v1 star_on"><svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="#FF9727" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg></i>
                                            <i class="icon_v1 star_on"><svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="#FF9727" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg></i>
                                        </span>
                                        <span class='news_time'> Được viết vào :
                                            {{ $blog->updated_at->format('d/m/Y ') }}
                                        </span>
                                        <div class="share-news">
                                        </div>
                                    </div>
                                    <div class="avatar-detail">
                                        <img src="{{ asset($blog->default_image) }}" alt="{{ $blog->description }}" />
                                    </div>
                                    <!-- end DATETIME-->
                                    <!-- SUMMARY -->
                                    <div class="description">{!! $blog->content !!}</div>
                                    <!--	RELATED	-->

                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-4">
                                <div class="col-right-detail-news">
                                    <div class="bota_block_news_views">
                                        <div class="bota_block_title"><span>Tin xem nhiều nhất</span></div>
                                        <div class='news_list_body_col'>
                                            @foreach ($blogView as $key => $value)
                                                @if ($key == 0)
                                                    <figure>
                                                        <a href='{{ route('web.blog.show', $value->slug) }}'
                                                            title="{!! $value->title !!}">
                                                            <img width="370" height="212"
                                                                src='{{ asset($value->default_image) }}'
                                                                alt="{!! $value->title !!}" />
                                                        </a>
                                                    </figure>
                                                    <a class="special-tt" href='{{ route('web.blog.show', $value->slug) }}'
                                                        title="{!! $value->title !!}"> {!! $value->title !!}</a>
                                                @else
                                                    <a class="nomal-tt" href='{{ route('web.blog.show', $value->slug) }}'
                                                        title="{!! $value->title !!}"> {!! $value->title !!}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($relatedList[0]['blog'] !== [])
                                        <div class="bota_block_news_distinguish">
                                            <div class="bota_block_title"><span>{{ $relatedList[0]['title'] }}</span></div>
                                            <div class='news_list_body_col'>
                                                @foreach ($relatedList[0]['blog'] as $key => $value)
                                                    @if ($key == 0)
                                                        <figure>
                                                            <a href='{{ route('web.blog.show', $value['slug']) }}'
                                                                title="">
                                                                <img width="370" height="212"
                                                                    src='{{ asset($value['default_image']) }}'
                                                                    alt="donghothinhvuong.bota.vn" />
                                                            </a>
                                                        </figure>
                                                        <a class="special-tt"
                                                            href='{{ route('web.blog.show', $value['slug']) }}'
                                                            title=""> {!! substr(strip_tags($value["description"]), 0, 250) !!}</a><br>
                                                    @elseif($key <= 5)
                                                        <a class="nomal-tt"
                                                            href='{{ route('web.blog.show', $value['slug']) }}'
                                                            title=""> {!! substr(strip_tags($value["description"]), 0, 250) !!}</a><br>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @if ($relatedList[1]['blog'] !== [])
                                        <div class="bota_block_news_distinguish">
                                            <div class="bota_block_title"><span>{{ $relatedList[1]['title'] }}</span></div>
                                            <div class='news_list_body_col'>
                                                @foreach ($relatedList[0]['blog'] as $key => $value)
                                                    @if ($key == 0)
                                                        <figure>
                                                            <a href='{{ route('web.blog.show', $value['slug']) }}'
                                                                title="">
                                                                <img width="370" height="212"
                                                                    src='{{ asset($value['default_image']) }}'
                                                                    alt="donghothinhvuong.bota.vn" />
                                                            </a>
                                                        </figure>
                                                        <a class="special-tt"
                                                            href='{{ route('web.blog.show', $value['slug']) }}'
                                                            title=""> {!! substr(strip_tags($value["description"]), 0, 250) !!}</a><br>
                                                    @elseif($key <= 5)
                                                        <a class="nomal-tt"
                                                            href='{{ route('web.blog.show', $value['slug']) }}'
                                                            title=""> {!! substr(strip_tags($value["description"]), 0, 250) !!}</a><br>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="mbl tab_content_right">
                    <div class="full-screen-mobile"></div>
                    <div class="tab-title clearfix">
                       <div class="cat-title-main" id="tab-title-label">
                          <div class="title_icon"><i class="icon_v1"></i></div>
                          <span>Bình luận</span>
                       </div>
                    </div>
                    <div class='bota_comments'>
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="eZz53S52"></script>
                        <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
                    </div>
                 </div> --}}
                <div class="bota_related_news">
                    <div class="container">
                        <div class="bota_block_title"><span>Bài cùng chuyên mục</span></div>
                        <div class="related_content clearfix">
                            @foreach ($blogRelated as $value)
                                @if (isset($value) && !empty($value))
                                    <div class='news-item'>
                                        <div class="img">
                                            <a href='{{route('web.blog.show', $value->slug)}}'>
                                                <img width="270" height="154" alt="{{$value->slug}}"
                                                    src='{{asset($value->default_image)}}' />
                                            </a>
                                        </div>
                                        <div class="title_related">
                                            <a href='{{route('web.blog.show', $value->slug)}}'
                                                title="{{ $value->title }}">
                                                {!! $value->title !!} </a>
                                        </div>
                                        <div class="date">
                                            <svg viewBox="0 0 511.634 511.634"
                                                style="enable-background:new 0 0 511.634 511.634;" xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261   C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41   h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05   c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989   c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639   C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358   h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712   c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05   C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365   v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z    M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333   c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268   c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423   c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23   h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z" />
                                                </g>
                                            </svg>
                                            {{ $value->updated_at->format('d/m/Y ') }}
                                        </div>
                                        <div class="summary">
                                            {!! substr(strip_tags($value->description), 0, 250) !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@stop
