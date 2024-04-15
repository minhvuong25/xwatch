@php
    $hotline = \App\Helper\FuncLib::getContact();
    $StoreAddress = \App\Helper\FuncLib::getStoreAddress();
    $logo = \App\Helper\FuncLib::getLogo();
    $menuFooter = App\Helper\FuncLib::getmenuFooter();
@endphp
<footer class="bota_footer">
    <div class="container">
        <div class="bota_footer_top clearfix">
            <div class="top-left">
                <div class="hotline-bt">
                    <a @if (isset($hotline[0]->phone)) href="tel:{{ $hotline[0]->phone }}"
                    @else
                    href="/" @endif
                        title="Tư vấn bán hàng">
                        @if (isset($hotline[0]))
                            {{ $hotline[0]->phone }}
                        @else
                            No data
                        @endif
                        <span>
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
                        </span>
                    </a>
                </div>
                <div class="hotline-bt">
                    <a @if (isset($hotline[1]->phone)) href="tel:{{ $hotline[1]->phone }}"
                    @else
                    href="/" @endif
                        title="Hỗ trợ dịch vụ">
                        @if (isset($hotline[1]))
                            {{ $hotline[1]->phone }}
                        @else
                            No data
                        @endif
                        <span>
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
                        </span>
                    </a>
                </div>
                <div class="hotline-bt">
                    <a @if (isset($hotline[2]->phone)) href="tel:{{ $hotline[2]->phone }}"
                    @else
                    href="/" @endif
                        title="Tư vấn kỹ thuật">
                        @if (isset($hotline[2]))
                            {{ $hotline[2]->phone }}
                        @else
                            No data
                        @endif
                        <span>
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
                        </span>
                    </a>
                </div>
            </div>
            <div class="top-right">
                <ul class="menu-bottom">
                    @foreach ($menuFooter as $value)
                        <li class="level0 first-item">
                            @php
                                $menu_subs = \App\Helper\FuncLib::getMenu($value->id);
                            @endphp
                            @if (count($menu_subs) > 0)
                                <span class="click-mobile" data-id="menu-sub{{ $value->id }}"></span>
                            @endif
                            <h4 class="footer_title">
                                <a href="{{ url('') }}{{ $value->url }}" title="{{ $value->name }}" target="_self" rel="nofollow">
                                    {{ $value->name }}
                                </a>
                            </h4>
                            <ul id="menu-sub{{ $value->id }}">
                                @php
                                    $firstItemFlag = true;
                                @endphp
                                @foreach ($menu_subs as $menu_sub)
                                    <li class="level1 {{ $firstItemFlag ? 'first-sitem' : '' }}">
                                        <a href="{{ url('') }}{{ $menu_sub->url }}" title="{{ $menu_sub->name }}" target="_self"
                                            rel="nofollow">{{ $menu_sub->name }}</a>
                                    </li>
                                    @php
                                        $firstItemFlag = false;
                                    @endphp
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <div class="clearfix"></div>
                <div class="tag-share-ft clearfix">
                    {{-- <div class="tag-ft">
                        <div class="block_tags_default block_content">
                            <!--    <h3>Tags</h3>-->
                            <a href="/dong-ho-nam/sg88864103at-p957172.html" title="Srwatch SG8886.4103AT"
                                class=" tag_item">Srwatch SG8886.4103AT</a><span class="sepa"> | </span> <a
                                href="/dong-ho-pc754/dong-ho-quartz.html" title="Đồng hồ quartz"
                                class=" tag_item">Đồng hồ quartz</a><span class="sepa"> | </span> <a
                                href="/dong-ho-nam/sg999934602gla-p957709.html" title="SG99993.4602GLA"
                                class=" tag_item">SG99993.4602GLA</a><span class="sepa"> | </span> <a
                                href="/dong-ho-pc754/dong-ho-kinh-sapphire.html" title="Kính sapphire"
                                class=" tag_item">Kính sapphire</a><span class="sepa"> | </span> <a
                                href="/dong-ho-pc754/dong-ho-day-da.html" title="Dây da" class=" tag_item">Dây
                                da</a><span class="sepa"> | </span>
                        </div>
                    </div> --}}
                    <div class="share-ft">
                        <div class="block-share">
                            <a @if (isset($hotline[4])) href=" {{ $hotline[4]->phone }}"
                            @else
                                href="/" @endif
                                rel="nofollow" target="_blink">
                                <svg x="0px" y="0px" viewBox="0 0 112.196 112.196"
                                    style="enable-background:new 0 0 112.196 112.196;" xml:space="preserve">
                                    <g>
                                        <circle style="fill:#3B5998;" cx="56.098" cy="56.098" r="56.098">
                                        </circle>
                                        <path style="fill:#FFFFFF;"
                                            d="M70.201,58.294h-10.01v36.672H45.025V58.294h-7.213V45.406h7.213v-8.34   c0-5.964,2.833-15.303,15.301-15.303L71.56,21.81v12.51h-8.151c-1.337,0-3.217,0.668-3.217,3.513v7.585h11.334L70.201,58.294z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <a @if (isset($hotline[5])) href=" {{ $hotline[5]->phone }}"
                        @else
                            href="/" @endif
                                rel="nofollow" target="_blink">
                                <svg width="60px" x="0px" y="0px" viewBox="0 0 473.931 473.931"
                                    style="enable-background:new 0 0 473.931 473.931;" xml:space="preserve">
                                    <circle style="fill:#D42428;" cx="236.966" cy="236.966" r="236.966">
                                    </circle>
                                    <path style="fill:#CC202D;"
                                        d="M404.518,69.38c92.541,92.549,92.549,242.593,0,335.142c-92.541,92.541-242.593,92.545-335.142,0  L404.518,69.38z">
                                    </path>
                                    <path style="fill:#BA202E;"
                                        d="M469.168,284.426L351.886,167.148l-138.322,15.749l-83.669,129.532l156.342,156.338  C378.157,449.322,450.422,376.612,469.168,284.426z">
                                    </path>
                                    <path style="fill:#FFFFFF;"
                                        d="M360.971,191.238c0-19.865-16.093-35.966-35.947-35.966H156.372c-19.85,0-35.94,16.105-35.94,35.966  v96.444c0,19.865,16.093,35.966,35.94,35.966h168.649c19.858,0,35.947-16.105,35.947-35.966v-96.444H360.971z M216.64,280.146  v-90.584l68.695,45.294L216.64,280.146z">
                                    </path>
                                    <g>
                                    </g>
                                </svg>
                            </a>
                            <a @if (isset($hotline[3])) href="{{ $hotline[3]->phone }}"
                        @else
                            href="/" @endif
                                rel="nofollow" target="_blink">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="360.000000pt" height="360.000000pt" viewBox="0 0 360.000000 360.000000"
                                preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,360.000000) scale(0.100000,-0.100000)"
                                fill="#fff" stroke="none">
                                <path d="M1640 3594 c-14 -2 -63 -9 -110 -15 -47 -6 -139 -26 -205 -44 -307
                                -85 -569 -237 -796 -464 -267 -267 -433 -587 -506 -975 -24 -127 -24 -465 0
                                -591 70 -371 225 -682 470 -941 275 -290 618 -471 1037 -546 113 -20 450 -16
                                570 6 644 119 1158 543 1384 1141 81 213 110 378 110 630 1 208 -7 274 -50
                                447 -171 687 -729 1202 -1446 1334 -79 15 -404 28 -458 18z m521 -769 c21
                                -165 115 -321 237 -392 55 -32 153 -63 201 -63 l38 0 6 -67 c4 -38 7 -119 7
                                -182 l0 -114 -67 6 c-127 12 -286 67 -390 137 l-33 22 0 -349 c0 -192 -5 -386
                                -11 -433 -49 -398 -345 -634 -722 -577 -262 40 -466 222 -534 477 -26 96 -23
                                253 6 355 35 126 84 209 175 300 130 129 257 178 444 173 l97 -3 3 -190 2
                                -190 -82 -1 c-91 0 -147 -19 -206 -69 -77 -65 -110 -197 -77 -311 55 -190 310
                                -245 463 -100 48 44 71 96 82 179 5 39 10 381 10 760 l0 687 173 -2 172 -3 6
                                -50z"/>
                                </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bota_footer_bottom clearfix">
            <div class="bot-left">
                <a href="/" title="">
                    @if (isset($logo->source_url) && !empty($logo->source_url))
                        <img width="216" height="62" src="{{ asset($logo->source_url) }}"
                            alt="Đồng hồ chính hãng ">
                    @endif
                </a>
            </div>
            <div class="bot-right">
                <div class="all_showroom">
                    <div class="block_address">
                        <div class="tab">
                            @foreach ($StoreAddress as $key => $value)
                                @if ($value['store_address'] !== [])
                                    <button data-id="{{ $value['province_id'] }}"
                                        class="tablinks tab-boder {{ $key == 0 ? ' active ' : '' }}"
                                        id="defaultOpen"><span class="text">{{ $value['name'] }}</span></button>
                                @endif
                            @endforeach
                        </div>
                        @foreach ($StoreAddress as $key => $value)
                            <div id="region_{{ $value['province_id'] }}"
                                class="tabcontent clearfix {{ $key == 0 ? ' display_open ' : '' }}">
                                @foreach ($value['store_address'] as $store)
                                    <ul class="regions_1 regions">
                                        <li class="name"><a href="{{ route('address') }}"
                                                title="{{ $store['name'] }}">{{ $store['name'] }}</a>
                                        </li>
                                        <li class="address">
                                            <svg x="0px" y="0px" viewBox="0 0 54.757 54.757"
                                                style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                                <path
                                                    d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z">
                                                </path>
                                                <g></g>
                                            </svg>
                                            <a href="{{ route('address') }}"
                                                title="{{ $store['address'] }}">{{ $store['address'] }}</a>
                                        </li>
                                        <li class="phone">
                                            <svg x="0px" y="0px" viewBox="0 0 578.106 578.106"
                                                style="enable-background:new 0 0 578.106 578.106;"
                                                xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M577.83,456.128c1.225,9.385-1.635,17.545-8.568,24.48l-81.396,80.781    c-3.672,4.08-8.465,7.551-14.381,10.404c-5.916,2.857-11.729,4.693-17.439,5.508c-0.408,0-1.635,0.105-3.676,0.309    c-2.037,0.203-4.689,0.307-7.953,0.307c-7.754,0-20.301-1.326-37.641-3.979s-38.555-9.182-63.645-19.584    c-25.096-10.404-53.553-26.012-85.376-46.818c-31.823-20.805-65.688-49.367-101.592-85.68    c-28.56-28.152-52.224-55.08-70.992-80.783c-18.768-25.705-33.864-49.471-45.288-71.299    c-11.425-21.828-19.993-41.616-25.705-59.364S4.59,177.362,2.55,164.51s-2.856-22.95-2.448-30.294    c0.408-7.344,0.612-11.424,0.612-12.24c0.816-5.712,2.652-11.526,5.508-17.442s6.324-10.71,10.404-14.382L98.022,8.756    c5.712-5.712,12.24-8.568,19.584-8.568c5.304,0,9.996,1.53,14.076,4.59s7.548,6.834,10.404,11.322l65.484,124.236    c3.672,6.528,4.692,13.668,3.06,21.42c-1.632,7.752-5.1,14.28-10.404,19.584l-29.988,29.988c-0.816,0.816-1.53,2.142-2.142,3.978    s-0.918,3.366-0.918,4.59c1.632,8.568,5.304,18.36,11.016,29.376c4.896,9.792,12.444,21.726,22.644,35.802    s24.684,30.293,43.452,48.653c18.36,18.77,34.68,33.354,48.96,43.76c14.277,10.4,26.215,18.053,35.803,22.949    c9.588,4.896,16.932,7.854,22.031,8.871l7.648,1.531c0.816,0,2.145-0.307,3.979-0.918c1.836-0.613,3.162-1.326,3.979-2.143    l34.883-35.496c7.348-6.527,15.912-9.791,25.705-9.791c6.938,0,12.443,1.223,16.523,3.672h0.611l118.115,69.768    C571.098,441.238,576.197,447.968,577.83,456.128z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <a href="tel:{{ $store['phone'] }}"
                                                title="Điện thoại: {{ $store['phone'] }}"> {{ $store['phone'] }}</a>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<div id="fixed-bar">
  <div id="bar-inner">
    <a class="go-top" href="#page-wrapper" title="back to top"> <svg aria-hidden="true" data-prefix="far" data-icon="angle-double-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-angle-double-up fa-w-10"><path fill="currentColor" d="M168.5 84.2l148 146.8c4.7 4.7 4.7 12.3 0 17l-19.8 19.8c-4.7 4.7-12.3 4.7-17 0L160 149.3 40.3 267.8c-4.7 4.7-12.3 4.7-17 0L3.5 248c-4.7-4.7-4.7-12.3 0-17l148-146.8c4.7-4.7 12.3-4.7 17 0zm-17 160L3.5 391c-4.7 4.7-4.7 12.3 0 17l19.8 19.8c4.7 4.7 12.3 4.7 17 0L160 309.3l119.7 118.5c4.7 4.7 12.3 4.7 17 0l19.8-19.8c4.7-4.7 4.7-12.3 0-17l-148-146.8c-4.7-4.7-12.3-4.7-17 0z" class=""></path></svg></a>       
