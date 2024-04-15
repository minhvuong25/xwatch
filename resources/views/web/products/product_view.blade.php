@extends('web.layouts.master')
@section('title')
@if (empty($products->seoContents))
{{ $products->name }}
@else
{{$products->seoContents->meta_title}}
@endif
@stop

@section('meta')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="robots" content="index,follow" />
<link rel="shortcut icon" href="/image/favicon/favicon.png" />
<link rel="icon" href="/image/favicon/favicon.png" type="image/x-icon" />
<meta name="theme-color" content="#aa722b" />
<meta name="description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
<meta name="keywords" content="{{ $products->name ?? 'Đồng Hồ Thịnh Vượng' }}">
<meta property="description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
<meta property="og:title" content="{{ $products->name ?? 'Đồng Hồ Thịnh Vượng' }}">
<meta property="dc:description og:description schema:description" name="description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}" />
<meta property="og:image:alt" content="{{ $products->name ?? 'Đồng Hồ Thịnh Vượng' }}" />
<meta proschperty="og:description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}" />
<meta property="og:description" content="{{ $seoContents->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
<meta property="og:site_name" content="{{ $products->name ?? 'Đồng Hồ Thịnh Vượng' }}" />

<meta property="og:image" content="{{ ($products) ? route("productImageShow", [ "id" => $products->id, "fileName" => $products->images->last()->name ?? "default.jpg" ]) : '#' }}" />
<meta property="og:image:secure_url" content="{{ ($products) ? route("productImageShow", [ "id" => $products->id, "fileName" => $products->images->last()->name ?? "default.jpg" ]): '#' }}" />
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
            @if($category)
            <li><a href="{{ route('category', $category->slug ) }}" title="{{$category->name}}">{{$category->name}}</a></li>
            @endif
            <li><a href="{{ route('web.product.show', $products->slug) }}" title="{{$products->name}}">{{$products->name}}</a></li>
         </ul>
      </div>
   </div>
   <div class="bota_product_detail">
      <div class="container">
         <div class="row">
            <div class="col-xl-4 col-sm-6 col-lg-4">
               <div class="bota_product_detail_zoom_img">
                  <div class="bota_product_detail_img">
                     <a href="{{route("productImageShow", [
                                 "id" => $products->id,
                                 "fileName" => $products->images->last()->name ?? "default.jpg"
                                 ])}}" title="" data-fancybox="imagesProduct">
                        @if ($products->images->first() === null)
                        <img src="" alt="{{ $request->getHost()}}">
                        @else
                        <img width="420" height="508" alt="{{ $request->getHost() }}" src="{{route("productImageShow", [
                                        "id" => $products->id,
                                        "fileName" => $products->images->last()->name ?? "default.jpg"
                                        ])}}">
                        @endif
                     </a>
                  </div>
                  <div class="bota_product_detail_thumbs">
                     <div id="sync2" class="owl-carousel">
                        @foreach ( $products->images as $a )
                        <div class="item">
                           <a href="{{route("productImageShow", [
                                          "id" => $products->id,
                                          "fileName" => $a->name ?? "default.jpg"
                                          ])}}" data-fancybox="imagesProduct">
                              <img width="94" height="120" src="{{route("productImageShow", [
                                          "id" => $products->id,
                                          "fileName" => $a->name ?? "default.jpg"
                                          ])}}" alt="{{$products->name}}" class="image1" />
                           </a>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="bota_share">
                  <!-- Load Facebook SDK for JavaScript -->
                  <div id="fb-root"></div>
                  <!-- Your like button code -->
                  <div class="fb-like" data-href="product_view.html" data-layout="button_count" data-action="like" data-show-faces="true">
                  </div>
                  <!-- Your share button code -->
                  <div class="fb-share-button" data-href="product_view.html" data-layout="button_count">
                  </div>
                  <div class="g-plus" data-action="share" data-annotation="bubble" data-href="{{ url()->current() }}"></div>
               </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-lg-4 bota_product_detail_center">
               <form action="{{ route('cart.addToCart', $products->id ) }}" method="POST">
                  @csrf
                  <div class="bota_product_detail_info">
                     <div class="bota_product_detail_name">
                        <h1>{{$products->name}}</h1>
                     </div>

                     <div class="bota_product_detail_price">
                        @if(!empty($products->compare_price) && !empty($products->price))
                        @php
                        $discount = (1 - ($products->price / $products->compare_price)) * 100;
                        @endphp
                        <h3 class="price_old">{{ number_format($products->compare_price, 0, '', '.') }} ₫</h3>
                        <h3 class="price_current">
                           {{ number_format($products->price, 0, '', '.') }} ₫
                           <div class="discount"> <span> - {{ round($discount) }}%</span> </div>
                        </h3>
                        @elseif(!empty($products->price))
                        <h3 class="price_current">
                           {{ number_format($products->price, 0, '', '.') }} ₫
                        </h3>
                        @else
                        <span style="color: red">Liên hệ với chúng tôi!</span>
                        @endif
                     </div>
                     <div class="bota_product_detail_status">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path d="m256 512c-68.378906 0-132.667969-26.628906-181.019531-74.980469-48.351563-48.351562-74.980469-112.640625-74.980469-181.019531s26.628906-132.667969 74.980469-181.019531c48.351562-48.351563 112.640625-74.980469 181.019531-74.980469s132.667969 26.628906 181.019531 74.980469c48.351563 48.351562 74.980469 112.640625 74.980469 181.019531s-26.628906 132.667969-74.980469 181.019531c-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469zm0-472c-119.101562 0-216 96.898438-216 216s96.898438 216 216 216 216-96.898438 216-216-96.898438-216-216-216zm138.285156 182-28.285156-28.285156-110 110-110-110-28.285156 28.285156 138.285156 138.285156zm0 0"></path>
                        </svg>
                        Trạng thái: {{ $stt = \App\Models\Product::$type[$products->type] ?? ''}}

                     </div>
                     {{-- size --}}
                     @php
                     $size_check = $products->size;
                     $size = explode("_", $size_check);
                     @endphp
                     @if ($size_check === null)
                     @else
                     <div class="bota_product_detail_status">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                           <path d="m256 512c-68.378906 0-132.667969-26.628906-181.019531-74.980469-48.351563-48.351562-74.980469-112.640625-74.980469-181.019531s26.628906-132.667969 74.980469-181.019531c48.351562-48.351563 112.640625-74.980469 181.019531-74.980469s132.667969 26.628906 181.019531 74.980469c48.351563 48.351562 74.980469 112.640625 74.980469 181.019531s-26.628906 132.667969-74.980469 181.019531c-48.351562 48.351563-112.640625 74.980469-181.019531 74.980469zm0-472c-119.101562 0-216 96.898438-216 216s96.898438 216 216 216 216-96.898438 216-216-96.898438-216-216-216zm138.285156 182-28.285156-28.285156-110 110-110-110-28.285156 28.285156 138.285156 138.285156zm0 0"></path>
                        </svg>
                        Chọn size :
                        <br>
                        @foreach($size as $size)
                        <input type="radio" id="age1" name="size" value="{{$size}}">
                        <label for="age1">{{$size}} mm</label><br>
                        @endforeach
                     </div>
                     @endif
                     <div class="bota_product_detail_promotion">
                        <div class="bota_product_detail_title_gift">
                           Khuyến mãi
                        </div>
                        @if(isset($promotion->description))
                        {!!$promotion->description!!}
                        @else
                        <p>
                           Trả góp 0%: Mua đồng hồ chỉ với 333.000đ. <a href="/" target="_blank">Xem chi tiết</a>
                        </p>
                        <p>
                           Tặng gói Bảo hiểm Diamond trị giá 7.000.000đ.&nbsp;&nbsp;<a href="/" rel="nofollow" target="_blank">Xem chi tiết</a>
                        </p>
                        @endif
                     </div>
                     @if ( $stt === "Hết Hàng" || empty($products->price))
                     @else
                     <div class="btn-buy buy-now clearfix">
                        <button type="submit" id="add-cart" class="bt-buy">Mua ngay</button>

                        <button id="add_to_cart" data-url="{{ route('addToCart', ['id' => $products->id])}}" class="bt-buy-sp">Thêm vào giỏ</button>

                        {{-- <a href="#" data-url = "{{ route('addToCart', ['id' => $products->id])}}"
                        class="bt-buy-sp " id="add_to_cart" title="">Thêm vào giỏ</a> --}}
                     </div>
                     @endif
               </form>
               @include('flash::message')
               <div class="bota_product_detail_order_fast">
                  <form name="form_regis_phone" id="phone" method="POST" action="{{route('consulation')}}" onsubmit="return validateForm()">
                     @csrf
                     @method('POST')
                     <div class="text-regis-phone">
                        <svg xmlns="http://www.w3.org/2000/svg" height="512pt" viewBox="0 0 512 512" width="512pt">
                           <path d="m325.621094 250.042969c17.59375-17.59375 17.597656-46.070313 0-63.664063-17.550782-17.550781-46.109375-17.550781-63.660156 0-17.59375 17.59375-17.597657 46.066406 0 63.664063 17.550781 17.550781 46.109374 17.550781 63.660156 0zm-42.441406-42.445313c5.851562-5.847656 15.371093-5.847656 21.222656 0 5.863281 5.867188 5.863281 15.355469 0 21.222656-5.855469 5.851563-15.371094 5.847657-21.222656 0-5.863282-5.863281-5.863282-15.355468 0-21.222656zm0 0" />
                           <path d="m50.859375 371.289062-50.859375 140.710938 140.710938-50.859375c13.765624-3.128906 26.320312-10.070313 36.367187-20.113281 11.628906-11.628906 18.953125-26.425782 21.203125-42.457032l8.714844 8.714844 14.0625-9.375 21.074218 105.386719 108.789063-108.789063 4.761719-92.558593c13.589844-11.660157 26.738281-23.824219 39.375-36.460938 55.066406-55.066406 89.273437-134.613281 89.273437-207.601562v-9.230469l27.433594-27.4375-21.21875-21.21875-27.433594 27.4375h-9.234375c-75.03125 0-153.460937 35.597656-207.367187 89.503906-12.636719 12.636719-24.800781 25.785156-36.460938 39.375l-92.558593 4.761719-108.785157 108.789063 105.382813 21.078124-9.375 14.058594 8.714844 8.71875c-16.03125 2.246094-30.828126 9.570313-42.457032 21.203125-10.042968 10.042969-16.980468 22.597657-20.113281 36.363281zm92.472656-70.109374 16.976563-25.464844 75.976562 75.976562-25.464844 16.976563zm178.210938 80.265624-60.976563 60.976563-12.503906-62.515625c32.25-21.792969 49.195312-31.917969 76.265625-52.578125zm132.777343-324v.441407c0 21.640625-3.402343 43.949219-9.738281 65.914062l-56.546875-56.546875c21.964844-6.378906 44.25-9.808594 65.84375-9.808594zm-186.585937 80.71875c25.324219-25.324218 56.226563-45.757812 89.035156-59.734374l76.695313 76.695312c-13.941406 32.90625-34.335938 63.851562-59.628906 89.144531-55.980469 55.980469-106.046876 86.023438-112.085938 90.445313l-84.464844-84.460938c4.371094-5.972656 34.707032-56.347656 90.449219-112.089844zm-198.15625 113.273438 60.980469-60.980469 54.113281-2.78125c-20.6875 27.101563-30.785156 44.015625-52.578125 76.261719zm10.40625 127.144531c1.800781-8.492187 6.023437-16.25 12.210937-22.4375 17.558594-17.558593 46.097657-17.558593 63.660157 0 17.5625 17.5625 17.5625 46.101563 0 63.664063-6.1875 6.1875-13.945313 10.40625-22.4375 12.207031l-1.011719.21875-82.429688 29.792969 29.792969-82.429688zm0 0" />
                        </svg>
                        Tư vấn miễn phí
                     </div>
                     {{-- code here --}}
                     <div class="wrapper-infor">
                        <input type="hidden" name="product_id" value="{{$products->id}}">
                        <input type="text" name="phone" id="phoneCheck" placeholder="Để lại số điện thoại..." class="keyword" />
                        <input type="submit" name="submit-res" value="Gửi" class="bt-phone2 button-sub button" />
                     </div>
                  </form>
               </div>
               <div class="bota_products_detail_orders">
                  <svg x="0px" y="0px" viewBox="0 0 438.533 438.533" style="enable-background:new 0 0 438.533 438.533;" xml:space="preserve">
                     <g>
                        <path d="M409.133,109.203c-19.608-33.592-46.205-60.189-79.798-79.796C295.736,9.801,259.058,0,219.273,0   c-39.781,0-76.47,9.801-110.063,29.407c-33.595,19.604-60.192,46.201-79.8,79.796C9.801,142.8,0,179.489,0,219.267   c0,39.78,9.804,76.463,29.407,110.062c19.607,33.592,46.204,60.189,79.799,79.798c33.597,19.605,70.283,29.407,110.063,29.407   s76.47-9.802,110.065-29.407c33.593-19.602,60.189-46.206,79.795-79.798c19.603-33.596,29.403-70.284,29.403-110.062   C438.533,179.485,428.732,142.795,409.133,109.203z M334.332,232.111L204.71,361.736c-3.617,3.613-7.896,5.428-12.847,5.428   c-4.952,0-9.235-1.814-12.85-5.428l-29.121-29.13c-3.617-3.613-5.426-7.898-5.426-12.847c0-4.941,1.809-9.232,5.426-12.847   l87.653-87.646l-87.657-87.65c-3.617-3.612-5.426-7.898-5.426-12.845c0-4.949,1.809-9.231,5.426-12.847l29.121-29.13   c3.619-3.615,7.898-5.424,12.85-5.424c4.95,0,9.233,1.809,12.85,5.424l129.622,129.621c3.613,3.614,5.42,7.898,5.42,12.847   C339.752,224.213,337.945,228.498,334.332,232.111z" />
                     </g>
                  </svg>
                  @php
                  $records = \App\Models\Orders::latest()->take(10)->get();
                  $current_time = date('Y-m-d H:i:s');
                  // dd($records->toArray() ,$current_time);
                  @endphp

                  <ul id="products_orders" class="slick-slider">
                     @foreach($records as $record)
                     <li class="item item-30163">
                        <div class="name">Khách hàng : {{$record->affiliate_user}}
                           ( {{substr($record->phone_number, 0, strlen($record->phone_number) - 3). "xxx"}} )
                        </div>
                        @php
                        $interval = $record->created_at->diff($current_time)->format('%H giờ %i phút');
                        @endphp
                        Đã mua {{ $interval }} trước
                     </li>
                     @endforeach
                  </ul>

               </div>
            </div>
         </div>
         {{-- @endforeach --}}
         <div class="col-xl-4 col-sm-12 col-lg-4 bota_product_detail_right">
            <div class="bota_block_custom">
                     @foreach($policy as $key => $poli)
                     @php
                     $title = $poli->title;
                     $titleArray = explode(' ', $title);
                     $delString = array_shift($titleArray);
                     $delString2 = array_shift($titleArray);
                     $delString3 = array_shift($titleArray);
                     $delString4 = array_shift($titleArray);
                     $delString5 = array_shift($titleArray);
                     $delString6 = array_shift($titleArray);
                     @endphp
                     @if($poli->show_on_homepage == 0)
                        @if($key < 1)
                              <div class="bota_block_custom_title">
                                 <div class="bota_block_custom_left">
                                    <img src="{{ asset('uploads/policy/' . $poli->image) }}" width="36px" alt="">
                                 </div>
                                 <div class="bota_block_custom_right">
                                    <div class="title">{{ $delString }} {{ $delString2 }} {{ $delString3 }} {{ $delString4 }} {{ $delString5 }} {{ $delString6 }}</div>
                                    <div class="summary">
                                       @foreach($titleArray as $vTitle)
                                          {{ $vTitle }}
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                           @endif
                     @endif
                     @endforeach
                     <div class="bota_block_custom_column">
                     @foreach($policy as $key => $poli)
                     @if($poli->show_on_homepage == 0)
                        @if($key > 0)
                              <div class="item">
                                 <a href="#" alt="{!! $poli->title !!}">
                                    <img src="{{ asset('uploads/policy/' . $poli->image) }}" width="50px" alt="">
                                 </a>
                                 <div class="content-right">
                                    <a class="title" href="{{$poli->url}}" alt="{!! $poli->title !!}">{{ $poli->title }}</a>
                                 </div>
                              </div>
                        @endif
                        @endif
                     @endforeach
                     
                     <div class="bottom-block">
                        <div class="hotline">
                           <a href="tel:1900 0325" alt="hotline">
                              <svg x="0px" y="0px" viewBox="0 0 473.806 473.806" style="enable-background:new 0 0 473.806 473.806;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4    c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8    c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6    c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5    c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26    c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9    c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806    C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20    c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6    c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1    c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3    c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5    c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8    c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9    l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1    C420.456,377.706,420.456,388.206,410.256,398.806z"></path>
                                       <path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2    c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11    S248.656,111.506,256.056,112.706z"></path>
                                       <path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11    c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2    c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"></path>
                                    </g>
                                 </g>
                              </svg> {{ $phone ? $phone->phone : '081.30.55555'}} </a>
                        </div>

                        <div class="mail">
                           <svg x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                              <g>
                                 <g>
                                    <path d="M467,61H45C20.218,61,0,81.196,0,106v300c0,24.72,20.128,45,45,45h422c24.72,0,45-20.128,45-45V106    C512,81.28,491.872,61,467,61z M460.786,91L256.954,294.833L51.359,91H460.786z M30,399.788V112.069l144.479,143.24L30,399.788z     M51.213,421l144.57-144.57l50.657,50.222c5.864,5.814,15.327,5.795,21.167-0.046L317,277.213L460.787,421H51.213z M482,399.787    L338.213,256L482,112.212V399.787z"></path>
                                 </g>
                              </g>
                           </svg>
                           {{ $email ? $email->phone : ''}}
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="bota_product_detail_bottom clearfix">
   <div class="container">
      <div class="row flex-row-reverse">
         <div class="col-xl-4 col-lg-4 col-sm-12 bota_product_detail_right">
            <div class="bota_product_detail_info_right">
               <div class="bota_title_detail_char">
                  <svg viewBox="0 0 44.688 44.688" style="enable-background:new 0 0 44.688 44.688;" xml:space="preserve">
                     <g>
                        <g>
                           <path d="M25.013,39.119c-0.336,0.475-0.828,0.82-1.389,0.975l-2.79,0.762c-0.219,0.062-0.445,0.094-0.673,0.094    c-0.514,0-1.011-0.157-1.43-0.452c-0.615-0.428-1.001-1.103-1.062-1.834l-0.245-2.881c-0.058-0.591,0.101-1.183,0.437-1.659    l0.103-0.148H8.012c-0.803,0-1.454-0.662-1.454-1.463c0-0.804,0.651-1.466,1.454-1.466h12.046l2.692-3.845H8.012    c-0.803,0-1.454-0.662-1.454-1.465s0.651-1.465,1.454-1.465l16.811-0.043l6.304-9.039V8.497c0-1.1-0.851-1.988-1.948-1.988h-4.826    v3.819c0,1.803-1.474,3.229-3.274,3.229h-9.706c-1.804,0-3.227-1.427-3.227-3.229V6.509H3.268c-1.099,0-1.988,0.889-1.988,1.988    V42.65c0,1.1,0.89,2.037,1.988,2.037h25.909c1.1,0,1.949-0.938,1.949-2.037V30.438L25.013,39.119z M8.012,17.496h16.424    c0.801,0,1.453,0.661,1.453,1.464c0,0.803-0.652,1.465-1.453,1.465H8.012c-0.803,0-1.454-0.662-1.454-1.465    C6.558,18.157,7.209,17.496,8.012,17.496z"></path>
                           <path d="M11.4,11.636h9.697c0.734,0,1.331-0.596,1.331-1.332V4.727c0-0.736-0.597-1.332-1.331-1.332h-1.461    C19.626,1.52,18.102,0,16.223,0c-1.88,0-3.402,1.519-3.413,3.395H11.4c-0.736,0-1.331,0.596-1.331,1.332v5.576    C10.069,11.039,10.664,11.636,11.4,11.636z M16.224,1.891c0.835,0,1.512,0.672,1.521,1.505H14.7    C14.71,2.563,15.388,1.891,16.224,1.891z"></path>
                           <path d="M43.394,8.978c-0.045-0.248-0.186-0.465-0.392-0.609l-2.428-1.692c-0.164-0.115-0.353-0.17-0.539-0.17    c-0.296,0-0.591,0.14-0.772,0.403L22.064,31.573l3.973,2.771L43.238,9.682C43.38,9.477,43.437,9.224,43.394,8.978z"></path>
                           <path d="M19.355,35.6l0.249,2.896c0.012,0.167,0.101,0.316,0.236,0.412c0.096,0.066,0.209,0.104,0.321,0.104    c0.049,0,0.099-0.007,0.147-0.021l2.805-0.768c0.127-0.035,0.237-0.113,0.313-0.22l1.053-1.51l-3.976-2.772l-1.053,1.51    C19.376,35.338,19.341,35.469,19.355,35.6z"></path>
                        </g>
                     </g>
                  </svg>
                  Thông tin sản phẩm
               </div>
               <div class="table-condensed compare_table">
                  <table class="table" cellpadding="0" width="100%">
                     <tbody>
                        @foreach ($productAttributeValues as $productAttributeValue)
                        <tr class="tr-0" valign="top">
                           <td class="title_charactestic" width="40%">
                              {{ $productAttributeValue['attribute_value']['value'] ?? ''}}
                           </td>
                           <td class="content_charactestic">
                              {{ $productAttributeValue['content'] ?? '' }}
                           </td>
                        </tr>
                        @endforeach

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-xl-8 col-lg-8 col-sm-12 bota_product_detail_center_left">
            <div class="bota_product_detail_tab">
               <ul class="nav nav-tabs" id="my_product_deatil_Tab" role="tablist">

                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#prodetails_tab1" type="button" role="tab">
                        Mô tả chi tiết
                     </button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#prodetails_tab2" type="button" role="tab">
                        Chế độ bảo hành
                     </button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" data-bs-toggle="tab" data-bs-target="#prodetails_tab3" type="button" role="tab">
                        Hướng dẫn sử dụng
                     </button>
                  </li>
               </ul>
               <div class="tab-content" id="my_product_deatil_TabContent">
                  <div class="tab-pane fade show active" id="prodetails_tab1" role="tabpanel">
                     <div class="bota_product_detail_tab_content">
                        <div class="bota_product_tab_content">
                           <div class="bota_product_tab_desc">
                              <div>
                                 {!! $products->description !!}
                              </div>
                           </div>
                           <div class="bota_readmore" id="bota_readmore_desc"><span class="closed">Xem thêm</span></div>
                        </div>
                     </div>
                  </div>
                  @if($warranty == null)
                  <div class="tab-pane fade" id="prodetails_tab2" role="tabpanel">
                  </div>
                  @else
                  <div class="tab-pane fade" id="prodetails_tab2" role="tabpanel">
                     <blockquote>
                        <div class="tab_content">
                           <div class="bota_guarantee_tab clearfix 123">
                              <div class="img">
                                 <img src="{{ asset('uploads/warranty/'. $warranty->image)}}" alt="Tặng kèm gói bảo hành">
                              </div>
                              @php
                              $title = $warranty->title;
                              $titleArray = explode(' ', $title);
                              $delString = array_shift($titleArray);
                              $delString2 = array_shift($titleArray);
                              $delString3 = array_shift($titleArray);
                              $delString4 = array_shift($titleArray);
                              $delString5 = array_shift($titleArray);
                              $delString6 = array_shift($titleArray);
                              $delString7 = array_shift($titleArray);
                              $delString8 = array_shift($titleArray);
                              @endphp
                              <div class="text-r">
                                 <div class="txt1">{{ $delString }} {{ $delString2 }} {{ $delString3 }} {{ $delString4 }} {{ $delString5 }}</div>
                                 <div class="txt2">{{ $delString6 }} {{ $delString7 }} {{ $delString8 }}</div>
                                 <div class="txt3"> @foreach($titleArray as $vTitle)
                                    {{ $vTitle }}
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <div class="bota_config_guarantee">
                              {!! $warranty->description!!}
                           </div>
                        </div>
                     </blockquote>
                  </div>
                  @endif
                  <div class="tab-pane fade" id="prodetails_tab3" role="tabpanel">
                     <div class="bota_product_user_manual">
                        <ul class="nav nav-tabs" id="my_user_manual_Tab" role="tablist">
                           @if($productManual)
                           @foreach($productManual as $key => $manual)
                           <li class="nav-item" role="presentation">
                              <button class="nav-link{{ $key === 0 ? ' active' : '' }}" data-bs-toggle="tab" data-bs-target="#tab_{{ $key + 1 }}" type="button" role="tab">
                                 {{ $manual->title }}
                              </button>
                           </li>
                           @endforeach
                           @endif
                        </ul>
                        <div class="tab-content" id="my_user_manual_TabContent">
                           @if($productManual)
                           @foreach($productManual as $key => $manual)
                           <div class="tab-pane fade{{ $key === 0 ? ' show active' : '' }}" id="tab_{{ $key + 1 }}" role="tabpanel">
                              <div class="bota_user_manual_description">
                                 {!! $manual->content !!}
                              </div>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>

                  {{-- <div>
                           {{!! $products->description !!}}
               </div> --}}


            </div>
            <div class="bota_product_details_button clearfix">
               <figure>

                  @if ($products->images->first() === null)
                  <img src="" alt="{{ $request->getHost() }}">
                  @else
                  <img width="94px" height="120" alt="{{ $request->getHost() }}" src="{{route("productImageShow", [
                               "id" => $products->id,
                               "fileName" => $products->images->last()->name ?? "default.jpg"
                               ])}}">
                  @endif

               </figure>
               <div class="bota_product_details_button_info">
                  <h3>{{$products->name}}</h3>
                  @if(!empty($products->compare_price))
                  <h3 class="price_old">{{number_format($products->compare_price, 0, '', '.') }} ₫</h3>
                  @endif
                  @if(!empty($products->price))
                  <h3 class="price_current">
                     {{number_format( $products->price, 0, '', '.')}} ₫
                  </h3>
                  @else
                  <span style="color: red">Liên hệ với chúng tôi!</span>
                  @endif
               </div>
               @include('flash::message')
               <div class="bota_product_details_button_wrap">
                  <div class="bota_product_detail_order_fast">
                     <form name="form_regis_phone" id="phone" method="POST" action="{{route('consulation')}}" onsubmit="return validateForm2()">
                        @csrf
                        @method('POST')
                        <div class="text-regis-phone">
                           <svg xmlns="http://www.w3.org/2000/svg" height="512pt" viewBox="0 0 512 512" width="512pt">
                              <path d="m325.621094 250.042969c17.59375-17.59375 17.597656-46.070313 0-63.664063-17.550782-17.550781-46.109375-17.550781-63.660156 0-17.59375 17.59375-17.597657 46.066406 0 63.664063 17.550781 17.550781 46.109374 17.550781 63.660156 0zm-42.441406-42.445313c5.851562-5.847656 15.371093-5.847656 21.222656 0 5.863281 5.867188 5.863281 15.355469 0 21.222656-5.855469 5.851563-15.371094 5.847657-21.222656 0-5.863282-5.863281-5.863282-15.355468 0-21.222656zm0 0" />
                              <path d="m50.859375 371.289062-50.859375 140.710938 140.710938-50.859375c13.765624-3.128906 26.320312-10.070313 36.367187-20.113281 11.628906-11.628906 18.953125-26.425782 21.203125-42.457032l8.714844 8.714844 14.0625-9.375 21.074218 105.386719 108.789063-108.789063 4.761719-92.558593c13.589844-11.660157 26.738281-23.824219 39.375-36.460938 55.066406-55.066406 89.273437-134.613281 89.273437-207.601562v-9.230469l27.433594-27.4375-21.21875-21.21875-27.433594 27.4375h-9.234375c-75.03125 0-153.460937 35.597656-207.367187 89.503906-12.636719 12.636719-24.800781 25.785156-36.460938 39.375l-92.558593 4.761719-108.785157 108.789063 105.382813 21.078124-9.375 14.058594 8.714844 8.71875c-16.03125 2.246094-30.828126 9.570313-42.457032 21.203125-10.042968 10.042969-16.980468 22.597657-20.113281 36.363281zm92.472656-70.109374 16.976563-25.464844 75.976562 75.976562-25.464844 16.976563zm178.210938 80.265624-60.976563 60.976563-12.503906-62.515625c32.25-21.792969 49.195312-31.917969 76.265625-52.578125zm132.777343-324v.441407c0 21.640625-3.402343 43.949219-9.738281 65.914062l-56.546875-56.546875c21.964844-6.378906 44.25-9.808594 65.84375-9.808594zm-186.585937 80.71875c25.324219-25.324218 56.226563-45.757812 89.035156-59.734374l76.695313 76.695312c-13.941406 32.90625-34.335938 63.851562-59.628906 89.144531-55.980469 55.980469-106.046876 86.023438-112.085938 90.445313l-84.464844-84.460938c4.371094-5.972656 34.707032-56.347656 90.449219-112.089844zm-198.15625 113.273438 60.980469-60.980469 54.113281-2.78125c-20.6875 27.101563-30.785156 44.015625-52.578125 76.261719zm10.40625 127.144531c1.800781-8.492187 6.023437-16.25 12.210937-22.4375 17.558594-17.558593 46.097657-17.558593 63.660157 0 17.5625 17.5625 17.5625 46.101563 0 63.664063-6.1875 6.1875-13.945313 10.40625-22.4375 12.207031l-1.011719.21875-82.429688 29.792969 29.792969-82.429688zm0 0" />
                           </svg>
                           Tư vấn miễn phí
                        </div>
                        {{-- code here --}}
                        <div class="wrapper-infor">
                           <input type="hidden" name="product_id" value="{{$products->id}}">
                           <input type="text" name="phone" id="phoneCheck2" placeholder="Để lại số điện thoại..." class="keyword" />
                           <input type="submit" name="submit-res" value="Gửi" class="bt-phone2 button-sub button" />
                        </div>
                     </form>
                  </div>
               </div>
               <div class="clear"></div>
            </div>


         </div>

      </div>
   </div>
