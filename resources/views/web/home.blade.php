@php
    if(isset($dataFilter)){
        $checkFilter2 = $dataFilter->toarray();
    }
@endphp

@extends('web.layouts.master')

@section('title')
    {{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}
@endsection
@section('meta')
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

    <meta property="og:image" content="{{ ($logo) ? asset( $logo->source_url) : '#' }}" />
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
@if(isset($seoContent->meta_title))
        <h1 style="display:none">{{ $seoContent->meta_title }}</h1>
    @else
        <h1 style="display:none">Đồng Hồ Thịnh Vượng</h1>
    @endif

    <div class="bota_body_center 123">
        <div class="bota_slideshow_home">
            <div class="container">
                <div class="owl-slideshow-item owl-carousel owl-theme">
                    @foreach ($banners as $banner)
                        <div class="item">
                            <div class='item_inner'>
                                <a target="_blank" href="/" title="{{ $banner->title }}">
                                    <img width="1170" height="400" class="img-fluid" alt="{{ $banner->title }}" src="{{ asset($banner->path) }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bota_block_pos">
            <div class="bota_block_strengths">
                <div class="container">
                    <div class="block-strengths">
                        @foreach($policies as $key => $policy)
                        <div class="item">
                            <div class="img-svg">
                                <a href="{{ $policy->url }}" alt="{{ $policy->title }}">
                                    <img src="{{ asset('uploads/policy/' . $policy->image) }}" alt="{{ $policy->title }}" />
                                </a>
                            </div>
                            <div class="content-right">
                            @if ($key == 0)
                                @php
                                    $title = $policy->title;
                                    $titleArray = explode(' ', $title);
                                    $delString = array_shift($titleArray);
                                    $delString2 = array_shift($titleArray);
                                    $delString3 = array_shift($titleArray);
                                    $delString4 = array_shift($titleArray);
                                    $delString5 = array_shift($titleArray);
                                @endphp
                                <a class="title" href="{{ $policy->url }}" alt="{{ $delString }} {{ $delString2 }} {{ $delString3 }} {{ $delString4 }} {{ $delString5 }}">{{ $delString }} {{ $delString2 }} {{ $delString3 }} {{ $delString4 }} {{ $delString5 }}</a>
                                <a class="summary" href="{{ $policy->url }}" alt="@foreach($titleArray as $vTitle) {{ $vTitle }} @endforeach">@foreach($titleArray as $vTitle) {{ $vTitle }} @endforeach</a>
                            @else
                                @php
                                    $title = $policy->title;
                                    $titleArray = explode(' ', $title);
                                    $delString = array_shift($titleArray);
                                    $delString2 = array_shift($titleArray);
                                    $delString3 = array_shift($titleArray);
                                @endphp
                            <a class="title" href="{{ $policy->url }}" alt="{{ $delString }} {{ $delString2 }} {{ $delString3 }}">{{ $delString }} {{ $delString2 }} {{ $delString3 }}</a>
                                <a class="summary" href="{{ $policy->url }}" alt="@foreach($titleArray as $vTitle) {{ $vTitle }} @endforeach">@foreach($titleArray as $vTitle) {{ $vTitle }} @endforeach</a>
                            @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="bota_search_by_home">
            <div class="container">
                <form method="post" action="{{ route('submitFilter') }}">
                    @csrf
                    <div class="custom-select w-100">
                        <select id="vendor-select" class="select-vendor-part" name="filterBrand">
                            <option value="">Thương hiệu</option>
                            @foreach ($brands as $item)
                                <option @if (isset($oldData['brand']) && $oldData['brand'] == "$item->id") selected @endif value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="custom-select w-100">
                        <select id="price-select" class="select-price-parts" name="filterPrice">
                            <option value="">Mức giá</option>
                            <option @if (isset($oldData['price']) && $oldData['price'] == "less2m") selected @endif value="less2m">
                                Dưới 2 triệu
                            </option>
                            <option @if (isset($oldData['price']) && $oldData['price'] == "2mto5m") selected @endif value="2mto5m">
                                Từ 2 triệu - 5 triệu
                            </option>
                            <option @if (isset($oldData['price']) && $oldData['price'] == "5mto10m") selected @endif value="5mto10m">
                                Từ 5 triệu - 10 triệu
                            </option>
                            <option @if (isset($oldData['price']) && $oldData['price'] == "10mto20m") selected @endif value="10mto20m">
                                Từ 10 triệu - 20 triệu
                            </option>
                            <option @if (isset($oldData['price']) && $oldData['price'] == "20mto50m") selected @endif value="20mto50m">
                                Từ 20 triệu - 50 triệu
                            </option>
                            <option @if (isset($oldData['price']) && $oldData['price'] == "50mto100m") selected @endif value="50mto100m">
                                Từ 50 triệu - 100 triệu
                            </option>
                        </select>
                    </div>
                    <div class="custom-select w-100">
                        <select id="size-select" class="select-size-parts" name="filterSize">
                            <option value="">Size Mặt</option>
                            <option @if (isset($oldData['size']) && $oldData['size'] == "less30") selected @endif value="less30">
                                < 30 mm </option>
                            <option @if (isset($oldData['size']) && $oldData['size'] == "30to34") selected @endif value="30to34">
                                Từ 30mm - 34mm
                            </option>
                            <option @if (isset($oldData['size']) && $oldData['size'] == "35to39") selected @endif value="35to39">
                                Từ 35mm - 39mm
                            </option>
                            <option @if (isset($oldData['size']) && $oldData['size'] == "40to43") selected @endif value="40to43">
                                Từ 40mm - 43mm
                            </option>
                            <option @if (isset($oldData['size']) && $oldData['size'] == "greater43") selected @endif value="greater43">
                                Trên 43mm
                            </option>
                        </select>
                    </div>

                    <div class="custom-select w-100">
                        <select id="wire-select" class="select-wire-parts" name="filterWireType">
                            <option value="">Loại dây</option>
                            @foreach ($wireType as $wireType)
                                <option @if (isset($oldData['wireType']) && $oldData['wireType'] == $wireType['content']) selected @endif value="{{ $wireType['content'] }}">
                                    {{ $wireType['content'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="checkFilter" value="checkFilter">
                    <button name="vehicle_form" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
        @if(empty($slug))
            <div class="bota_block_video_home">
               <div class="container">
                  <div class="bota_block_video_left">
                     <div class="bota_block_videos_item">
                        <div class="bota_video_one_block_body">
                           <div class="video_item" id="one_video_play_area">
                            @if($videos)

                            <div class="video_item_inner video_item_inner_has_img">
                                <img width="570" height="306" class="video" src="{!! asset('uploads/videoHome/'.$videos->image) !!}"
                              alt="{{$videos->alt}}" link-video="{{\App\Helper\FuncLib::convertYoutube($videos->link)}}">
                                <span class="play-video">
                                   <svg x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                      <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M45.563,30.826l-22,15  C23.394,45.941,23.197,46,23,46c-0.16,0-0.321-0.038-0.467-0.116C22.205,45.711,22,45.371,22,45V15c0-0.371,0.205-0.711,0.533-0.884  c0.328-0.174,0.724-0.15,1.031,0.058l22,15C45.836,29.36,46,29.669,46,30S45.836,30.64,45.563,30.826z"></path>
                                      <g>
                                      </g>
                                   </svg>
                                </span>
                                <div class="video-name">
                                   <div class="video-name-xw">{{$videos->name}} :</div>
                                   <div class="video-name-inner">
                                     {{$videos->description}}
                                   </div>
                                </div>
                                <div class="bg-name">
                                </div>
                                <div class="bg-name-2">
                                </div>
                             </div>
                             @endif
                           </div>
                        </div>
                     </div>
                  </div>
                   
                  @if($imageUp && $imageDown)
                  <div class="bota_block_video_mix_right">
                    <a href="{{$imageUp->link}}" title="{!! $imageUp->title !!}" id="top-content" class=""
                     style="background-image:url('{!! asset('uploads/imageHome/'. $imageUp->image) !!}') ">
                       <div class="text1">{{$imageUp->title}}</div>
                       <div class="text2">
                          <span class="before"></span>
                          {!!$imageUp->description!!}
                       </div>
                    </a>
                    <a href="{{$imageDown->link}}" title="{{$imageDown->title}}" id="bot-content" class=""
                        style="background-image:url('{!! asset('uploads/imageHome/'. $imageDown->image) !!}') ">
                       <div class="text1">
                          <span class="before"></span>
                          {{$imageDown->title}}
                       </div>
                       <div class="text2">
                        {!!$imageDown->description!!}
                       </div>
                    </a>
                 </div>
                 @endif
               </div>
            </div>

            <div class="container">
                @if (empty($checkFilter2['data']) && $dataCheckFilter1 == 0)
                    <h1>Không có sản phẩm phù hợp</h1>
                    <br>
                    <br>
                @else
                    <div class="row bota_product_grid">
                        @foreach ($dataFilter as $product)
                            <div class="col-xl-3 col-lg-4 col-sm-4 col-6">
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

                        <div style="text-align: center">
                            {{ $dataFilter->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                @endif

            </div>
        @endif

        <div class="bota_block_poduct_hot">
            <div class="container">
                <div class="bota_title_main">
                    <span>Sản phẩm nổi bật</span>
                </div>
                <div class="bota_cat_item_store ">
                    <ul>
                        <li class="item_tabs">
                            <a class=" {{ $slug === 'dong-ho-nam' ? 'active' : '' }} " title="Xem thêm Đồng hồ nam"
                                href="{{ route('category', 'dong-ho-nam') }}"
                                onclick="javascript:load_product(85, 85)">Đồng hồ nam</a>
                        </li>
                        <li class="item_tabs ">
                            <a class=" {{ $slug === 'dong-ho-nu' ? 'active' : '' }} "title="Xem thêm Đồng hồ nữ"
                                href="{{ route('category', 'dong-ho-nu') }} "
                                onclick="javascript:load_product(86, 86)">Đồng hồ nữ</a>
                        </li>
                    </ul>
                </div>

                <div class="row bota_product_grid">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-4 col-6">
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

                    <div style="text-align: center">
                        {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @if($slug && $slug === 'dong-ho-nu')
                <div class="bota_readmore_btn">
                    <a href="{{ route('category', 'dong-ho-nu') }}" title="Xem tất cả Đồng hồ nữ"><span><svg x="0px" y="0px"
                                viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;"
                                xml:space="preserve">
                                <path
                                    d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z">
                                </path>
                            </svg>Xem tất cả Đồng hồ nữ</span></a>
                </div>
                @else
                    <div class="bota_readmore_btn">
                        <a href="{{ route('category', 'dong-ho-nam') }}" title="Xem tất cả Đồng hồ nam"><span><svg x="0px" y="0px"
                                    viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;"
                                    xml:space="preserve">
                                    <path
                                        d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z">
                                    </path>
                            </svg>Xem tất cả Đồng hồ nam</span></a>
                    </div>
                @endif
                </div>
            </div>
            <div class="bota_adv_pos">
                <div class="bota_block_strengths">
                    <div class="container">
                        <div class="bota_adv_pos_content">
                            <div class="item">
                                <a href="/" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">
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
                                                <path
                                                    d="M86.79,157.04l-26.78-7.88l24.54-92.43H63.02l57.09-29.16L86.79,157.04z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <div class="content-right">
                                    <a class="title" href="/"
                                        alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">1 đổi 1 trong vòng 30
                                        ngày nếu lỗi của nhà sản xuất</a>
                                    <a class="summary" href="/"
                                        alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất"></a>
                                </div>
                            </div>
                            <div class="item">
                                <a href="/" alt="Miễn phí vận chuyển">
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
                                            <line class="th1" x1="127.8" y1="122.8" x2="202.1"
                                                y2="122.8"></line>
                                            <path class="th1" d="M250.2,45.1H224v30.3c0,6.1,4.9,11,11,11h37.6"></path>
                                            <circle class="th1" cx="222.9" cy="122.2" r="20.2">
                                            </circle>
                                            <circle class="th1" cx="222.9" cy="122.2" r="6.6">
                                            </circle>
                                            <circle class="th1" cx="106.7" cy="122.2" r="20.2">
                                            </circle>
                                            <circle class="th1" cx="106.7" cy="122.2" r="6.6">
                                            </circle>
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
                                                    <path d="M90.4,84.7L90.4,84.7l-0.2,0C90.3,84.7,90.3,84.7,90.4,84.7z">
                                                    </path>
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
                                            <line class="th1" x1="4.5" y1="106.7" x2="76.8"
                                                y2="106.7"></line>
                                        </g>
                                    </svg>
                                </a>
                                <div class="content-right">
                                    <a class="title" href="/" alt="Miễn phí vận chuyển">Vận chuyển toàn quốc</a>
                                    <a class="summary" href="/" alt="Miễn phí vận chuyển"></a>
                                </div>
                            </div>
                            <div class="item">
                                <a href="/" alt="Tặng gói bảo hành người dùng trong 5 năm">
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
                                    <a class="title" href="/" alt="Tặng gói bảo hành người dùng trong 5 năm">Tặng
                                        gói bảo hành vàng lên đến 10 năm</a>
                                    <a class="summary" href="/" alt="Tặng gói bảo hành người dùng trong 5 năm"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bota_block_collection">
                <div class="container">
                    <div class="bota_block_collection_cont collection-1 cls">
                        <div class="item-special">
                            <a href="{{ url('/category/'. $categorySpecial->slug. '.html')  }}" title="{!! $categorySpecial->name !!}">
                                <img width="784" height="253" alt="{!! $categorySpecial->name !!}"
                                     src="{{ asset($categorySpecial->image) }}">
                            </a>
                            <div class="name-collection">
                                <a href="{{ url('/category/'. $categorySpecial->slug. '.html')  }}" title="{!! $categorySpecial->name !!}">
                                    {!! $categorySpecial->name !!}
                                </a>
                            </div>
                        </div>
                        <div class="item-normal">

                            @foreach($dataCategory as $item)

                            <div class="item-normal-ct">
                                <a href="{{ url('/category/'. $item->slug. '.html')  }}" title="{!! $item->name !!}">
                                    <img width="386" height="261" alt="{!! $item->name !!}"
                                        src="{{ asset( $item->image) }}">
                                </a>
                                <div class="name-collection">
                                    <a href="{{ url('/category/'. $item->slug. '.html')  }}" title="{!! $item->name !!}">
                                        {!! $item->name !!}
                                    </a>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            {{-- KH hang --}}
            <div class="bota_block_testimonials">
                <div class="container">
                   <div class="bota_title_main">
                      <span>ĐỒNG HỒ SIÊU LƯỚT - CHÍNH HÃNG</span>
                   </div>
                   <div class="bota_testimonials_body_colum">
                      <div class="bota_testimonials_body">
                        @if($customer)
                        @foreach($customer as $data)
                         <div class="item">
                            <div class="video_item" title="MC Thái Tuấn">
                               <div class="video_item_inner video_item_inner_has_img">
                                  <img width="318" height="182" class="video" alt="bota"
                                   link-video="{{\App\Helper\FuncLib::convertYoutube($data->link_video)}}"
                                   src="{!! asset('uploads/customer/'.$data->video_image) !!}">
                                  <span class="play-video">
                                     <svg x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                        <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M45.563,30.826l-22,15  C23.394,45.941,23.197,46,23,46c-0.16,0-0.321-0.038-0.467-0.116C22.205,45.711,22,45.371,22,45V15c0-0.371,0.205-0.711,0.533-0.884  c0.328-0.174,0.724-0.15,1.031,0.058l22,15C45.836,29.36,46,29.669,46,30S45.836,30.64,45.563,30.826z"></path>
                                        <g>
                                        </g>
                                     </svg>
                                  </span>
                               </div>
                               <div class="summary">
                                  <svg class="quotes-left" x="0px" y="0px" viewBox="0 0 75.999 75.999" style="enable-background:new 0 0 75.999 75.999;" xml:space="preserve">
                                     <g>
                                        <g>
                                           <path d="M14.579,5C6.527,5,0,11.716,0,20c0,8.285,6.527,15,14.579,15C29.157,35,19.438,64,0,64v7    C34.69,71,48.286,5,14.579,5z M56.579,5C48.527,5,42,11.716,42,20c0,8.285,6.527,15,14.579,15C71.157,35,61.438,64,42,64v7    C76.69,71,90.286,5,56.579,5z"></path>
                                        </g>
                                     </g>
                                  </svg>
                                  {{$data->description}}
                                  <svg class="quotes-right" x="0px" y="0px" viewBox="0 0 75.999 75.999" style="enable-background:new 0 0 75.999 75.999;" xml:space="preserve">
                                     <g>
                                        <g>
                                           <path d="M14.579,5C6.527,5,0,11.716,0,20c0,8.285,6.527,15,14.579,15C29.157,35,19.438,64,0,64v7    C34.69,71,48.286,5,14.579,5z M56.579,5C48.527,5,42,11.716,42,20c0,8.285,6.527,15,14.579,15C71.157,35,61.438,64,42,64v7    C76.69,71,90.286,5,56.579,5z"></path>
                                        </g>
                                     </g>
                                  </svg>
                               </div>
                            </div>
                            <div class="bottom-item">
                               <img width="90" height="90" class="lazy" alt="MC " src="{!! asset('uploads/customer/'.$data->default_image) !!}">
                               <div class="info">
                                  <div class="name"> {{$data->customer_name}}</div>
                               </div>
                            </div>
                         </div>
                         @endforeach
                         @endif

                            <script>
                                $('.bota_testimonials_body .video_item_inner_has_img').click(function(){
                                    var img_video = $(this).find('img');
                                    var link_video = img_video.attr('link-video');

                                    var video = '<iframe src="'+ link_video +'"></iframe>';
                                    $(this).html('<iframe src="'+link_video+'?rel=0&autoplay=1" width="100%" height="307px" frameborder="0" allowfullscreen="false">');
                                    $(this).removeClass('video_item_inner_has_img');
                                });
                            </script>

                      </div>
                   </div>
                   <div class="bota_readmore_btn">
                      <a href="{{route('web.customer')}}" title="Xem tất cả Đồng hồ nam"><span><svg x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                      <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"></path>
                      </svg>Xem thêm</span></a>
                   </div>
                </div>
             </div>

            @if (isset($getManBlogCategry) && $getManBlogCategry !== [])
                <div class="bota_block_news">
                    <div class="container">
                        <div class="bota_title_main"><span>{{ $getManBlogCategry->title }}</span></div>
                        <div class="bota_block_news_list_column3 clearfix">
                            @foreach ($getManBlogCategry->blog as $key => $value)
                                @if ($key <= 3)
                                    <div class="item">
                                        <div class="img">
                                            <a href="{{ route('web.blog.show', $value->slug) }}"
                                                title="{{ $value->title }}">
                                                <img width="270" height="154" class="lazy"
                                                    alt="{{ $value->title ?? 'Đồng Hồ Thịnh Vượng' }}"
                                                    src="{{ asset($value->default_image) }}">
                                            </a>
                                        </div>
                                        <div class="title">
                                            <a href="{{ route('web.blog.show', $value->slug) }}"
                                                title="{{ $value->title }}">{!! $value->description !!} </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="bota_news_category">
                <div class="container clearfix">
                    <div class="bota_news_cate_left">
                        <div class="bota_block_title">
                            <span>Tin tức và sự kiện</span>
                        </div>
                        <div class="bota_cate_news_list_body">
                            <div class="owl-news-item owl-carousel owl-theme">
                                @if (isset($blog))
                                    @foreach ($blog as $val)
                                        <div class="item">
                                            <div class="bota_cate_news_item">
                                                <div class="img">
                                                    <a href="{{ route('web.blog.show', $val->slug) }}"
                                                        title="{!! $val->title !!}">
                                                        <img width="20" height="20" class="owl-lazy"
                                                            alt="{{ $val->slug }}"
                                                            data-src="{{ asset($val->default_image) }}">
                                                    </a>
                                                </div>
                                                <div class="title">
                                                    <a href="{{ route('web.blog.show', $val->slug) }}"
                                                        title="{!! $val->title !!}">{!! $val->title !!} </a>
                                                </div>
                                                <div class="date">
                                                    <svg viewBox="0 0 511.634 511.634"
                                                        style="enable-background:new 0 0 511.634 511.634;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path
                                                                d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261   C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41   h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05   c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989   c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639   C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358   h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712   c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05   C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365   v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z    M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333   c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268   c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423   c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23   h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    {{ $val->updated_at->format('d/m/Y ') }}
                                                </div>
                                                <div class="summary">
                                                    {!! substr(strip_tags($val->description), 0, 250) !!}
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="bota_block_partners">
                        @if($imageNew)
                        <a href="{{$imageNew->link ?? '/'}}">
                            <img width="570" height="306"  src="{!! asset('uploads/imageNew/'.$imageNew->image) !!}"
                            alt="Ảnh tin tức">
                        </a>
                        @else
                        <div class="bota_block_title">
                           <span>Báo chí nói về Chúng Tôi</span>
                        </div>
                        <div class="bota_block_partners_cont">
                           <a href="/" title="Báo Dân Trí" rel="nofollow" target="_blink">
                              <img width="175" height="90" class="lazy" alt="" src="statics/imgs/dantri_1557884275.jpg" />
                           </a>
                           <a href="/" title="Báo Vietnamnet" rel="nofollow" target="_blink">
                              <img width="175" height="90" class="lazy" alt="" src="statics/imgs/vietnamnet-logo_1557884261.png" />
                           </a>
                           <a href="https://www.youtube.com/watch?v=jw5EBwRpP4o" title="VTV1" rel="nofollow" target="_blink">
                              <img width="175" height="90" class="lazy" alt="" src="statics/imgs/1200px-vtv1_logo_2013_finalsvg_1557884248.png" />
                           </a>
                        </div>
                        @endif
                     </div>
                </div>
            </div>
        </div>
    @stop

    @section('script')
        <script>
            function getBrands(item) {
                $('.result').html('');
                $.ajax({
                    url: '{!! route('getBrands') !!}',
                    dataType: 'json',
                    data: {
                        item: item
                    },
                    type: 'post',
                    success: function(res) {

                    }
                });
            }


            // product_viewed();
            // function product_viewed(clicked_id){
            //     var id = $('#product_viewed_id').val();
            //     if(id != undefined){
            //         alert(id);
            //     }
            // }
        </script>
    @stop
