@php
    $logo = \App\Helper\FuncLib::getLogo();
@endphp

<header class="bota_header">
    <div class="bota_header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-sm-12 col-lg-12 col-12">
                    <div class="bota_toggle_left navbar-left" id="bota_toggle_menu">
                        <a href="#menu" title="Menu mobile">
                            <div class="navicon-line"></div>
                            <div class="navicon-line"></div>
                            <div class="navicon-line"></div>
                        </a>
                    </div>
                    <div id="logo">
                        {{-- <a href="/" title="Đồng hồ chính hãng Xwatch"> --}}
                            {{-- @foreach ($logos as $logo)
                                <img width="216" height="62" class="logo_img" src="{{ $logo->source_url }}"
                                    alt="Đồng hồ chính hãng Xwatch">
                            @endforeach --}}
                        {{-- </a> --}}
                        <a href="/" title="Đồng hồ chính hãng ">
                            @if (isset($logo->source_url) && !empty($logo->source_url))
                               <img width="216" height="62"  src="{{ asset($logo->source_url) }}" alt="Đồng hồ chính hãng ">
                            @endif
                         </a>
                    </div>
                </div>
                <div class="col-xl-9 col-sm-9 col-lg-9">
                    <div class="bota_header_right">
                        <div class="bota_header_search">
                            <div id="search">
                                <div class="bota_header_search_form_wrap">
                                    <form action="{{route('search.home')}}" name="search_form" id="search_form" method="post">
                                        @csrf
                                        <input type="text" value="" placeholder="Tìm kiếm" id="keyword"
                                            name="keyword" class="keyword" autocomplete="off">
                                        <button type="submit" class="button-search" id="searchbt" name="search">
                                            <svg x="0px" y="0px" viewBox="0 0 250.313 250.313"
                                                style="enable-background:new 0 0 250.313 250.313;" xml:space="preserve">
                                                <g id="Search">
                                                    <path style="fill-rule:evenodd;clip-rule:evenodd;"
                                                        d="M244.186,214.604l-54.379-54.378c-0.289-0.289-0.628-0.491-0.93-0.76   c10.7-16.231,16.945-35.66,16.945-56.554C205.822,46.075,159.747,0,102.911,0S0,46.075,0,102.911   c0,56.835,46.074,102.911,102.91,102.911c20.895,0,40.323-6.245,56.554-16.945c0.269,0.301,0.47,0.64,0.759,0.929l54.38,54.38   c8.169,8.168,21.413,8.168,29.583,0C252.354,236.017,252.354,222.773,244.186,214.604z M102.911,170.146   c-37.134,0-67.236-30.102-67.236-67.235c0-37.134,30.103-67.236,67.236-67.236c37.132,0,67.235,30.103,67.235,67.236   C170.146,140.044,140.043,170.146,102.911,170.146z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="bota_header_address_map">
                            <a href="{{route('address')}}" alt="Hệ thống cửa hàng ">
                                <svg x="0px" y="0px" viewBox="0 0 54.757 54.757"
                                    style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                    <path
                                        d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z">
                                    </path>
                                    <g></g>
                                </svg>
                                Cửa hàng
                            </a>
                        </div>
                        <div class="bota_header_hotline">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" viewBox="0 0 32.666 32.666"
                                style="enable-background:new 0 0 32.666 32.666;" xml:space="preserve">
                                <g>
                                    <path
                                        d="M28.189,16.504h-1.666c0-5.437-4.422-9.858-9.856-9.858l-0.001-1.664C23.021,4.979,28.189,10.149,28.189,16.504z
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
                                       C32.666,7.326,25.339,0,16.333,0z">
                                    </path>
                                </g>
                            </svg>
                            <span class="txt-buy">Mua hàng</span>
                            <a href="tel:081-30-55555">081-30-55555</a>
                        </div>
                        <div class="bota_header_shopcart">
                            <div class="bota_shopcart_simple">
                                <div class="count">
                                    <a class="buy_img" href="{{route('cart.showCart')}}" title="Giỏ hàng thanh toán" rel="nofollow">
                                        <svg x="0px" y="0px" viewBox="0 0 30.511 30.511"
                                            style="enable-background:new 0 0 30.511 30.511;" xml:space="preserve"
                                            width="22px" height="22px">
                                            <g>
                                                <path
                                                    d="M26.818,19.037l3.607-10.796c0.181-0.519,0.044-0.831-0.102-1.037   c-0.374-0.527-1.143-0.532-1.292-0.532L8.646,6.668L8.102,4.087c-0.147-0.609-0.581-1.19-1.456-1.19H0.917   C0.323,2.897,0,3.175,0,3.73v1.49c0,0.537,0.322,0.677,0.938,0.677h4.837l3.702,15.717c-0.588,0.623-0.908,1.531-0.908,2.378   c0,1.864,1.484,3.582,3.38,3.582c1.79,0,3.132-1.677,3.35-2.677h7.21c0.218,1,1.305,2.717,3.349,2.717   c1.863,0,3.378-1.614,3.378-3.475c0-1.851-1.125-3.492-3.359-3.492c-0.929,0-2.031,0.5-2.543,1.25h-8.859   c-0.643-1-1.521-1.31-2.409-1.345l-0.123-0.655h13.479C26.438,19.897,26.638,19.527,26.818,19.037z M25.883,22.828   c0.701,0,1.27,0.569,1.27,1.27s-0.569,1.27-1.27,1.27s-1.271-0.568-1.271-1.27C24.613,23.397,25.182,22.828,25.883,22.828z    M13.205,24.098c0,0.709-0.576,1.286-1.283,1.286c-0.709-0.002-1.286-0.577-1.286-1.286s0.577-1.286,1.286-1.286   C12.629,22.812,13.205,23.389,13.205,24.098z">
                                                </path>
                                            </g>
                                        </svg>
                                        @php
                                         $cart = session()->get('cart');
                                         if($cart === null){
                                            $totalItem = 0;
                                            }else{
                                                $totalItem = 0;
                                                foreach ($cart as $cartItem){
                                                    $totalItem += $cartItem['quantity'];
                                                }
                                            }
                                        @endphp
                                        <span id="quantity-cart">{{$totalItem }}</span>
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
            <ul class="nav navbar-nav clearfix nxtActiveMenus">
               <li class="item active ">
                  <a class="name" title="Trang chủ" href="{{route('home')}}">
                     <svg fill="#fff" width="18px" height="18px" x="0px" y="0px" viewBox="0 0 27.02 27.02" style="enable-background:new 0 0 27.02 27.02;" xml:space="preserve">
                        <g>
                           <path d="M3.674,24.876c0,0-0.024,0.604,0.566,0.604c0.734,0,6.811-0.008,6.811-0.008l0.01-5.581   c0,0-0.096-0.92,0.797-0.92h2.826c1.056,0,0.991,0.92,0.991,0.92l-0.012,5.563c0,0,5.762,0,6.667,0   c0.749,0,0.715-0.752,0.715-0.752V14.413l-9.396-8.358l-9.975,8.358C3.674,14.413,3.674,24.876,3.674,24.876z"></path>
                           <path d="M0,13.635c0,0,0.847,1.561,2.694,0l11.038-9.338l10.349,9.28c2.138,1.542,2.939,0,2.939,0   L13.732,1.54L0,13.635z"></path>
                           <polygon points="23.83,4.275 21.168,4.275 21.179,7.503 23.83,9.752"></polygon>
                        </g>
                     </svg>
                  </a>
               </li>
               @php
        $menus = \App\Helper\FuncLib::getMenu(0);
        @endphp

        @foreach ($menus as $menu)
        @if ($menu->id_name == 1)
        <li class="item">
            <a class="name" href="{{ url('') }}{{ $menu->url }}" title="{{ $menu->name }}" target="" rel="">
                {{ $menu->name }}
            </a>
            @php
                $menu_subs = \App\Helper\FuncLib::getMenu($menu->id);
            @endphp
            @if ($menu_subs->isNotEmpty())
                <div class="highlight layer_menu_1" id="childs_of_{{ $menu->id }}">
                    @foreach ($menu_subs as $menu_sub)
                        <div class="menu_col" id="menu_col_{{ $menu_sub->id }}">
                            <div class="clearfix field_name normal first_field" data-id="id_field_size_mat">
                                <div class="field_label" id="mn_id_field_{{ $menu_sub->id }}">{{ $menu_sub->name }}</div>
                                @php
                                    $menu_sub_items = \App\Helper\FuncLib::getMenu($menu_sub->id);
                                @endphp
                                @foreach ($menu_sub_items as $menu_sub_item)
                                    <p><a href="{{ url('') }}{{ $menu_sub_item->url }}" title="{{ $menu_sub_item->name }}">{{ $menu_sub_item->name }}</a></p>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @elseif ($menu->id_name == 2)
                <li class="item" id="menu_item_{{ $menu->id }}">
                    <a class="name" href="{{ url('') }}{{ $menu->url }}" title="{{ $menu->name }}" target="_self" rel="">{{ $menu->name }}</a>
                    @php
                        $brands = \App\Helper\FuncLib::getBrands();
                    @endphp
                    <div class="highlight layer_menu_1" id="childs_of_{{ $menu->id }}">
                        @if ($brands->isNotEmpty())
                            <div class="menu_col" id="menu_col_{{ $menu->id }}">
                                <div class="clearfix field_name normal first_field" data-id="id_field_manufactory">
                                    @foreach ($brands as $brand)
                                        <p class="fl item-manu-menu oo">
                                            <a href="/filter/{{ $brand->slug }}" title="{{ $brand->name }}" data-id="{{ $brand->id }}">
                                                <img class="lazy" alt="{{ $brand->name }}" src="{{ asset('uploads/brands/' . $brand->image) }}">
                                            </a>
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                @php
                    $menu_subs = \App\Helper\FuncLib::getMenu($menu->id);
                    @endphp

                    @if ($menu_subs->isNotEmpty())
                        <li class="item dropdown">
                    @else
                        <li class="item">
                    @endif
                    <a class="name" href="{{url('')}}{{$menu->url}}" title="{{$menu->name}}" target="" rel="">
                    {{$menu->name}}</a>
                    @php
                        $menu_subs = \App\Helper\FuncLib::getMenu($menu->id);
                        $has_submenu = count($menu_subs) > 0;
                    @endphp
                    @if ($has_submenu)
                    <div class="highlight layer_menu_accessories">
                       @php
                          $menu_subs = \App\Helper\FuncLib::getMenu($menu->id);
                          @endphp
                          @foreach ($menu_subs as $menu_sub)
                             <div class="menu_col">
                                <div class="clearfix field_name normal ">
                                   <div class="field_label">
                                      <a href="{{url('')}}{{$menu_sub->url}}" title="{{$menu_sub->name}}" target="_self" rel="">{{$menu_sub->name}}</a>
                                   </div>
                                </div>
                             </div>
                          @endforeach
                    </div>
                    @endif
                @endif
             </li>
               @endforeach
            </ul>
          </div>
          <div class="navigation-arrows">
            <i class="fa fa-chevron-left prev-menu-mb"></i>
            <i class="fa fa-chevron-right next-menu-mb"></i>
         </div>
         </div>
    </div>
</header>
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            var input = document.getElementById("keyword");
            input.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    document.getElementById("searchbt").click();
                }
            });


        });

    </script>
@endpush