</div>




<div class="bota_products_related">
   <div class="container">
      <div class="bota_block_title"><span>Sản phẩm liên quan</span></div>
      <div class="bota_products_related_cont">
         <div class="owl-related-item owl-carousel owl-theme">
            @foreach($productSuggess as $product)
            <div class="item">
               <div class="bota_pr_related_item">
                  <div class="bota_pr_related_img">
                     <a href="{{ route('web.product.show', $product->slug) }}" title="{{ $product->name }}">
                        @if ($product->images->first() === null)
                        <img src="" alt="{{ $request->getHost() }}">
                        @else
                        <img width="285" height="345" alt="{{ $request->getHost() }}" src="{{ route('productImageShow', [
                                                   'id' => $product->id,
                                                   'fileName' => $product->images->last()->name ?? 'default.jpg',
                                               ]) }}">
                        @endif
                     </a>
                  </div>
                  <div class="bota_pr_related_cont">
                     <div class="bota_pr_related_code">
                        <a href="{{ route('web.product.show', $product->slug) }}" title="{{ $product->name }}">
                           {{ $product->sku }}
                        </a>
                     </div>
                     <div class="bota_pr_related_name">
                        <a href="{{ route('web.product.show', $product->slug) }}" title="{{ $product->name }}">
                           {{ $product->name }}
                        </a>
                     </div>
                     <div class="bota_pr_related_price">
                        <div class="discount">
                           @if (!empty($product->compare_price) && !empty($product->price) && $product->price < $product->compare_price)
                              @php
                              $discountPercentage = round((1 - ($product->price / $product->compare_price)) * 100);
                              @endphp
                              <span>- {{ $discountPercentage }}%</span>
                              @endif
                        </div>
                        @if(!empty($product->compare_price))
                        <div class="price_old">{{ number_format($product->compare_price, 0 , '.', '.') }}₫</div>
                        @endif
                        @if(!empty($product->price))
                        <div class="price_discount">{{ number_format($product->price, 0 , '.', '.') }}₫</div>
                        @else
                        <span style="color: red">Liên hệ với chúng tôi!</span>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            @endforeach



         </div>
      </div>
   </div>
