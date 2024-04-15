@extends('web.layouts.master')
@section('title')
    {{ $seoContent->meta_title ?? 'Đồng Hồ Thịnh Vượng' }}
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
                    <li><a href="/" title="Phụ kiện đồng hồ">Phụ kiện đồng hồ</a></li>
                </ul>
            </div>
        </div>

        <div class="bota_product_page">
            <div class="container">
                <div class="bota_page_title">
                    <h1><span>Phụ kiện đồng hồ</span></h1>
                </div>
                <div class="bota_all_summary">
                    <div class="bota_summary_content_filter">
                        <p>{!! $accessory->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bota_product_center_page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-sm-3">
                        <div class="bota_block_product_filter clearfix">
                            <div class="bota_field_area bota_field_item" id="field_manufactory">
                                <div class="bota_field_name normal field field_opened " data-id="id_field_manufactory">
                                    PHỤ KIỆN ĐỒNG HỒ
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
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="type_cb" @if (isset($type) && $type == 'day-dong-ho') checked @endif
                                                value="1"><i class="icon_v1 "></i>Dây đồng hồ</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="type_cb" @if (isset($type) && $type == 'khoa-dong-ho') checked @endif
                                                value="2"><i class="icon_v1 "></i> Khoá đồng hồ</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="type_cb" @if (isset($type) && $type == 'hop-dung-dong-ho') checked @endif
                                                value="3"><i class="icon_v1 "></i>Hộp đựng đồng hồ
                                        </div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="type_cb" @if (isset($type) && $type == 'hop-xoay-dong-ho') checked @endif
                                                value="4"><i class="icon_v1 "></i>Hộp xoay đồng hồ
                                        </div>
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
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="price_cb" value="less500"><i class="icon_v1 "></i>Dưới 500 nghìn</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="price_cb" value="500to1m"><i class="icon_v1 "></i>Từ 500 nghìn - 1
                                            triệu</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="price_cb" value="1mto2m"><i class="icon_v1 "></i>Từ 1 - 2 triệu</div>
                                        <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                name="price_cb" value="more2m"><i class="icon_v1 "></i>Trên 2 triệu</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bota_field_area bota_field_item" id="field_size_mat">
                                <div class="bota_field_name normal field  field_opened " data-id="id_field_size_mat">
                                    Kích Thước
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
                                                    name="size_cb" value="12"><i class="icon_v1 "></i>12 mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="14"><i class="icon_v1 "></i>14 mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="16"><i class="icon_v1 "></i>16 mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="18"><i class="icon_v1 "></i>18 mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="20"><i class="icon_v1 "></i>20 mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="22"><i class="icon_v1 "></i>22 mm
                                            </div>
                                            <div class="cls item filter60 filter_attribute"><input type="checkbox"
                                                    name="size_cb" value="24"><i class="icon_v1 "></i>24 mm
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-sm-9">
                        <div class="bota_field_title">
                            <div class="bota_title_name">
                                <br><br><br><br>
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
                        <div class="row bota_product_grid">
                            <div id="filter-attribute-results" class="row bota_product_grid">
                                @foreach ($products as $product)
                                    <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                        <div class="bota_pr_item">
                                            <div class="bota_pr_image ">
                                                <a href="{{ route('web.product.show', $product->slug) }}" title="">
                                                    @if ($product->images->first() === null)
                                                        <img src="" alt="">
                                                    @else
                                                        <img width="320px" height="365" alt=""
                                                            src="{{ route('productImageShow', [
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
                        </div>
                        <div class="bota_pagination" id="bota_pagination">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container summary_content_cat description">
            <p>- Dây da đồng hồ chất liệu da bò chính hãng</p>
            <P>- Dây da đồng hồ bằng da cá sấu chính hiệu</P>
            <p>- Dây da đồng hồ bằng da đà điểu chính hãng</p>
            <P>- Hộp đồng hồ cầm tay thiết kế đẹp và tiện dụng.</P>
            <P>- Hộp xoay đồng hồ bền đẹp và thiết kế nhỏ gọn</P>
        </div>
        <div class="bota_related_news">
            <div class="container">
                <div class="bota_block_title"><span>Kiến thức đồng hồ</span></div>
                <div class="related_content clearfix">
                    @foreach ($blogRelated as $value)
                        @if (isset($value) && !empty($value))
                            <div class='news-item'>
                                <div class="img">
                                    <a href='{{ route('web.blog.show', $value->slug) }}'>
                                        <img width="270" height="154" alt="{{ $value->slug }}"
                                            src='{{ asset($value->default_image) }}' />
                                    </a>
                                </div>
                                <div class="title_related">
                                    <a href='{{ route('web.blog.show', $value->slug) }}' title="{{ $value->title }}">
                                        {!! $value->title !!} </a>
                                </div>
                                <div class="date">
                                    <svg viewBox="0 0 511.634 511.634" style="enable-background:new 0 0 511.634 511.634;"
                                        xml:space="preserve">
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
        <div class="bota_block_policy">
               <div class="container">
                  <div class="bota_block_policy_content">
                     <div class="item">
                        <a href="/" alt="Trao đổi - Ký gửi Đồng hồ cũ / mới">
                            <img src="/uploads/imageHome/trao-doi-ki-gui.png" alt="Trao đổi - Ký gửi Đồng hồ cũ / mới" />
                        </a>
                        <div class="content-right">
                            <a class="title" href="/" alt="Trao đổi - Ký gửi">Trao đổi - Ký gửi</a>
                            <a class="summary" href="/" alt="Đồng hồ cũ / mới">Đồng hồ cũ / mới</a>
                        </div>
                     </div>
                     <div class="item">
                            <div class="img-svg">
                                <a href="/" alt="Đến 10 năm về Bảo hành, hậu mãi">
                                    <img src="/uploads/imageHome/bao-hanh-10-nam.png" alt="Đến 10 năm về Bảo hành, hậu mãi" />
                                </a>
                            </div>
                            <div class="content-right">
                                <a class="title" href="/" alt="Đến 10 năm">Đến 10 năm</a>
                                <a class="summary" href="/" alt="Bảo hành, hậu mãi ">Bảo hành, hậu mãi </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-svg">
                                <a href="/" alt="ĐỀN GẤP 10 NẾU PHÁT HIỆN HÀNG FACE">
                                     <img src="/uploads/imageHome/den-gap-10-lan.jpg" alt="ĐỀN GẤP 10 NẾU PHÁT HIỆN HÀNG FACE" />
                                </a>
                            </div>
                            <div class="content-right">
                                <a class="title" href="/" alt="ĐỀN GẤP 10">ĐỀN GẤP 10</a>
                                <a class="summary" href="/" alt="NẾU PHÁT HIỆN HÀNG FACE">NẾU PHÁT HIỆN HÀNG FACE</a>
                            </div>
                        </div>
                  </div>
               </div>
            </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            $('.filter_attribute').change(function() {
                var selectedAttributesSize = [];
                var selectedAttributesType = [];
                var selectedAttributesPrice = [];
                var selectElement = document.getElementById("filter_sort");
                var sort = selectElement.value;
                $('input[type="checkbox"][name="size_cb"]:checked').each(function() {
                    selectedAttributesSize.push($(this).val());
                });
                $('input[type="checkbox"][name="type_cb"]:checked').each(function() {
                    selectedAttributesType.push($(this).val());
                });
                $('input[type="checkbox"][name="price_cb"]:checked').each(function() {
                    selectedAttributesPrice.push($(this).val());
                });
                console.log(sort, selectedAttributesPrice, selectedAttributesType, selectedAttributesSize)
                $.ajax({
                    url: "{{ route('accessoryfilter') }}",
                    method: 'GET',
                    data: {
                        sort: sort,
                        size: selectedAttributesSize,
                        type: selectedAttributesType,
                        price: selectedAttributesPrice,
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
@stop
