@extends('web.layouts.master')
@section('title')
{{$seoContent->meta_title ?? 'Thương hiệu đồng hồ'}}
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
    <meta name="description" content="{{$seoContent->meta_title ?? 'Thương hiệu đồng hồ'}}">
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
<div class="bota_body_center">
    <div class="bota_breadcrumb_main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                <li><a href="{{ route('brand') }}">Thương hiệu đồng hồ</a></li>
            </ul>
        </div>
    </div>
    <div class="bota_brand_page">
        <div class="container">
            <h1 class="bota_title_page">Thương hiệu</h1>
            <div class="bota_brand_list_char">
                <ul>
                    @foreach(range('A', 'Z') as $c)
                        <li><a href="{{ route('brand.showByChar', ['char' => $c]) }}" title="{{ $c }}">{{ $c }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="bota_brand_content">
                @if($brands->isEmpty())
                    <p>Không có thương hiệu phù hợp.</p>
                @else
                    @php
                        $groupedBrands = [];
                    @endphp
                    @foreach ($brands as $brand)
                        @php
                            $firstCharAfterDongHo = mb_substr(preg_replace('/[^a-zA-Z]/u', '', $brand->name), 3, 1); // Lấy ký tự đầu tiên sau từ "Đồng hồ"
                            $groupedBrands[$firstCharAfterDongHo][] = $brand;
                        @endphp
                    @endforeach

                    @foreach ($groupedBrands as $char => $charBrands)
                        <div class="item row">
                            <div id="Letter{{ $char }}" class="letterheader col-lg-3 col-md-3">{{ $char }}</div>
                            <div class="col-lg-9 col-md-9">
                                @foreach ($charBrands as $brand)
                                    <h2 class="letter_item">
                                        <a title="{{ $brand->name }}" href="/filter/{{$brand->slug}}">
                                            @if(isset($brand->image) && !empty($brand->image))
                                                <img src="{!! asset('uploads/brands/'. $brand->image) !!}" alt="{{ $brand->name }}">
                                            @endif
                                        </a>
                                    </h2>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