</div>



<div class="bota_block_products_viewed">
   <div class="container">
      <div class="bota_block_title"><span>SẢN PHẨM ĐÃ XEM</span></div>
      @foreach ($viewed as $id)
      @php
      $product = \App\Models\Product::find($id);
      @endphp
      <div class="row" style="flex-wrap: nowrap">
         <div class="col-xl-3 col-lg-4 col-sm-4 col-6">
            <div class="bota_pr_item">
               <div class="bota_pr_image ">
                  <a href="{{ route('web.product.show', $product->slug) }}" title="">
                     @if ($product->images->first() === null)
                     <img src="" alt="{{ $request->getHost() }}">
                     @else
                     <img width="320px" height="365" alt="{{ $request->getHost() }}" src="{{ route('productImageShow', [
                                                     'id' => $product->id,
                                                     'fileName' => $product->images->last()->name ?? 'default.jpg',
                                                 ]) }}">
                     @endif
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

               @if (!empty($product->compare_price) && !empty($product->price) && $product->price < $product->compare_price)
                  <div class="discount">
                     @php
                     $discountPercentage = round((1 - ($product->price / $product->compare_price)) * 100);
                     @endphp
                     <span>- {{ $discountPercentage }}%</span>
                  </div>
                  @endif

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

   </div>
