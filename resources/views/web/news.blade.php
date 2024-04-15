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
      <div class="bota_body_main">
         <header class="bota_header">
            <div class="bota_header_top">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-3 col-sm-12 col-lg-12 col-12">
                        <div class="bota_toggle_left navbar-left" id="bota_toggle_menu">
                           <a href="#menu" title="Menu mobile">
                               <div class="navicon-line"></div>
                               <div class="navicon-line"></div>
                               <div class="navicon-line"></div>
                           </a>
                       </div>
                        <div id="logo">
                              <a href="/" title="Đồng hồ chính hãng ">
                              <img width="216" height="62" class="logo_img" src="statics/imgs/logo-xwatch-216-62_1616143160.png" alt="Đồng hồ chính hãng ">
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-9 col-sm-9 col-lg-9">
                        <div class="bota_header_right">
                           <div class="bota_header_search">
                              <div id="search">
                                 <div class="bota_header_search_form_wrap">
                                    <form action="/" name="search_form" id="search_form" method="get">
                                       <input type="text" value="" placeholder="Tìm kiếm" id="keyword" name="keyword" class="keyword" autocomplete="off">
                                       <button type="submit" class="button-search" id="searchbt" name="search">
                                          <svg x="0px" y="0px" viewBox="0 0 250.313 250.313" style="enable-background:new 0 0 250.313 250.313;" xml:space="preserve">
                                             <g id="Search">
                                                <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M244.186,214.604l-54.379-54.378c-0.289-0.289-0.628-0.491-0.93-0.76   c10.7-16.231,16.945-35.66,16.945-56.554C205.822,46.075,159.747,0,102.911,0S0,46.075,0,102.911   c0,56.835,46.074,102.911,102.91,102.911c20.895,0,40.323-6.245,56.554-16.945c0.269,0.301,0.47,0.64,0.759,0.929l54.38,54.38   c8.169,8.168,21.413,8.168,29.583,0C252.354,236.017,252.354,222.773,244.186,214.604z M102.911,170.146   c-37.134,0-67.236-30.102-67.236-67.235c0-37.134,30.103-67.236,67.236-67.236c37.132,0,67.235,30.103,67.235,67.236   C170.146,140.044,140.043,170.146,102.911,170.146z"></path>
                                             </g>
                                          </svg>
                                       </button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="bota_header_address_map">
                              <a href="he-thong-cua-hang.html" alt="Hệ thống cửa hàng ">
                                 <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                    <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"></path>
                                    <g></g>
                                 </svg>
                                 Cửa hàng
                              </a>
                           </div>
                           <div class="bota_header_hotline">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32.666 32.666" style="enable-background:new 0 0 32.666 32.666;" xml:space="preserve">
                                 <g>
                                    <path d="M28.189,16.504h-1.666c0-5.437-4.422-9.858-9.856-9.858l-0.001-1.664C23.021,4.979,28.189,10.149,28.189,16.504z
                                       M16.666,7.856L16.665,9.52c3.853,0,6.983,3.133,6.981,6.983l1.666-0.001C25.312,11.735,21.436,7.856,16.666,7.856z M16.333,0
                                       C7.326,0,0,7.326,0,16.334c0,9.006,7.326,16.332,16.333,16.332c0.557,0,1.007-0.45,1.007-1.006c0-0.559-0.45-1.01-1.007-1.01
                                       c-7.896,0-14.318-6.424-14.318-14.316c0-7.896,6.422-14.319,14.318-14.319c7.896,0,14.317,6.424,14.317,14.319
                                       c0,3.299-1.756,6.568-4.269,7.954c-0.913,0.502-1.903,0.751-2.959,0.761c0.634-0.377,1.183-0.887,1.591-1.529
                                       c0.08-0.121,0.186-0.228,0.238-0.359c0.328-0.789,0.357-1.684,0.555-2.518c0.243-1.064-4.658-3.143-5.084-1.814
                                       c-0.154,0.492-0.39,2.048-0.699,2.458c-0.275,0.366-0.953,0.192-1.377-0.168c-1.117-0.952-2.364-2.351-3.458-3.457l0.002-0.001
                                       c-0.028-0.029-0.062-0.061-0.092-0.092c-0.031-0.029-0.062-0.062-0.093-0.092v0.002c-1.106-1.096-2.506-2.34-3.457-3.459
                                       c-0.36-0.424-0.534-1.102-0.168-1.377c0.41-0.311,1.966-0.543,2.458-0.699c1.326-0.424-0.75-5.328-1.816-5.084
                                       c-0.832,0.195-1.727,0.227-2.516,0.553c-0.134,0.057-0.238,0.16-0.359,0.24c-2.799,1.774-3.16,6.082-0.428,9.292
                                       c1.041,1.228,2.127,2.416,3.245,3.576l-0.006,0.004c0.031,0.031,0.063,0.06,0.095,0.09c0.03,0.031,0.059,0.062,0.088,0.095
                                       l0.006-0.006c1.16,1.118,2.535,2.765,4.769,4.255c4.703,3.141,8.312,2.264,10.438,1.098c3.67-2.021,5.312-6.338,5.312-9.719
                                       C32.666,7.326,25.339,0,16.333,0z"></path>
                                 </g>
                              </svg>
                              <span class="txt-buy">Mua hàng</span>
                              <a href="tel:0813055555">081-30-55555</a>
                           </div>
                           <div class="bota_header_shopcart">
                              <div class="bota_shopcart_simple">
                                 <div class="count">
                                    <a class="buy_img" href="gio-hang.html" title="Giỏ hàng thanh toán" rel="nofollow">
                                       <svg x="0px" y="0px" viewBox="0 0 30.511 30.511" style="enable-background:new 0 0 30.511 30.511;" xml:space="preserve" width="22px" height="22px">
                                          <g>
                                             <path d="M26.818,19.037l3.607-10.796c0.181-0.519,0.044-0.831-0.102-1.037   c-0.374-0.527-1.143-0.532-1.292-0.532L8.646,6.668L8.102,4.087c-0.147-0.609-0.581-1.19-1.456-1.19H0.917   C0.323,2.897,0,3.175,0,3.73v1.49c0,0.537,0.322,0.677,0.938,0.677h4.837l3.702,15.717c-0.588,0.623-0.908,1.531-0.908,2.378   c0,1.864,1.484,3.582,3.38,3.582c1.79,0,3.132-1.677,3.35-2.677h7.21c0.218,1,1.305,2.717,3.349,2.717   c1.863,0,3.378-1.614,3.378-3.475c0-1.851-1.125-3.492-3.359-3.492c-0.929,0-2.031,0.5-2.543,1.25h-8.859   c-0.643-1-1.521-1.31-2.409-1.345l-0.123-0.655h13.479C26.438,19.897,26.638,19.527,26.818,19.037z M25.883,22.828   c0.701,0,1.27,0.569,1.27,1.27s-0.569,1.27-1.27,1.27s-1.271-0.568-1.271-1.27C24.613,23.397,25.182,22.828,25.883,22.828z    M13.205,24.098c0,0.709-0.576,1.286-1.283,1.286c-0.709-0.002-1.286-0.577-1.286-1.286s0.577-1.286,1.286-1.286   C12.629,22.812,13.205,23.389,13.205,24.098z"></path>
                                          </g>
                                       </svg>
                                       <span>0</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bota_header_menu" id="nav-mainmenu">
               <div class="container">
                  <ul class="nav navbar-nav clearfix">
                     <li class="item active ">
                        <a class="name" title="Trang chủ" href="">
                           <svg fill="#fff" width="18px" height="18px" x="0px" y="0px" viewBox="0 0 27.02 27.02" style="enable-background:new 0 0 27.02 27.02;" xml:space="preserve">
                              <g>
                                 <path d="M3.674,24.876c0,0-0.024,0.604,0.566,0.604c0.734,0,6.811-0.008,6.811-0.008l0.01-5.581   c0,0-0.096-0.92,0.797-0.92h2.826c1.056,0,0.991,0.92,0.991,0.92l-0.012,5.563c0,0,5.762,0,6.667,0   c0.749,0,0.715-0.752,0.715-0.752V14.413l-9.396-8.358l-9.975,8.358C3.674,14.413,3.674,24.876,3.674,24.876z"></path>
                                 <path d="M0,13.635c0,0,0.847,1.561,2.694,0l11.038-9.338l10.349,9.28c2.138,1.542,2.939,0,2.939,0   L13.732,1.54L0,13.635z"></path>
                                 <polygon points="23.83,4.275 21.168,4.275 21.179,7.503 23.83,9.752"></polygon>
                              </g>
                           </svg>
                        </a>
                     </li>
                     <li class="item dropdown">
                        <a class="name" href="detail_info.html" title="Về " target="_self" rel="">
                        Về                     </a>
                        <div class="highlight layer_menu_accessories">
                           <div class="menu_col">
                              <div class="clearfix field_name normal">
                                 <div class="field_label">
                                    <a href="kien-thuc-ve-thuong-hieu/cau-chuyen-thuong-hieu-n958245.html" title="Câu chuyện thương hiệu" target="_self" rel="">Câu chuyện thương hiệu</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal">
                                 <div class="field_label">
                                    <a href="" title="Giới thiệu đồng hồ " target="_self" rel="">Giới thiệu đồng hồ </a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal">
                                 <div class="field_label">
                                    <a href="danh-muc-tin/triet-ly-kinh-doanh-chu-tam-hang-dau.html" title="Triết lý kinh doanh" target="_self" rel="">Triết lý kinh doanh</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal">
                                 <div class="field_label">
                                    <a href="danh-muc-tin/chinh-sach-bao-hanh.html" title="Chính sách bảo hành" target="_self" rel="">Chính sách bảo hành</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="item" id="menu_item_828">
                        <a class="name" href="thuong-hieu.html" title="Thương hiệu" target="_self" rel="">
                        Thương hiệu                    </a>
                        <div class="highlight layer_menu_1" id="childs_of_828">
                           <!--	FILTER			-->
                           <div class="menu_col" id="menu_col_0">
                              <div class="clearfix field_name normal first_field" data-id="id_field_manufactory">
                                 <p class="fl item-manu-menu oo"><a href="dong-ho-pc754/dong-ho-op-olym-pianus-olympia-star.html" title="Đồng hồ OP Olym Pianus Olympia Star"><img class="lazy" alt="Đồng hồ OP Olym Pianus Olympia Star" src="statics/imgs/1_1562147820.png"></a></p>
                                 <p class="fl item-manu-menu oo"><a href="dong-ho-pc754/dong-ho-ogival.html" title="Đồng hồ Ogival"><img class="lazy" alt="Đồng hồ Ogival" src="statics/imgs/brand-ogival_1561519995.png"></a></p>
                                 <p class="fl item-manu-menu ss"><a href="dong-ho-pc754/dong-ho-srwatch.html" title="Đồng hồ SRWATCH"><img class="lazy" alt="Đồng hồ SRWATCH" src="statics/imgs/srwatch-brand_1572316117.png"></a></p>
                                 <p class="fl item-manu-menu bb"><a href="dong-ho-pc754/dong-ho-bentley.html" title="Đồng hồ Bentley"><img class="lazy" alt="Đồng hồ Bentley" src="statics/imgs/hang-bently_1569042227.png"></a></p>
                                 <p class="fl item-manu-menu oo"><a href="dong-ho-pc754/dong-ho-orient.html" title="Đồng hồ Orient"><img class="lazy" alt="Đồng hồ Orient" src="statics/imgs/brand-orient_1561519585.png"></a></p>
                                 <p class="fl item-manu-menu cc"><a href="dong-ho-pc754/dong-ho-citizen.html" title="Đồng hồ Citizen"><img class="lazy" alt="Đồng hồ Citizen" src="statics/imgs/brand-citizen_1561519960.png"></a></p>
                                 <p class="fl item-manu-menu ss"><a href="dong-ho-pc754/dong-ho-seiko.html" title="Đồng hồ Seiko"><img class="lazy" alt="Đồng hồ Seiko" src="statics/imgs/brand-seiko_1561519576.png"></a></p>
                                 <p class="fl item-manu-menu ff"><a href="dong-ho-pc754/dong-ho-festina.html" title="Đồng hồ Festina"><img class="lazy" alt="Đồng hồ Festina" src="statics/imgs/brand-festina_1592444667.png"></a></p>
                                 <p class="fl item-manu-menu ff"><a href="dong-ho-pc754/dong-ho-freelook.html" title="Đồng hồ Freelook"><img class="lazy" alt="Đồng hồ Freelook" src="statics/imgs/brand-freelook_1570673916.png"></a></p>
                                 <p class="fl item-manu-menu bb"><a href="dong-ho-pc754/dong-ho-bulova.html" title="Đồng hồ Bulova"><img class="lazy" alt="Đồng hồ Bulova" src="statics/imgs/brand-bulova_1561519549.png"></a></p>
                                 <p class="fl item-manu-menu cc"><a href="dong-ho-pc754/dong-ho-candino.html" title="Đồng hồ Candino"><img class="lazy" alt="Đồng hồ Candino" src="statics/imgs/brand-candino_1652154877.png"></a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_1">
                              <div class="clearfix field_name normal first_field" data-id="id_field_price"></div>
                           </div>
                           <div class="menu_col" id="menu_col_2">
                              <div class="clearfix field_name normal first_field" data-id="id_field_bo_may"></div>
                           </div>
                           <div class="menu_col" id="menu_col_3">
                              <div class="clearfix field_name normal first_field" data-id="id_field_loai_day"></div>
                           </div>
                           <div class="menu_col" id="menu_col_4">
                              <div class="clearfix field_name normal first_field" data-id="id_field_size_mat"></div>
                           </div>
                           <div class="clearfix"></div>
                           <!--	FILTER			-->
                        </div>
                     </li>
                     <li class="item" id="menu_item_797">
                        <a class="name" href="product.html" title="Đồng hồ nam" target="" rel="">
                        Đồng hồ nam                    </a>
                        <div class="highlight layer_menu_1" id="childs_of_797">
                           <!--	FILTER			-->
                           <div class="menu_col" id="menu_col_0">
                              <div class="clearfix field_name normal first_field" data-id="id_field_manufactory">
                                 <div class="field_label" id="mn_id_field_60">Thương hiệu</div>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-op-olym-pianus-olympia-star.html" title="Đồng hồ OP Olym Pianus - Olympia Star">OP Olym Pianus - Olympia Star</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-orient.html" title="Đồng hồ Orient">Orient</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-ogival.html" title="Đồng hồ Ogival">Ogival</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-citizen.html" title="Đồng hồ Citizen">Citizen</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-freelook.html" title="Đồng hồ Freelook">Freelook</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-srwatch.html" title="Đồng hồ SRWATCH">SRWATCH</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-bentley.html" title="Đồng hồ Bentley">Bentley</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nam-pc85/dong-ho-candino.html" title="Đồng hồ Candino">Candino</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nam-pc85/dong-ho-festina.html" title="Đồng hồ Festina">Festina</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nam-pc85/dong-ho-seiko.html" title="Đồng hồ Seiko">Seiko</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nam-pc85/dong-ho-bulova.html" title="Đồng hồ Bulova">Bulova</a></p>
                                 <p class="read_more_mm"><a href="javascript:void(0)">Xem thêm</a></p>
                                 <p class="hidden_more_mm"><a href="javascript:void(0)">Thu gọn</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_1">
                              <div class="clearfix field_name normal first_field" data-id="id_field_price">
                                 <div class="field_label" id="mn_id_field_37">Mức giá</div>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-2-5-trieu.html" title="Đồng hồ Từ 2 triệu - 5 triệu">Từ 2 triệu - 5 triệu</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-duoi-2-trieu.html" title="Đồng hồ Dưới 2 triệu">Dưới 2 triệu</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-5-10-trieu.html" title="Đồng hồ Từ 5 triệu - 10 triệu">Từ 5 triệu - 10 triệu</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-10-20-trieu.html" title="Đồng hồ Từ 10 triệu - 20 triệu">Từ 10 triệu - 20 triệu</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-20-50-trieu.html" title="Đồng hồ Từ 20 triệu - 50 triệu">Từ 20 triệu - 50 triệu</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-50-100-trieu.html" title="Đồng hồ Từ 50 triệu - 100 triệu">Từ 50 triệu - 100 triệu</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_2">
                              <div class="clearfix field_name normal first_field" data-id="id_field_bo_may">
                                 <div class="field_label" id="mn_id_field_42">Bộ máy</div>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-automatic.html" title="Đồng hồ Automatic">Automatic</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-quartz.html" title="Đồng hồ Quartz">Quartz</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-nang-luong-mat-troi.html" title="Đồng hồ Năng Lượng Mặt Trời">Năng Lượng Mặt Trời</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-kinetic.html" title="Đồng hồ Kinetic">Kinetic</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-len-cot-tay.html" title="Đồng hồ Lên cót tay">Lên cót tay</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_3">
                              <div class="clearfix field_name normal first_field" data-id="id_field_loai_day">
                                 <div class="field_label" id="mn_id_field_47">Loại dây</div>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-thep-khong-gi.html" title="Đồng hồ Thép Không Gỉ">Thép Không Gỉ</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-day-da.html" title="Đồng hồ Dây Da">Dây Da</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-day-vai.html" title="Đồng hồ Dây vải">Dây vải</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-titanium.html" title="Đồng hồ Titanium">Titanium</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-cao-su.html" title="Đồng hồ Dây Cao Su">Dây Cao Su</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-day-nhua.html" title="Đồng hồ Dây nhựa">Dây nhựa</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_4">
                              <div class="clearfix field_name normal first_field" data-id="id_field_size_mat">
                                 <div class="field_label" id="mn_id_field_53">Size mặt</div>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-size_mat_duoi_30.html" title="Đồng hồ < 30 mm">&lt; 30 mm</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-30-34-mm.html" title="Đồng hồ Từ 30mm - 34mm">Từ 30mm - 34mm</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-35-39-mm.html" title="Đồng hồ Từ 35mm - 39mm">Từ 35mm - 39mm</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-40-43-mm.html" title="Đồng hồ Từ 40mm - 43mm">Từ 40mm - 43mm</a></p>
                                 <p><a href="dong-ho-nam-pc85/dong-ho-size_mat_tren_43.html" title="Đồng hồ Trên 43mm">Trên 43mm</a></p>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <!--	FILTER			-->
                        </div>
                     </li>
                     <li class="item" id="menu_item_798">
                        <a class="name " href="product.html" title="Đồng hồ nữ" target="" rel="">
                        Đồng hồ nữ
                     </a>
                        <div class="highlight layer_menu_1" id="childs_of_798">
                           <!--	FILTER			-->
                           <div class="menu_col" id="menu_col_0">
                              <div class="clearfix field_name normal first_field" data-id="id_field_manufactory">
                                 <div class="field_label">Thương hiệu</div>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-op-olym-pianus-olympia-star.html" title="Đồng hồ OP Olym Pianus - Olympia Star">OP Olym Pianus - Olympia Star</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-orient.html" title="Đồng hồ Orient">Orient</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-ogival.html" title="Đồng hồ Ogival">Ogival</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-citizen.html" title="Đồng hồ Citizen">Citizen</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-freelook.html" title="Đồng hồ Freelook">Freelook</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-srwatch.html" title="Đồng hồ SRWATCH">SRWATCH</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-bentley.html" title="Đồng hồ Bentley">Bentley</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nu-pc86/dong-ho-candino.html" title="Đồng hồ Candino">Candino</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nu-pc86/dong-ho-festina.html" title="Đồng hồ Festina">Festina</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nu-pc86/dong-ho-seiko.html" title="Đồng hồ Seiko">Seiko</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-nu-pc86/dong-ho-bulova.html" title="Đồng hồ Bulova">Bulova</a></p>
                                 <p class="read_more_mm"><a href="javascript:void(0)">Xem thêm</a></p>
                                 <p class="hidden_more_mm"><a href="javascript:void(0)">Thu gọn</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_1">
                              <div class="clearfix field_name normal first_field" data-id="id_field_price">
                                 <div class="field_label">Mức giá</div>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-2-5-trieu.html" title="Đồng hồ Từ 2 triệu - 5 triệu">Từ 2 triệu - 5 triệu</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-duoi-2-trieu.html" title="Đồng hồ Dưới 2 triệu">Dưới 2 triệu</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-5-10-trieu.html" title="Đồng hồ Từ 5 triệu - 10 triệu">Từ 5 triệu - 10 triệu</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-10-20-trieu.html" title="Đồng hồ Từ 10 triệu - 20 triệu">Từ 10 triệu - 20 triệu</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-20-50-trieu.html" title="Đồng hồ Từ 20 triệu - 50 triệu">Từ 20 triệu - 50 triệu</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-50-100-trieu.html" title="Đồng hồ Từ 50 triệu - 100 triệu">Từ 50 triệu - 100 triệu</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_2">
                              <div class="clearfix field_name normal first_field" data-id="id_field_bo_may">
                                 <div class="field_label">Bộ máy</div>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-automatic.html" title="Đồng hồ Automatic">Automatic</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-quartz.html" title="Đồng hồ Quartz">Quartz</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-nang-luong-mat-troi.html" title="Đồng hồ Năng Lượng Mặt Trời">Năng Lượng Mặt Trời</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-kinetic.html" title="Đồng hồ Kinetic">Kinetic</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-len-cot-tay.html" title="Đồng hồ Lên cót tay">Lên cót tay</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_3">
                              <div class="clearfix field_name normal first_field" data-id="id_field_loai_day">
                                 <div class="field_label">Loại dây</div>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-thep-khong-gi.html" title="Đồng hồ Thép Không Gỉ">Thép Không Gỉ</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-day-da.html" title="Đồng hồ Dây Da">Dây Da</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-day-vai.html" title="Đồng hồ Dây vải">Dây vải</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-titanium.html" title="Đồng hồ Titanium">Titanium</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-cao-su.html" title="Đồng hồ Dây Cao Su">Dây Cao Su</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-day-nhua.html" title="Đồng hồ Dây nhựa">Dây nhựa</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_4">
                              <div class="clearfix field_name normal first_field" data-id="id_field_size_mat">
                                 <div class="field_label">Size mặt</div>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-size_mat_duoi_30.html" title="Đồng hồ < 30 mm">&lt; 30 mm</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-30-34-mm.html" title="Đồng hồ Từ 30mm - 34mm">Từ 30mm - 34mm</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-35-39-mm.html" title="Đồng hồ Từ 35mm - 39mm">Từ 35mm - 39mm</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-40-43-mm.html" title="Đồng hồ Từ 40mm - 43mm">Từ 40mm - 43mm</a></p>
                                 <p><a href="dong-ho-nu-pc86/dong-ho-size_mat_tren_43.html" title="Đồng hồ Trên 43mm">Trên 43mm</a></p>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <!--	FILTER-->
                        </div>
                     </li>
                     <li class="item" id="menu_item_854">
                        <a class="name" href="product.html" title="Outlet" target="_self" rel="">
                           Outlet
                        </a>
                        <div class="highlight layer_menu_2" id="childs_of_854">
                           <!--	FILTER-->
                           <div class="menu_col">
                              <div class="clearfix field_name normal first_field" data-id="id_field_manufactory">
                                 <div class="field_label">Thương hiệu</div>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-op-olym-pianus-olympia-star.html" title="Đồng hồ OP Olym Pianus - Olympia Star">OP Olym Pianus - Olympia Star</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-orient.html" title="Đồng hồ Orient">Orient</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-ogival.html" title="Đồng hồ Ogival">Ogival</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-citizen.html" title="Đồng hồ Citizen">Citizen</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-freelook.html" title="Đồng hồ Freelook">Freelook</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-srwatch.html" title="Đồng hồ SRWATCH">SRWATCH</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-bentley.html" title="Đồng hồ Bentley">Bentley</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-outlet-pc761/dong-ho-candino.html" title="Đồng hồ Candino">Candino</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-outlet-pc761/dong-ho-festina.html" title="Đồng hồ Festina">Festina</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-outlet-pc761/dong-ho-seiko.html" title="Đồng hồ Seiko">Seiko</a></p>
                                 <p class="manu-item-hd"><a href="dong-ho-outlet-pc761/dong-ho-bulova.html" title="Đồng hồ Bulova">Bulova</a></p>
                                 <p class="read_more_mm"><a href="javascript:void(0)">Xem thêm</a></p>
                                 <p class="hidden_more_mm"><a href="javascript:void(0)">Thu gọn</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_1">
                              <div class="clearfix field_name normal first_field" data-id="id_field_price">
                                 <div class="field_label">Mức giá</div>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-2-5-trieu.html" title="Đồng hồ Từ 2 triệu - 5 triệu">Từ 2 triệu - 5 triệu</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-duoi-2-trieu.html" title="Đồng hồ Dưới 2 triệu">Dưới 2 triệu</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-5-10-trieu.html" title="Đồng hồ Từ 5 triệu - 10 triệu">Từ 5 triệu - 10 triệu</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-10-20-trieu.html" title="Đồng hồ Từ 10 triệu - 20 triệu">Từ 10 triệu - 20 triệu</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-20-50-trieu.html" title="Đồng hồ Từ 20 triệu - 50 triệu">Từ 20 triệu - 50 triệu</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-50-100-trieu.html" title="Đồng hồ Từ 50 triệu - 100 triệu">Từ 50 triệu - 100 triệu</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_2">
                              <div class="clearfix field_name normal first_field" data-id="id_field_bo_may">
                                 <div class="field_label">Bộ máy</div>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-automatic.html" title="Đồng hồ Automatic">Automatic</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-quartz.html" title="Đồng hồ Quartz">Quartz</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-nang-luong-mat-troi.html" title="Đồng hồ Năng Lượng Mặt Trời">Năng Lượng Mặt Trời</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-kinetic.html" title="Đồng hồ Kinetic">Kinetic</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-len-cot-tay.html" title="Đồng hồ Lên cót tay">Lên cót tay</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_3">
                              <div class="clearfix field_name normal first_field" data-id="id_field_loai_day">
                                 <div class="field_label">Loại dây</div>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-thep-khong-gi.html" title="Đồng hồ Thép Không Gỉ">Thép Không Gỉ</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-day-da.html" title="Đồng hồ Dây Da">Dây Da</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-day-vai.html" title="Đồng hồ Dây vải">Dây vải</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-titanium.html" title="Đồng hồ Titanium">Titanium</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-cao-su.html" title="Đồng hồ Dây Cao Su">Dây Cao Su</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-day-nhua.html" title="Đồng hồ Dây nhựa">Dây nhựa</a></p>
                              </div>
                           </div>
                           <div class="menu_col" id="menu_col_4">
                              <div class="clearfix field_name normal first_field" data-id="id_field_size_mat">
                                 <div class="field_label">Size mặt</div>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-size_mat_duoi_30.html" title="Đồng hồ < 30 mm">&lt; 30 mm</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-30-34-mm.html" title="Đồng hồ Từ 30mm - 34mm">Từ 30mm - 34mm</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-35-39-mm.html" title="Đồng hồ Từ 35mm - 39mm">Từ 35mm - 39mm</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-40-43-mm.html" title="Đồng hồ Từ 40mm - 43mm">Từ 40mm - 43mm</a></p>
                                 <p><a href="dong-ho-outlet-pc761/dong-ho-size_mat_tren_43.html" title="Đồng hồ Trên 43mm">Trên 43mm</a></p>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <!--	FILTER			-->
                        </div>
                     </li>
                     <li class="item dropdown">
                        <a class="name" href="news.html" title="Kiến thức" target="_self" rel="">
                        Kiến thức
                     </a>
                        <div class="highlight layer_menu_accessories  wrapper-item-800">
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="danh-muc-tin/danh-cho-nguoi-moi-bat-dau.html" title="Dành cho người mới bắt đầu" target="" rel="">Dành cho người mới bắt đầu</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="danh-muc-tin/kien-thuc-chuyen-nganh.html" title="Kiến thức chuyên ngành" target="" rel="">Kiến thức chuyên ngành</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="danh-muc-tin/kinh-nghiem-mua-hang.html" title="Tư vấn chọn đồng hồ" target="" rel="">Tư vấn chọn đồng hồ</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="danh-muc-tin/phan-biet-dong-ho-that-gia.html" title="Phân biệt đồng hồ thật, giả" target="" rel="">Phân biệt đồng hồ thật, giả</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="tin-tuc.html" title="Tin tức" target="_self" rel="">Tin tức</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="item dropdown">
                        <a class="name" href="product.html" title="Phụ kiện" target="_self" rel="">
                           Phụ kiện
                        </a>
                        <div class="highlight layer_menu_accessories">
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="vi-da-pc758.html" title="Ví da" target="_self" rel="">Ví da</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="that-lung-nam-pc759.html" title="Thắt lưng nam" target="_self" rel="">Thắt lưng nam</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="phu-kien-dong-ho-pc755/dong-ho-day-dong-ho.html" title="Dây đồng hồ" target="" rel="">Dây đồng hồ</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="phu-kien-dong-ho-pc755/dong-ho-khoa-dong-ho.html" title="Khoá đồng hồ" target="_self" rel="">Khoá đồng hồ</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="phu-kien-dong-ho-pc755/dong-ho-phu-kien-hop-dung-dong-ho.html" title="Hộp đựng đồng hồ" target="" rel="">Hộp đựng đồng hồ</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="phu-kien-dong-ho-pc755/dong-ho-phu-kien-hop-xoay-dong-ho.html" title="Hộp xoay đồng hồ" target="" rel="">Hộp xoay đồng hồ</a>
                                 </div>
                              </div>
                           </div>
                           <div class="menu_col">
                              <div class="clearfix field_name normal ">
                                 <div class="field_label">
                                    <a href="phu-kien-dong-ho-pc755/dong-ho-dung-cu-ve-sinh.html" title="Dụng cụ vệ sinh" target="_self" rel="">Dụng cụ vệ sinh</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
                </div>
               </div>
         </header>
         <div class="bota_body_center">
            <div class="bota_breadcrumb_main">
               <div class="container">
                  <ul class="breadcrumb">
                     <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                     <li><a href="news.html" title="Tin tức">Tin tức</a></li>
                     <li><a href="news.html" title="Kiến thức đồng hồ">Kiến thức đồng hồ</a></li>
                  </ul>
               </div>
            </div>
            <div class="bota_news_page">
               <div class="container">
                  <h1 class="bota_page_title">
                     <span>Kiến thức đồng hồ</span>
                     <div class="bota_search_news">
                        <div class="bota_block_title"><span>Tìm kiếm tin tức</span></div>
                        <div id="block_content" class="block_content">
                           <form action="news.html" name="search_form" id="search_form" method="get">
                              <div class="search_form">
                                 <input type="text" placeholder="Nhập nội dung muốn tìm kiếm" name="keyword_news" class="keyword_news" value="">
                                 <button type="submit" class="button-search button">
                                    <svg aria-hidden="true" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16">
                                       <path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path>
                                    </svg>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </h1>
                  <div class="bota_news_page_list">
                     <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                           <div class="bota_news_list_item">
                              <figure class="bota_news_list_img">
                                 <a class="item-img" href="news_details.html">
                                 <img class="" src="statics/imgs/sale-bentley-800x456_1678785665.jpg" alt="HOT! HÈ RỰC RỠ, SALE HẾT CỠ: ƯU ĐÃI 20% ĐỒNG HỒ BENTLEY!">
                                 </a>
                              </figure>
                              <h2 class="bota_news_list_title"><a href="news_details.html" title="HOT! HÈ RỰC RỠ, SALE HẾT CỠ: ƯU ĐÃI 20% ĐỒNG HỒ BENTLEY!">HOT! HÈ RỰC RỠ, SALE HẾT CỠ: ƯU ĐÃI 20% ĐỒNG HỒ BENTLEY!</a></h2>
                              <div class="bota_news_list_datetime">
                                 14/03/2023
                              </div>
                              <div class="bota_news_list_summary"> chào hè với chương trình “Ưu đãi 20% đồng hồ Bentley” - Áp dụng cả Online &amp; Offline.</div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                           <div class="row">
                              <div class="col-xl-6 col-lg-6 col-sm-6">
                                 <div class="bota_news_inner_item">
                                    <figure class="bota_news_inner_img">
                                       <a class="item-img" href="news_details.html">
                                          <img src="statics/imgs/orient-golden-eye-2_1672712228.jpg" alt="Đồng hồ Orient Golden Eye 2 - Thiết kế cổ điển toát lên phẩm chất quý ông lịch lãm, từng trải">
                                       </a>
                                    </figure>
                                    <div class="bota_news_inner_title">
                                       <h2 class="item_title"><a href="news_details.html" title="Đồng hồ Orient Golden Eye 2 - Thiết kế cổ điển toát lên phẩm chất quý ông lịch lãm, từng trải">Đồng hồ Orient Golden Eye 2 - Thiết kế cổ điển toát lên phẩm chất quý ông lịch lãm, từng trải</a></h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-sm-6">
                                 <div class="bota_news_inner_item">
                                    <figure class="bota_news_inner_img">
                                       <a class="item-img" href="news_details.html">
                                          <img src="statics/imgs/dong-ho-ceo-noi-tieng-the-gioi_1672975339.jpg" alt="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                                       </a>
                                    </figure>
                                    <div class="bota_news_inner_title">
                                       <h2 class="item_title"><a href="news_details.html" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới</a></h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-sm-6">
                                 <div class="bota_news_inner_item">
                                    <figure class="bota_news_inner_img">
                                       <a class="item-img" href="news_details.html">
                                          <img src="statics/imgs/dong-ho-cac-chu-tich-lon_1672914983.jpg" alt="Khám phá đồng hồ của các chủ tịch tập đoàn lớn nhất Việt Nam">
                                       </a>
                                    </figure>
                                    <div class="bota_news_inner_title">
                                       <h2 class="item_title"><a href="news_details.html" title="Khám phá đồng hồ của các chủ tịch tập đoàn lớn nhất Việt Nam">Khám phá đồng hồ của các chủ tịch tập đoàn lớn nhất Việt Nam</a></h2>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-6 col-lg-6 col-sm-6">
                                 <div class="bota_news_inner_item">
                                    <figure class="bota_news_inner_img">
                                       <a class="item-img" href="news_details.html">
                                          <img src="statics/imgs/dong-ho-nam-omega-01.jpg" alt="Đồng hồ Omega Seamaster - Khám phá bí ẩn về thủy quái đại dương">
                                       </a>
                                    </figure>
                                    <div class="bota_news_inner_title">
                                       <h2 class="item_title"><a href="news_details.html" title="Đồng hồ Omega Seamaster - Khám phá bí ẩn về thủy quái đại dương">Đồng hồ Omega Seamaster - Khám phá bí ẩn về "thủy quái" đại dương</a></h2>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="bota_news_page_bottom">
                     <div class="row">
                        <div class="col-xl-8 col-lg-8 col-sm-8">
                           <div class="bota_list_news_left">
                              <div class="bota_list_left_item clearfix">
                                 <figure class="bota_list_left_img">
                                    <a class="item-img" href="news_details.html">
                                    <img class="lazy" alt="Bạn biết gì về đồng hồ Rotary: Lịch sử? Quá trình phát triển? Giá bao nhiêu? Có tốt không?" src="statics/imgs/lich-su-thuong-hieu-dong-ho-rotary-chiec-banh-xe-co-canh-cover_1682401338.jpg" style="display: inline-block;">
                                    </a>
                                 </figure>
                                 <div class="bota_list_left_right">
                                    <h2 class="title"><a href="news_details.html" title="Bạn biết gì về đồng hồ Rotary: Lịch sử? Quá trình phát triển? Giá bao nhiêu? Có tốt không?">Bạn biết gì về đồng hồ Rotary: Lịch sử? Quá trình phát triển? Giá bao nhiêu? Có tốt không?</a></h2>
                                    <div class="datetime">
                                       25/04/2023
                                    </div>
                                    <div class="sum">
                                       Có lịch sử tồn tại hơn 120 năm trong ngành chế tác đồng hồ, thương hiệu đồng hồ Rotary tuy không phải là thương hiệu...
                                    </div>
                                    <a class="view-more" href="news_details.html">
                                       <svg x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                          <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"></path>
                                       </svg>
                                       Xem thêm
                                    </a>
                                 </div>
                              </div>
                              <!-- end.item  -->
                              <div class="bota_list_left_item  clearfix">
                                 <figure class="bota_list_left_img">
                                    <a class="item-img" href="news_details.html">
                                    <img class="lazy" alt="Tổng hợp những điều bạn chưa biết về thương hiệu đồng hồ Romanson nổi tiếng nhất hiện nay" src="statics/imgs/tat-tan-tat-ve-thuong-hieu-dong-ho-romanson-cover_1682399938.jpg" style="display: inline-block;">
                                    </a>
                                 </figure>
                                 <div class="bota_list_left_right">
                                    <h2 class="title"><a href="news_details.html" title="Tổng hợp những điều bạn chưa biết về thương hiệu đồng hồ Romanson nổi tiếng nhất hiện nay">Tổng hợp những điều bạn chưa biết về thương hiệu đồng hồ Romanson nổi tiếng nhất hiện nay</a></h2>
                                    <div class="datetime">
                                       25/04/2023
                                    </div>
                                    <div class="sum">
                                       Đồng hồ Romanson Cái tên không còn xa lạ với giới trẻ và ngành đồng hồ thời trang. Sự kết hợp hoàn hảo giữa...
                                    </div>
                                    <a class="view-more" href="news_details.html">
                                       <svg x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                          <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"></path>
                                       </svg>
                                       Xem thêm
                                    </a>
                                 </div>
                              </div>
                              <!-- end.item  -->
                              <div class="bota_list_left_item  clearfix">
                                 <figure class="bota_list_left_img">
                                    <a class="item-img" href="news_details.html">
                                    <img class="lazy" alt="Đồng hồ Rado Jubile của nước nào? Có tốt không? Giá bao nhiêu?" src="statics/imgs/tong-hop-tu-a-z-ve-dong-ho-rado-jubile-cover_1682398053.jpg" style="display: inline-block;">
                                    </a>
                                 </figure>
                                 <div class="bota_list_left_right">
                                    <h2 class="title"><a href="news_details.html" title="Đồng hồ Rado Jubile của nước nào? Có tốt không? Giá bao nhiêu?">Đồng hồ Rado Jubile của nước nào? Có tốt không? Giá bao nhiêu?</a></h2>
                                    <div class="datetime">
                                       25/04/2023
                                    </div>
                                    <div class="sum">
                                       Là một trong những bộ sưu tập nổi tiếng của thương hiệu Rador hàng đầu trong ngành sản xuất đồng hồ, đồng hồ Rado Jubile...
                                    </div>
                                    <a class="view-more" href="news_details.html">
                                       <svg x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                          <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"></path>
                                       </svg>
                                       Xem thêm
                                    </a>
                                 </div>
                              </div>
                              <!-- end.item  -->
                              <div class="bota_list_left_item  clearfix">
                                 <figure class="bota_list_left_img">
                                    <a class="item-img" href="news_details.html">
                                    <img class="lazy" alt="Tổng hợp thông tin về hãng đồng hồ Daniel Klein - Thương hiệu quen thuộc với tầng lớp trung lưu" src="statics/imgs/tong-hop-thong-tin-ve-hang-dong-ho-daniel-klein-thuong-hieu-quen-thuoc-voi-tang-lop-trung-luu-cover_1682008429.jpg" style="display: inline-block;">
                                    </a>
                                 </figure>
                                 <div class="bota_list_left_right">
                                    <h2 class="title"><a href="news_details.html" title="Tổng hợp thông tin về hãng đồng hồ Daniel Klein - Thương hiệu quen thuộc với tầng lớp trung lưu">Tổng hợp thông tin về hãng đồng hồ Daniel Klein - Thương hiệu quen thuộc với tầng lớp trung lưu</a></h2>
                                    <div class="datetime">
                                       20/04/2023
                                    </div>
                                    <div class="sum">
                                       Với lịch sử phát triển ngót nghét 50 năm, thương hiệu Daniel Klein đã vươn lên trở thành một trong những nhà sản xuất đồng...
                                    </div>
                                    <a class="view-more" href="news_details.html">
                                       <svg x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                          <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"></path>
                                       </svg>
                                       Xem thêm
                                    </a>
                                 </div>
                              </div>
                              <!-- end.item  -->
                              <div class="bota_list_left_item clearfix">
                                 <figure class="bota_list_left_img">
                                    <a class="item-img" href="news_details.html">
                                    <img class="lazy" alt="Đồng hồ Wenger của nước nào? Lịch sử thương hiệu? Giá bao nhiêu? Có tốt không?" src="statics/imgs/dong-ho-wenger-cua-nuoc-nao-lich-su-thuong-hieu-gia-bao-nhieu-co-tot-khong-cover_1682007623.jpg" style="display: inline-block;">
                                    </a>
                                 </figure>
                                 <div class="bota_list_left_right">
                                    <h2 class="title"><a href="news_details.html" title="Đồng hồ Wenger của nước nào? Lịch sử thương hiệu? Giá bao nhiêu? Có tốt không?">Đồng hồ Wenger của nước nào? Lịch sử thương hiệu? Giá bao nhiêu? Có tốt không?</a></h2>
                                    <div class="datetime">
                                       20/04/2023
                                    </div>
                                    <div class="sum">
                                       Mặc dù có tiếng tăm trên toàn thế giới nhưng tại Việt Nam, đồng hồ Wenger vẫn là cái tên khá xa lạ dù cho...
                                    </div>
                                    <a class="view-more" href="news_details.html">
                                       <svg x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                          <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"></path>
                                       </svg>
                                       Xem thêm
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div class="bota_pagination">
                              <span title="Page 1" class="current">
                                 <span>1</span>
                              </span>
                              <a class="other-page" title="Page 2" href="">
                                 <span>2</span>
                              </a>
                              <a class="other-page" title="Page 3" href="">
                                 <span>3</span>
                              </a>
                              <a class="other-page" title="Page 4" href="">
                                 <span>4</span>
                              </a>
                                 <b>..</b>
                                 <a class="next-page" title="Next page" href="">›</a>
                                 <a class="last-page" title="Last page" href="">››</a>
                              </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-sm-4">
                           <div class="bota_list_news_right">
                              <div class="bota_block_news_distinguish">
                                 <div class="bota_block_title">
                                    <span>Phân biệt đồng hồ thật giả</span>
                                 </div>
                                 <div class="news_list_body_default">
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="[INFOGRAPHIC ] - SỰ THẬT LỪA ĐẢO TRẦN TRỤI VỀ ĐỒNG HỒ FAKE!">
                                          <img src="statics/imgs/su-that-dong-ho-fake-800x456_1631676223.jpg" alt="[INFOGRAPHIC ] - SỰ THẬT LỪA ĐẢO TRẦN TRỤI VỀ ĐỒNG HỒ FAKE!">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="[INFOGRAPHIC ] - SỰ THẬT LỪA ĐẢO TRẦN TRỤI VỀ ĐỒNG HỒ FAKE!">[INFOGRAPHIC ] - SỰ THẬT LỪA ĐẢO TRẦN TRỤI...				</a>
                                          <div class="datetime">
                                             28/02/2023
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Cách phân biệt đồng hồ OP thật - giả chỉ với 5 bước">
                                          <img src="statics/imgs/67_1595997176.jpg" alt="Cách phân biệt đồng hồ OP thật - giả chỉ với 5 bước">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Cách phân biệt đồng hồ OP thật - giả chỉ với 5 bước">Cách phân biệt đồng hồ OP thật - giả chỉ với 5...				</a>
                                          <div class="datetime">
                                             20/12/2016
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Phân biệt đồng hồ Rolex thật giả: Bí kíp đến từ chuyên gia đầu ngành!">
                                          <img src="statics/imgs/phan-biet-dong-ho-rolex-that-gia_1589425277.jpg" alt="Phân biệt đồng hồ Rolex thật giả: Bí kíp đến từ chuyên gia đầu ngành!">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Phân biệt đồng hồ Rolex thật giả: Bí kíp đến từ chuyên gia đầu ngành!">Phân biệt đồng hồ Rolex thật giả: Bí kíp đến từ...				</a>
                                          <div class="datetime">
                                             20/12/2016
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Kiến thức cần biết để phân biệt đồng hồ Seiko thật giả">
                                          <img src="statics/imgs/gia-bia.jpg" alt="Kiến thức cần biết để phân biệt đồng hồ Seiko thật giả">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Kiến thức cần biết để phân biệt đồng hồ Seiko thật giả">Kiến thức cần biết để phân biệt đồng hồ Seiko thật...				</a>
                                          <div class="datetime">
                                             20/09/2017
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="bota_block_news_knowledge">
                                 <div class="bota_block_title"><span>Kiến thức chuyên ngành</span></div>
                                 <div class="news_list_body_default">
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Đồng hồ GMT - Nhà du hành vượt thời gian">
                                          <img src="statics/imgs/dong-ho-gmt-2-compressed.jpg" alt="Đồng hồ GMT - Nhà du hành vượt thời gian" onerror="javascript:this.src='https://www.xwatch.vn/wp-content/uploads/2016/12/dong-ho-gmt-2-compressed.jpg';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Đồng hồ GMT - Nhà du hành vượt thời gian">Đồng hồ GMT - Nhà du hành vượt thời gian				</a>
                                          <div class="datetime">
                                             20/12/2016
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Hỏi đáp những vấn đề xoay quanh: Đồng hồ quartz là gì?">
                                          <img src="statics/imgs/dong-ho-may-quartz-dai-loan.jpg" alt="Hỏi đáp những vấn đề xoay quanh: Đồng hồ quartz là gì?" onerror="javascript:this.src='https://www.xwatch.vn/wp-content/uploads/2017/11/dong-ho-may-quartz-dai-loan.jpg';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Hỏi đáp những vấn đề xoay quanh: Đồng hồ quartz là gì?">Hỏi đáp những vấn đề xoay quanh: Đồng hồ quartz là...				</a>
                                          <div class="datetime">
                                             09/11/2017
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="KHÁM PHÁ ĐIỀU THÚ VỊ VỀ CHÂN KÍNH ĐỒNG HỒ?">
                                          <img src="statics/imgs/chan-kinh-dong-ho.jpg" alt="KHÁM PHÁ ĐIỀU THÚ VỊ VỀ CHÂN KÍNH ĐỒNG HỒ?" onerror="javascript:this.src='https://www.xwatch.vn/wp-content/uploads/2016/12/chan-kinh-dong-ho.jpg';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="KHÁM PHÁ ĐIỀU THÚ VỊ VỀ CHÂN KÍNH ĐỒNG HỒ?">KHÁM PHÁ ĐIỀU THÚ VỊ VỀ CHÂN KÍNH ĐỒNG HỒ?				</a>
                                          <div class="datetime">
                                             20/12/2016
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Bật mí các loại đồng hồ điện tử hot nhất hiện nay">
                                          <img src="https://xwatch.vn/images/news/2022/06/14/resized/dong-ho-dien-tu-hot-nhat_1655204193.jpg" alt="Bật mí các loại đồng hồ điện tử hot nhất hiện nay" onerror="javascript:this.src='';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Bật mí các loại đồng hồ điện tử hot nhất hiện nay">Bật mí các loại đồng hồ điện tử hot nhất hiện nay				</a>
                                          <div class="datetime">
                                             15/06/2022
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="In-house Movement là gì?">
                                          <img src="statics/imgs/dong-ho-may-in-house-1-min.jpg" alt="In-house Movement là gì?" onerror="javascript:this.src='https://www.xwatch.vn/wp-content/uploads/2016/12/dong-ho-may-in-house-1-min.jpg';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="In-house Movement là gì?">In-house Movement là gì?				</a>
                                          <div class="datetime">
                                             20/12/2016
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Đánh giá đồng hồ Orient Bambino Gen 2 - Sang trọng và lịch lãm">
                                          <img src="statics/imgs/dong-ho-orient-bambino-gen-2-11.jpg" alt="Đánh giá đồng hồ Orient Bambino Gen 2 - Sang trọng và lịch lãm" onerror="javascript:this.src='';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Đánh giá đồng hồ Orient Bambino Gen 2 - Sang trọng và lịch lãm">Đánh giá đồng hồ Orient Bambino Gen 2 - Sang trọng...				</a>
                                          <div class="datetime">
                                             20/12/2016
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Orient Bambino Gen 4 - Khi cỗ máy thời gian đi vào huyền thoại">
                                          <img src="statics/imgs/orient-bambino-gen4_1630299042.jpg" alt="Orient Bambino Gen 4 - Khi cỗ máy thời gian đi vào huyền thoại" onerror="javascript:this.src='https://www.xwatch.vn/wp-content/uploads/2017/10/dong-ho-orient-bambino-gen-4.jpg';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Orient Bambino Gen 4 - Khi cỗ máy thời gian đi vào huyền thoại">Orient Bambino Gen 4 - Khi cỗ máy thời gian đi vào...				</a>
                                          <div class="datetime">
                                             15/08/2021
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="news-item clearfix">
                                       <figure>
                                          <a href="news_details.html" title="Ý nghĩa độ chịu nước Water Resistant ATM là gì?">
                                          <img src="statics/imgs/do-chong-nuoc-cua-dong-ho.jpg" alt="Ý nghĩa độ chịu nước Water Resistant ATM là gì?" onerror="javascript:this.src='https://www.xwatch.vn/wp-content/uploads/2017/07/do-chong-nuoc-cua-dong-ho.jpg';">
                                          </a>
                                       </figure>
                                       <div class="content-r">
                                          <a href="news_details.html" title="Ý nghĩa độ chịu nước Water Resistant ATM là gì?">Ý nghĩa độ chịu nước Water Resistant ATM là gì?				</a>
                                          <div class="datetime">
                                             12/07/2017
                                          </div>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bota_block_news_new">
               <div class="container">
                  <div class="bota_block_title"><span>Kiến thức đồng hồ</span></div>
                  <div class="bota_news_list_body bota_news_list_column4">
                     <div class="bota_cate_news_item">
                        <div class="img">
                           <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           <img width="270" height="154" class="lazy" alt="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới" src="statics/imgs/sale-bentley-800x456_1678785665.jpg" style="display: inline-block;">
                           </a>
                        </div>
                        <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                        </a>
                        <div class="title"><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           </a><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">Khám phá bộ sưu tập đồng hồ của các CEO nổi...        </a>
                        </div>
                        <div class="date">
                           <svg viewBox="0 0 511.634 511.634" style="enable-background:new 0 0 511.634 511.634;" xml:space="preserve">
                              <g>
                                 <path d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261   C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41   h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05   c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989   c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639   C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358   h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712   c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05   C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365   v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z    M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333   c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268   c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423   c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23   h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z"></path>
                              </g>
                           </svg>
                           11/04/2023
                        </div>
                        <div class="summary">
                           Không đơn thuần là công cụ báo thời gian, đồng hồ đeo tay còn là biểu tượng của phong cách sống của...
                        </div>
                     </div>
                     <div class="bota_cate_news_item">
                        <div class="img">
                           <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           <img width="270" height="154" class="lazy" alt="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới" src="statics/imgs/orient-golden-eye-2_1672712228.jpg" style="display: inline-block;">
                           </a>
                        </div>
                        <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                        </a>
                        <div class="title"><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           </a><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">Khám phá bộ sưu tập đồng hồ của các CEO nổi...        </a>
                        </div>
                        <div class="date">
                           <svg viewBox="0 0 511.634 511.634" style="enable-background:new 0 0 511.634 511.634;" xml:space="preserve">
                              <g>
                                 <path d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261   C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41   h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05   c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989   c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639   C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358   h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712   c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05   C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365   v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z    M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333   c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268   c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423   c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23   h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z"></path>
                              </g>
                           </svg>
                           11/04/2023
                        </div>
                        <div class="summary">
                           Không đơn thuần là công cụ báo thời gian, đồng hồ đeo tay còn là biểu tượng của phong cách sống của...
                        </div>
                     </div>
                     <div class="bota_cate_news_item">
                        <div class="img">
                           <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           <img width="270" height="154" class="lazy" alt="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới" src="statics/imgs/dong-ho-cac-chu-tich-lon_1672914983.jpg" style="display: inline-block;">
                           </a>
                        </div>
                        <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                        </a>
                        <div class="title"><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           </a><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">Khám phá bộ sưu tập đồng hồ của các CEO nổi...        </a>
                        </div>
                        <div class="date">
                           <svg viewBox="0 0 511.634 511.634" style="enable-background:new 0 0 511.634 511.634;" xml:space="preserve">
                              <g>
                                 <path d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261   C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41   h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05   c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989   c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639   C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358   h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712   c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05   C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365   v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z    M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333   c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268   c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423   c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23   h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z"></path>
                              </g>
                           </svg>
                           11/04/2023
                        </div>
                        <div class="summary">
                           Không đơn thuần là công cụ báo thời gian, đồng hồ đeo tay còn là biểu tượng của phong cách sống của...
                        </div>
                     </div>
                     <div class="bota_cate_news_item">
                        <div class="img">
                           <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           <img width="270" height="154" class="lazy" alt="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới" src="statics/imgs/dong-ho-ceo-noi-tieng-the-gioi_1672975339.jpg" style="display: inline-block;">
                           </a>
                        </div>
                        <a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                        </a>
                        <div class="title"><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">
                           </a><a href="/" title="Khám phá bộ sưu tập đồng hồ của các CEO nổi tiếng thế giới">Khám phá bộ sưu tập đồng hồ của các CEO nổi...        </a>
                        </div>
                        <div class="date">
                           <svg viewBox="0 0 511.634 511.634" style="enable-background:new 0 0 511.634 511.634;" xml:space="preserve">
                              <g>
                                 <path d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261   C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41   h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05   c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85   c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989   c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639   C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358   h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686   c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712   c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05   C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365   v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z    M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333   c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268   c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423   c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23   h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z"></path>
                              </g>
                           </svg>
                           11/04/2023
                        </div>
                        <div class="summary">
                           Không đơn thuần là công cụ báo thời gian, đồng hồ đeo tay còn là biểu tượng của phong cách sống của...
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bota_adv_pos">
               <div class="bota_block_strengths">
                  <div class="container">
                     <div class="bota_adv_pos_content">
                        <div class="item">
                           <a href="" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">
                              <svg x="0px" y="0px" viewBox="0 0 186.61 160.29" style="enable-background:new 0 0 186.61 160.29;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M92.34,145.82c-30.88,0-57.83-22.02-64.09-52.35l-0.59-2.85H47.1L23.55,66.99L0,90.63h13.17l0.31,2    c6.04,38.57,39.94,67.66,78.86,67.66c36.62,0,67.9-24.54,77.11-59.38l-6.4,6.42l-8.1-8.13    C146.65,126.85,121.47,145.82,92.34,145.82"></path>
                                       <path d="M171.2,67.66C165.17,29.09,131.26,0,92.34,0C55.12,0,22.93,26.14,14.61,61.93l8.94-8.97l6.63,6.66    c8.77-26.78,33.78-45.15,62.17-45.15c30.88,0,57.83,22.02,64.08,52.35l0.59,2.85h-17.5l23.55,23.64l23.55-23.64h-15.09    L171.2,67.66z"></path>
                                    </g>
                                    <g>
                                       <path d="M86.79,157.04l-26.78-7.88l24.54-92.43H63.02l57.09-29.16L86.79,157.04z"></path>
                                    </g>
                                 </g>
                              </svg>
                           </a>
                           <div class="content-right">
                              <a class="title" href="" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất">1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất</a>
                              <a class="summary" href="" alt="1 đổi 1 trong vòng 30 ngày nếu lỗi của nhà sản xuất"></a>
                           </div>
                        </div>
                        <div class="item">
                           <a href="" alt="Miễn phí vận chuyển">
                              <svg x="0px" y="0px" viewBox="0 0 277.1 146.9" style="enable-background:new 0 0 277.1 146.9;" xml:space="preserve">
                                 <style type="text/css">
                                    .th1{fill:none;stroke:#000000;stroke-width:9;stroke-linecap:round;stroke-miterlimit:10;}
                                    .th2{fill:#100F15;}
                                 </style>
                                 <g>
                                    <path class="th1" d="M137.3,106.7h50.3c6,0,10.8-4.8,10.8-10.8V15.3c0-6-4.8-10.8-10.8-10.8H58.2c-6,0-10.8,4.8-10.8,10.8v5.5"></path>
                                    <path class="th1" d="M198.8,27.4h37.8c4.7,0,9,2.6,11.2,6.7l24.9,46.9v33.7c0,3.9-3.2,7.1-7.1,7.1h-19.7"></path>
                                    <path class="th1" d="M48.4,108.6v8c0,3.7,3,6.7,6.7,6.7h30.3"></path>
                                    <line class="th1" x1="127.8" y1="122.8" x2="202.1" y2="122.8"></line>
                                    <path class="th1" d="M250.2,45.1H224v30.3c0,6.1,4.9,11,11,11h37.6"></path>
                                    <circle class="th1" cx="222.9" cy="122.2" r="20.2"></circle>
                                    <circle class="th1" cx="222.9" cy="122.2" r="6.6"></circle>
                                    <circle class="th1" cx="106.7" cy="122.2" r="20.2"></circle>
                                    <circle class="th1" cx="106.7" cy="122.2" r="6.6"></circle>
                                    <g>
                                       <g>
                                          <path d="M103.9,48.1H91.8l-2.7,13.3h-7.6l6.6-33.1H110l-1.2,5.9H94.6l-1.6,8h12.1L103.9,48.1z"></path>
                                          <path d="M115.6,48.7l-2.5,12.7h-7.6l6.6-33.1h12c3.4,0,6,0.9,7.8,2.7c1.9,1.8,2.5,4.2,1.9,7.2c-0.4,1.8-1.1,3.4-2.2,4.6     c-1.1,1.2-2.5,2.2-4.4,2.9c1.7,0.6,2.9,1.6,3.5,3c0.6,1.4,0.7,3,0.4,4.9l-0.4,2.1c-0.2,0.9-0.3,1.9-0.2,3c0,1.1,0.3,1.9,0.8,2.3     l-0.1,0.5h-7.8c-0.5-0.5-0.7-1.3-0.6-2.4c0.1-1.2,0.2-2.3,0.4-3.4l0.4-2c0.3-1.7,0.2-2.9-0.3-3.7c-0.5-0.8-1.5-1.2-3-1.2H115.6z      M116.8,42.8h4.5c1.2,0,2.2-0.4,3.1-1.1c0.9-0.7,1.5-1.7,1.7-3c0.3-1.4,0.1-2.5-0.4-3.3c-0.6-0.8-1.5-1.2-2.8-1.2h-4.4     L116.8,42.8z"></path>
                                          <path d="M156.5,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L156.5,47.2z"></path>
                                          <path d="M181.3,47.2h-11.8l-1.6,8.2h14l-1.2,5.9h-21.6l6.6-33.1h21.6l-1.2,5.9h-14l-1.4,7.1h11.8L181.3,47.2z"></path>
                                       </g>
                                       <g>
                                          <path d="M97.8,66.1c-1.4-1.3-3.4-2-5.9-2c-2.4,0-4.5,0.6-6.2,1.7c-1.7,1.1-2.8,2.7-3.2,4.8c-0.4,2,0,3.6,1.3,4.9     c1.3,1.3,3.2,2.4,5.9,3.4c1.4,0.6,2.4,1.2,2.8,1.6c0.5,0.5,0.6,1.2,0.4,2.2c-0.1,0.6-0.5,1.1-1.1,1.5c-0.4,0.3-0.9,0.5-1.4,0.5     c-0.1,0-0.1,0-0.2,0c-0.1,0-0.2,0-0.4,0c-0.2,0-0.4,0-0.7,0H81c0.3,1,0.8,1.9,1.8,2.5c1.7,1.2,3.8,1.8,6.2,1.8     c2.5,0,4.6-0.5,6.3-1.6c1.7-1.1,2.8-2.7,3.2-4.8c0.4-2.1,0.1-3.8-1-5.1c-1.1-1.3-2.9-2.4-5.3-3.2c-1.8-0.7-3-1.3-3.6-1.7     c-0.5-0.4-0.7-1.1-0.5-2c0.1-0.6,0.5-1,1.1-1.5c0.6-0.4,1.2-0.6,1.9-0.6c1,0,1.7,0.3,2.2,0.9c0.5,0.6,0.7,1.4,0.5,2.3h5.4l0-0.1     C99.7,69.2,99.3,67.4,97.8,66.1z"></path>
                                          <path d="M118.6,88.7h-5.6l2-9.8h-7.9l-2,9.8h-5.6l4.9-24.3h5.6l-2,10.2h7.9l2-10.2h5.6L118.6,88.7z"></path>
                                          <path d="M128,88.7h-5.6l4.9-24.3h5.6L128,88.7z"></path>
                                          <path d="M139.1,80.4l-1.7,8.3h-5.6l4.9-24.3h9.3c2.5,0,4.5,0.7,5.9,2.2c1.4,1.5,1.8,3.4,1.4,5.7c-0.5,2.5-1.7,4.5-3.5,5.9     c-1.8,1.4-4.1,2.1-6.9,2.1H139.1z M140,76h3.8c1,0,1.9-0.3,2.6-1c0.7-0.7,1.2-1.5,1.4-2.6c0.2-1.1,0.1-2-0.3-2.7     c-0.4-0.7-1.2-1-2.3-1h-3.7L140,76z"></path>
                                          <path d="M90.4,84.7L90.4,84.7l-0.2,0C90.3,84.7,90.3,84.7,90.4,84.7z"></path>
                                       </g>
                                       <g>
                                          <path class="th2" d="M49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7s12.9,28.7,28.7,28.7C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5      M49.1,82.3C35.3,82.3,24,71,24,57.2c0-13.8,11.3-25.1,25.1-25.1c13.8,0,25.1,11.3,25.1,25.1C74.2,71,62.9,82.3,49.1,82.3"></path>
                                          <polygon class="th2" points="62.7,82.3 52.9,72.6 28.7,96.7 12.4,96.7 56.3,52.8 85.8,82.3    "></polygon>
                                          <path class="th2" d="M49.1,85.9C65,85.9,77.8,73,77.8,57.2S65,28.5,49.1,28.5c-15.8,0-28.7,12.9-28.7,28.7S33.3,85.9,49.1,85.9      M49.1,32.1c13.8,0,25.1,11.3,25.1,25.1c0,13.8-11.3,25.1-25.1,25.1C35.3,82.3,24,71,24,57.2C24,43.4,35.3,32.1,49.1,32.1"></path>
                                          <polygon class="th2" points="35.6,32.1 45.4,41.8 69.5,17.7 85.8,17.7 41.9,61.6 12.4,32.1    "></polygon>
                                       </g>
                                    </g>
                                    <line class="th1" x1="4.5" y1="106.7" x2="76.8" y2="106.7"></line>
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
                              <svg x="0px" y="0px" viewBox="0 0 198.9 199.07" style="enable-background:new 0 0 198.9 199.07;" xml:space="preserve">
                                 <g>
                                    <path d="M50.53,47.99l-1.71-6.38l2.6,1.57c7.04-4.38,14.67-7.54,22.72-9.42l4.32-17.55h25.94l4.32,17.55   c8.05,1.87,15.68,5.04,22.72,9.42l15.47-9.36l3.28,3.28l-26.79,26.79l-0.93-0.65c-9.14-6.4-19.87-9.78-31.04-9.78   c-11.32,0-21.83,3.49-30.53,9.45L48.25,50.26L50.53,47.99z"></path>
                                    <path d="M26.97,67.63l-1.21-2l5.63,1.51l2.27-2.27l12.72,12.72c-5.76,8.61-9.13,18.94-9.13,30.06c0,11.17,3.38,21.9,9.78,31.04   c3.61,5.15,8.04,9.6,13.17,13.23c9.18,6.49,19.98,9.91,31.22,9.91c29.88,0,54.18-24.3,54.18-54.18c0-11.25-3.43-22.05-9.91-31.22   l-0.66-0.93l26.77-26.77l3.44,3.44l-9.37,15.47c4.38,7.04,7.54,14.67,9.42,22.72l17.55,4.32v25.94l-17.55,4.32   c-1.88,8.05-5.04,15.69-9.42,22.72l9.37,15.47l-18.34,18.34l-15.47-9.36c-7.04,4.38-14.67,7.55-22.72,9.42l-4.32,17.55H78.46   l-4.31-17.55c-8.05-1.87-15.68-5.04-22.72-9.42l-15.47,9.36l-18.34-18.34l9.37-15.47c-4.38-7.04-7.54-14.67-9.42-22.72L0,120.61   V94.67l17.55-4.32C19.43,82.3,22.59,74.67,26.97,67.63"></path>
                                    <path d="M4.95,31.7l14.53,14.53c0.76,0.76,1.99,0.76,2.75,0l7.4-7.4c0.76-0.76,0.76-1.99,0-2.75L15.1,21.56l3.22-3.21l22.64,6.07   l6.07,22.64l-3.22,3.22l42.46,42.46c1.62-0.56,3.35-0.88,5.16-0.88c2.45,0,4.76,0.57,6.82,1.57L167,24.66l-2.72-2.72l4.64-17.31   L186.23,0l3.3,3.3l-11.12,11.12c-0.58,0.58-0.58,1.52,0,2.1l3.97,3.97c0.58,0.58,1.52,0.58,2.1,0L195.6,9.36l3.3,3.3l-4.64,17.31   l-17.31,4.64l-2.72-2.72l-68.69,68.69c1.06,2.12,1.68,4.51,1.68,7.05c0,8.72-7.07,15.79-15.79,15.79   c-8.72,0-15.79-7.07-15.79-15.79c0-1.59,0.24-3.12,0.68-4.57L33.66,60.41l-3.21,3.21L7.81,57.56L1.74,34.92L4.95,31.7z"></path>
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