</div>
<script>
    function addCart(slug) {
        get(route('addcart', slug), function(res) {
            reloadCartItemInBadge()
            alertify.success("Thêm vào giỏ hàng");
        }, function(err) {
            console.error(err)
        })
    }

    function reloadProductInCartPage() {
        get(route('frontend.cart.reload-products-in-cardpage'), function(response) {
            $("#products-step-1").html(response)
        });
    }

    $(document).on("click", ".remove-btn", function() {
        removeItemOutOfCart($(this));
    });

    function removeItemOutOfCart(item) {
        const productId = item.attr("data-idcart");

        get(route("frontend.cart.delete-item", productId), function() {
            reloadCartItemInBadge();
            reloadProductInCartPage();
            alertify.success("{{ __('Product has been deleted') }}");
        })
    }

    function reloadCartItemInBadge() {
        get(route('addcart'), function(response) {
            // renderCart(response)
        })
    }

    function renderCart(response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#show-total-quantity").text($("#total-quantity-cart").length != 0 ? $("#total-quantity-cart").val() : 0);
    }
    $(document).ready(function() {
        $('.swither').on("click", "li", function() {
            //<span data-idcart="2"></span>
            const viewMode = $(this).data('display');
            $(".item-wrapper").attr('data-viewmode', viewMode)
        });
        if ($('.datetimepicker').length) {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                //format: 'DD-MM-YYYY HH:mm',
                // sideBySide: true,
                keepOpen: true,
                showClear: true,
            });
        }
        $('div.alert').not('.alert-important').delay(5000).fadeOut(350);
    });
</script>