</div>
{{-- <div class="bota_comments_website">
               <div class="tab-title clearfix">
                  <div class="cat-title-main" id="tab-title-label">
                     <div class="title_icon"><i class="icon_v1"></i></div>
                     <span>Bình luận</span>
                  </div>
               </div>
            
               <div class="bota_comments">
                  <div id="fb-root"></div>
                  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="eZz53S52"></script>
                  <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
</div>
</div> --}}
<div class="bota_block_policy">
   <div class="container">
      <div class="bota_block_policy_content">
         @foreach($policies as $key => $policy)
         <div class="item">
            <a href="{{ $policy->url }}" alt="{{ $policy->title }}">
               <img src="{{ asset('uploads/policy/' . $policy->image) }}" alt="{{ $policy->title }}" />
            </a>
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
{{-- </div> --}}
</div>
</div>
<script src="{!! asset('statics/scripts/magiczoomplus.js') !!}" type="text/javascript"></script>
<script src="{!! asset('statics/scripts/lazyload.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('statics/scripts/product.js') !!}" type="text/javascript"></script>
<script src="{!! asset('statics/scripts/comment.js') !!}" type="text/javascript"></script>
@stop
@section('script')


<script>
   function validateForm() {
      const phoneNumber = document.getElementById("phoneCheck").value;
      const regex = /^(\+84|0)[0-9]{9}$/;
      if (!regex.test(phoneNumber)) {
         alert("Vui lòng điền đúng số điện thoại !");
         return false;
      }

      return true;
   }

   function validateForm2() {
      const phoneNumber = document.getElementById("phoneCheck2").value;
      const regex2 = /^(\+84|0)[0-9]{9}$/;
      if (!regex2.test(phoneNumber)) {
         alert("Vui lòng điền đúng số điện thoại !");
         return false;
      }

      return true;
   }

   // ajax cart
   function addToCart(event) {
      event.preventDefault();
      let urlCart = $(this).data('url');
      $.ajax({
         type: "GET",
         url: urlCart,
         success: function(data) {
            console.log(data);
            if (data.code === 200) {
               alert('Thêm sản phẩm vào giỏ hàng thành công');
               var spanText = $("#quantity-cart").text();
               console.log(spanText);
               $("#quantity-cart").text(parseInt(spanText) + 1);
            }
         },
         error: function() {

         }
      })
   }
   $(function() {
      $('#add_to_cart').on('click', addToCart);
   })
</script>

@stop