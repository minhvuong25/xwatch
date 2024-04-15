@php
    $hotline = App\Helper\FuncLib::getContact();
    if (isset($hotline[5]->phone)) {
        $url = $hotline[5]->phone;
        $parts = parse_url($url);
        $channelId = substr($parts['path'], 9);
    }
    $googleAnalyticsCode = \App\Models\Setting::where('key', 'google_analytics_code')->first()->value ?? '';
@endphp
@extends('web.layouts.master')
@section('title')
    {{ 'Đồng Hồ Thịnh Vượng' }}
@stop
@section('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="robots" content="index,follow" />
    <link rel="shortcut icon" href="/image/favicon/favicon.png" />
    <link rel="icon" href="/image/favicon/favicon.png" type="image/x-icon" />
    <meta name="theme-color" content="#aa722b" />
    <meta name="description" content="{{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta name="keywords" content="{{ $seoContent->meta_keyword ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="name" content="{{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="description" content="{{ $seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="og:title" content="{{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}">
    <meta property="og:description" content="{{ $seoContent->meta_des ?? 'Đồng Hồ Thịnh Vượng' }}">

@stop
<!-- Google Analytics -->
@if(!empty($googleAnalyticsCode))
    {!! $googleAnalyticsCode !!}
@endif
@section('content')
    <div class="bota_body_main">
        <div class="bota_body_center">
            <div class="bota_breadcrumb_main">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                        <li><a href="#" title="Liên hệ">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjnFSxHQNIIdW6pvw9yHP12IWWt_kIZWE&libraries=geometry,places&callback=initialize&sensor=false"
                type="text/javascript"></script>
            <script>
                function initialize(address, latitude, longitude, info, zoom) {
                    var map;
                    var bounds = new google.maps.LatLngBounds();
                    var mapOptions = {
                        mapTypeId: 'roadmap'
                    };
                    var image = '/images/arrow-up1.png';
                    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
                    map.setTilt(45);
                    var markers2 = {
                        35: '<div class="info_content"><div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Hỗ trợ mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div><div class="map-bottom"></div></div>',
                        24: '<div class="info_content"><div class="map-top"><h4>Xwatch Lý Thái Tổ</h4><p>Địa chỉ: 378 Lý Thái Tổ, P10, Q10 (Vòng xoay Ngã Bảy) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0903 248 222</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                        34: '<div class="info_content"><div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div><div class="map-bottom"></div></div>',
                        31: '<div class="info_content"><div class="map-top"><h4>Xwatch Xuân Thủy</h4><p>Địa chỉ: 163 Xuân Thủy, Q. Cầu Giấy (Đối diện ĐHSP) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0358 708 090</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                        27: '<div class="info_content"><div class="map-top"><h4>Xwatch Quang Trung</h4><p>Địa chỉ: 150 Quang Trung, Hà Đông (Open: 8h30 - 21h30)</p><p>Điện thoại: 0969 629 929</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                        21: '<div class="info_content"><div class="map-top"><h4>Xwatch Xã Đàn</h4><p>Địa chỉ: Số 2 Xã Đàn, Đống Đa, Hà Nội (Open: 8h30 - 21h30)</p><p>Điện thoại: 0961 688 182</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                        20: '<div class="info_content"><div class="map-top"><h4>Xwatch Đường Láng</h4><p>Địa chỉ: 472 Đường Láng, Đống Đa (Open: 8h30 - 21h30)</p><p>Điện thoại: 0939 868 388</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                    };

                    if (address != '' && latitude != '' && longitude != '') {
                        var markers = [
                            [address, latitude, longitude]
                        ];
                    } else {
                        var markers = [
                            ["Mua hàng Online", 21.028224, 105.835419],
                            ["Xwatch Lý Thái Tổ", 10.767834731153444, 106.67417972507292],
                            ["Mua hàng Online", 21.028224, 105.835419],
                            ["Xwatch Xuân Thủy", 21.03649600306682, 105.78371500145352],
                            ["Xwatch Quang Trung", 20.968944194942473, 105.77300666272868],
                            ["Xwatch Xã Đàn", 21.008119981147146, 105.84067035513226],
                            ["Xwatch Đường Láng", 21.016544778492374, 105.80388918479548],
                        ];
                    }
                    // Info Window Content
                    if (info == 0) {
                        // var infoWindowContent = [
                        //     ['<div class="info_content">' +
                        //         '<div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Hỗ trợ mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div>' +
                        //         '<div class="map-bottom"></div></div>'
                        //     ],

                        //     ['<div class="info_content">' +
                        //         '<div class="map-top"><h4>Xwatch Lý Thái Tổ</h4><p>Địa chỉ: 378 Lý Thái Tổ, P10, Q10 (Vòng xoay Ngã Bảy) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0903 248 222</p><p>Email: cskh.xwatch@gmail.com</p></div>' +
                        //         '<div class="map-bottom"></div></div>'
                        //     ],

                        //     ['<div class="info_content">' +
                        //         '<div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div>' +
                        //         '<div class="map-bottom"></div></div>'
                        //     ],

                        //     ['<div class="info_content">' +
                        //         '<div class="map-top"><h4>Xwatch Xuân Thủy</h4><p>Địa chỉ: 163 Xuân Thủy, Q. Cầu Giấy (Đối diện ĐHSP) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0358 708 090</p><p>Email: cskh.xwatch@gmail.com</p></div>' +
                        //         '<div class="map-bottom"></div></div>'
                        //     ],

                        //     ['<div class="info_content">' +
                        //         '<div class="map-top"><h4>Xwatch Quang Trung</h4><p>Địa chỉ: 150 Quang Trung, Hà Đông (Open: 8h30 - 21h30)</p><p>Điện thoại: 0969 629 929</p><p>Email: cskh.xwatch@gmail.com</p></div>' +
                        //         '<div class="map-bottom"></div></div>'
                        //     ],

                        //     ['<div class="info_content">' +
                        //         '<div class="map-top"><h4>Xwatch Xã Đàn</h4><p>Địa chỉ: Số 2 Xã Đàn, Đống Đa, Hà Nội (Open: 8h30 - 21h30)</p><p>Điện thoại: 0961 688 182</p><p>Email: cskh.xwatch@gmail.com</p></div>' +
                        //         '<div class="map-bottom"></div></div>'
                        //     ],

                        //     ['<div class="info_content">' +
                        //         '<div class="map-top"><h4>Xwatch Đường Láng</h4><p>Địa chỉ: 472 Đường Láng, Đống Đa (Open: 8h30 - 21h30)</p><p>Điện thoại: 0939 868 388</p><p>Email: cskh.xwatch@gmail.com</p></div>' +
                        //         '<div class="map-bottom"></div></div>'
                        //     ],
                        // ];
                    } else {
                        var infoWindowContent = [
                            [markers2[info]]
                        ];
                    }
                    // Display multiple markers on a map
                    var infoWindow = new google.maps.InfoWindow(),
                        marker, i;

                    // Loop through our array of markers & place each one on the map
                    for (i = 0; i < markers.length; i++) {
                        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                        bounds.extend(position);
                        marker = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: markers[i][0],
                            // icon: 'statics/imgs/point.png'
                        });

                        // Allow each marker to have an info window
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infoWindow.setContent(infoWindowContent[i][0]);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));

                        // Automatically center the map fitting all markers on the screen
                        map.fitBounds(bounds);
                    }

                    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                        if (zoom) {
                            this.setZoom(zoom);
                        } else {
                            this.setZoom(6);
                        }
                        google.maps.event.removeListener(boundsListener);
                    });

                }
                $(document).ready(function() {
                    initialize('', '', '', 0, 6);
                });

                $(window).on("load", function() {
                    $(".wrapper-list-agency").mCustomScrollbar({
                        theme: "minimal"
                    });
                });
            </script>
            <div class="bota_maps_page">
                <div class="container">
                    <div class="bota_title_pages">
                        <h1>Liên hệ</h1>
                    </div>
                    <div class="bota_maps_content">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-sm-4">
                                <h3 class="bota_title_add">Hệ thống Showroom <span></span></h3>
                                {{-- <div class="wrapper-select-add">
                                    <select name="province" id="province" onchange="changeCity22(this.value,'district');">
                                        <option value="">--Chọn tỉnh/thành phố--</option>
                                        <option value="1">
                                            Hà Nội
                                        </option>
                                        <option value="2">
                                            Hồ Chí Minh
                                        </option>
                                    </select>
                                </div> --}}
                                <div class="wrapper-list-agency">
                                    <ul class="list-item-agency">
                                        @foreach ($storeAddresses as $item)
                                            <li class="item-agency clearfix">
                                                <div class="wrapper-info-agency">
                                                    <h2 class="name-agency"
                                                        onclick="initialize('{{ $item->description }} ',{{ $item->lng }},{{ $item->lat }})">
                                                        <svg x="0px" y="0px" viewBox="0 0 54.757 54.757"
                                                            style="enable-background:new 0 0 54.757 54.757;"
                                                            xml:space="preserve">
                                                            <path
                                                                d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z" />
                                                            <g>
                                                        </svg>
                                                        {{ $item->address }}
                                                    </h2>
                                                    <p class="add-phone">{{ $item->phone }}</p>
                                                    <p class="add-email">{{ $item->email }}</p>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-sm-8">
                                <div id="map_canvas"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bota_hotline_contact clearfix">
                        <div class="hotline-bt">
                            <div>
                                <svg x="0px" y="0px" viewBox="0 0 473.806 473.806"
                                    style="enable-background:new 0 0 473.806 473.806;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4    c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8    c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6    c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5    c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26    c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9    c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806    C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20    c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6    c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1    c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3    c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5    c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8    c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9    l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1    C420.456,377.706,420.456,388.206,410.256,398.806z">
                                            </path>
                                            <path
                                                d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2    c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11    S248.656,111.506,256.056,112.706z">
                                            </path>
                                            <path
                                                d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11    c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2    c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                @if (isset($hotline[0]))
                                    {{ $hotline[0]->content }}
                                @else
                                    No data
                                @endif
                            </div>
                            <a href="tel:@if (isset($hotline[0])) {{ $hotline[0]->phone }} @endif"
                                title="Tư vấn bán hàng">
                                @if (isset($hotline[0]))
                                    {{ $hotline[0]->phone }}
                                @else
                                    No data
                                @endif
                            </a>
                        </div>
                        <div class="hotline-bt">
                            <div>
                                <svg x="0px" y="0px" width="356.484px" height="356.484px"
                                    viewBox="0 0 356.484 356.484" style="enable-background:new 0 0 356.484 356.484;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M293.984,7.23H62.5C28.037,7.23,0,35.268,0,69.731v142.78c0,34.463,28.037,62.5,62.5,62.5l147.443,0.001l70.581,70.58    c2.392,2.393,5.588,3.662,8.842,3.662c1.61,0,3.234-0.312,4.78-0.953c4.671-1.934,7.717-6.49,7.717-11.547v-62.237    c30.759-3.885,54.621-30.211,54.621-62.006V69.731C356.484,35.268,328.447,7.23,293.984,7.23z M331.484,212.512    c0,20.678-16.822,37.5-37.5,37.5h-4.621c-6.903,0-12.5,5.598-12.5,12.5v44.064l-52.903-52.903    c-2.344-2.345-5.522-3.661-8.839-3.661H62.5c-20.678,0-37.5-16.822-37.5-37.5V69.732c0-20.678,16.822-37.5,37.5-37.5h231.484    c20.678,0,37.5,16.822,37.5,37.5V212.512z">
                                            </path>
                                            <path
                                                d="M270.242,95.743h-184c-6.903,0-12.5,5.596-12.5,12.5c0,6.903,5.597,12.5,12.5,12.5h184c6.903,0,12.5-5.597,12.5-12.5    C282.742,101.339,277.146,95.743,270.242,95.743z">
                                            </path>
                                            <path
                                                d="M270.242,165.743h-184c-6.903,0-12.5,5.596-12.5,12.5s5.597,12.5,12.5,12.5h184c6.903,0,12.5-5.597,12.5-12.5    S277.146,165.743,270.242,165.743z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                @if (isset($hotline[1]))
                                    {{ $hotline[1]->content }}
                                @else
                                    No data
                                @endif
                            </div>
                            <a href="tel:
                        @if (isset($hotline[1])) {{ $hotline[1]->phone }} @endif
                        "
                                title="Hỗ trợ dịch vụ">
                                @if (isset($hotline[1]))
                                    {{ $hotline[1]->phone }}
                                @else
                                    No data
                                @endif
                            </a>
                        </div>
                        <div class="hotline-bt">
                            <div>
                                <svg x="0px" y="0px" viewBox="0 0 54 54"
                                    style="enable-background:new 0 0 54 54;" xml:space="preserve">
                                    <g>
                                        <path
                                            d="M51.22,21h-5.052c-0.812,0-1.481-0.447-1.792-1.197s-0.153-1.54,0.42-2.114l3.572-3.571   c0.525-0.525,0.814-1.224,0.814-1.966c0-0.743-0.289-1.441-0.814-1.967l-4.553-4.553c-1.05-1.05-2.881-1.052-3.933,0l-3.571,3.571   c-0.574,0.573-1.366,0.733-2.114,0.421C33.447,9.313,33,8.644,33,7.832V2.78C33,1.247,31.753,0,30.22,0H23.78   C22.247,0,21,1.247,21,2.78v5.052c0,0.812-0.447,1.481-1.197,1.792c-0.748,0.313-1.54,0.152-2.114-0.421l-3.571-3.571   c-1.052-1.052-2.883-1.05-3.933,0l-4.553,4.553c-0.525,0.525-0.814,1.224-0.814,1.967c0,0.742,0.289,1.44,0.814,1.966l3.572,3.571   c0.573,0.574,0.73,1.364,0.42,2.114S8.644,21,7.832,21H2.78C1.247,21,0,22.247,0,23.78v6.439C0,31.753,1.247,33,2.78,33h5.052   c0.812,0,1.481,0.447,1.792,1.197s0.153,1.54-0.42,2.114l-3.572,3.571c-0.525,0.525-0.814,1.224-0.814,1.966   c0,0.743,0.289,1.441,0.814,1.967l4.553,4.553c1.051,1.051,2.881,1.053,3.933,0l3.571-3.572c0.574-0.573,1.363-0.731,2.114-0.42   c0.75,0.311,1.197,0.98,1.197,1.792v5.052c0,1.533,1.247,2.78,2.78,2.78h6.439c1.533,0,2.78-1.247,2.78-2.78v-5.052   c0-0.812,0.447-1.481,1.197-1.792c0.751-0.312,1.54-0.153,2.114,0.42l3.571,3.572c1.052,1.052,2.883,1.05,3.933,0l4.553-4.553   c0.525-0.525,0.814-1.224,0.814-1.967c0-0.742-0.289-1.44-0.814-1.966l-3.572-3.571c-0.573-0.574-0.73-1.364-0.42-2.114   S45.356,33,46.168,33h5.052c1.533,0,2.78-1.247,2.78-2.78V23.78C54,22.247,52.753,21,51.22,21z M52,30.22   C52,30.65,51.65,31,51.22,31h-5.052c-1.624,0-3.019,0.932-3.64,2.432c-0.622,1.5-0.295,3.146,0.854,4.294l3.572,3.571   c0.305,0.305,0.305,0.8,0,1.104l-4.553,4.553c-0.304,0.304-0.799,0.306-1.104,0l-3.571-3.572c-1.149-1.149-2.794-1.474-4.294-0.854   c-1.5,0.621-2.432,2.016-2.432,3.64v5.052C31,51.65,30.65,52,30.22,52H23.78C23.35,52,23,51.65,23,51.22v-5.052   c0-1.624-0.932-3.019-2.432-3.64c-0.503-0.209-1.021-0.311-1.533-0.311c-1.014,0-1.997,0.4-2.761,1.164l-3.571,3.572   c-0.306,0.306-0.801,0.304-1.104,0l-4.553-4.553c-0.305-0.305-0.305-0.8,0-1.104l3.572-3.571c1.148-1.148,1.476-2.794,0.854-4.294   C10.851,31.932,9.456,31,7.832,31H2.78C2.35,31,2,30.65,2,30.22V23.78C2,23.35,2.35,23,2.78,23h5.052   c1.624,0,3.019-0.932,3.64-2.432c0.622-1.5,0.295-3.146-0.854-4.294l-3.572-3.571c-0.305-0.305-0.305-0.8,0-1.104l4.553-4.553   c0.304-0.305,0.799-0.305,1.104,0l3.571,3.571c1.147,1.147,2.792,1.476,4.294,0.854C22.068,10.851,23,9.456,23,7.832V2.78   C23,2.35,23.35,2,23.78,2h6.439C30.65,2,31,2.35,31,2.78v5.052c0,1.624,0.932,3.019,2.432,3.64   c1.502,0.622,3.146,0.294,4.294-0.854l3.571-3.571c0.306-0.305,0.801-0.305,1.104,0l4.553,4.553c0.305,0.305,0.305,0.8,0,1.104   l-3.572,3.571c-1.148,1.148-1.476,2.794-0.854,4.294c0.621,1.5,2.016,2.432,3.64,2.432h5.052C51.65,23,52,23.35,52,23.78V30.22z">
                                        </path>
                                        <path
                                            d="M27,18c-4.963,0-9,4.037-9,9s4.037,9,9,9s9-4.037,9-9S31.963,18,27,18z M27,34c-3.859,0-7-3.141-7-7s3.141-7,7-7   s7,3.141,7,7S30.859,34,27,34z">
                                        </path>
                                    </g>
                                </svg>
                                @if (isset($hotline[2]))
                                    {{ $hotline[2]->content }}
                                @else
                                    No data
                                @endif
                            </div>
                            <a href="tel:@if (isset($hotline[2])) {{ $hotline[2]->phone }} @endif"
                                title="Tư vấn kỹ thuật">
                                @if (isset($hotline[2]))
                                    {{ $hotline[2]->phone }}
                                @else
                                    No data
                                @endif
                            </a>
                        </div>
                        <div class="hotline-bt">
                            <div>
                                <svg x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M467,61H45C20.218,61,0,81.196,0,106v300c0,24.72,20.128,45,45,45h422c24.72,0,45-20.128,45-45V106    C512,81.28,491.872,61,467,61z M460.786,91L256.954,294.833L51.359,91H460.786z M30,399.788V112.069l144.479,143.24L30,399.788z     M51.213,421l144.57-144.57l50.657,50.222c5.864,5.814,15.327,5.795,21.167-0.046L317,277.213L460.787,421H51.213z M482,399.787    L338.213,256L482,112.212V399.787z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                @if (isset($hotline[3]))
                                    {{ $hotline[3]->content }}
                                @else
                                    No data
                                @endif
                            </div>
                            <a href="mailto:@if (isset($hotline[3])) {{ $hotline[3]->phone }} @endif"
                                title="Tư vấn kỹ thuật">
                                @if (isset($hotline[3]))
                                    {{ $hotline[3]->phone }}
                                @else
                                    No data
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="bota_channel_social_title">
                        <div class="bota_block_title"><span>Tham gia cộng đồng </span></div>
                    </div>
                    <div class="bota_channel_social">
                        <div class='block_facebook facebook_0 blocks_facebook blocks0 block' id="block_id_152">
                            <div class="block_title"><span>Like Fanpage</span></div>
                            <div class="summary-social">
                                Theo dõi, chia sẽ các tin tức về đồng hồ
                            </div>
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v19.0" nonce="iie1ZB7o"></script>
                            <div class="fb-page" @if (isset($hotline[4])) data-href="{{ $hotline[4]->phone }}" @endif data-tabs="timeline" data-width="295" data-height="255" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote @if (isset($hotline[4])) cite="{{ $hotline[4]->phone }}" @endif class="fb-xfbml-parse-ignore"><a @if (isset($hotline[4])) href="{{ $hotline[4]->phone }}" @endif>ĐỒNG HỒ THỊNH VƯỢNG</a></blockquote></div>
                            
                        </div>
                        <div class='block_youtube youtube_1 blocks_news_list blocks1 block' id="block_id_153">
                            <div class="block_title"><span></span></div>
                            <div class="body-social-youtube">
                                <div class="summary-social">
                                    Theo dõi kênh youtube để cập nhật những video mới nhất nhé !
                                </div>
                                <br>
                                <div class="image-subcibe">

                                    <script src="https://apis.google.com/js/platform.js"></script>
                                    <div class="g-ytsubscribe" data-channelid="{{ isset($channelId) ? $channelId : '' }}"
                                        data-layout="default" data-count="default"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('script')
    @stop
