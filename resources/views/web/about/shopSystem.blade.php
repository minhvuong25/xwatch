@extends('web.layouts.master')
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
                              <a href="/" title="Đồng hồ chính hãng Xwatch">
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
                              <a href="he-thong-cua-hang.html" alt="Hệ thống cửa hàng xwatch">
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
                              <a href="tel:081-30-55555">081-30-55555</a>
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
                        <a class="name" href="detail_info.html" title="Về XWatch" target="_self" rel="">
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
                                    <a href="ve-xwatch/gioi-thieu-ve-dong-ho-xwatch-n27244.html" title="Giới thiệu đồng hồ " target="_self" rel="">Giới thiệu đồng hồ Xwatch</a>
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
                     <li><a href="he-thong-cua-hang.html" title="Liên hệ">Liên hệ</a></li>
                  </ul>
               </div>
            </div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZwYN28RR7CqdK8YbR7GJVds6ZzJ6iGgg&libraries=geometry,places&callback=initialize&sensor=false" type="text/javascript"></script>
            <script>
               function initialize(address,latitude,longitude,info,zoom) {
                  var map;
                  var bounds = new google.maps.LatLngBounds();
                  var mapOptions = {
                        mapTypeId: 'roadmap'
                  };
                  var image = '/images/arrow-up1.png';
               map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
               map.setTilt(45);
               var markers2 = {
                     35:'<div class="info_content"><div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Hỗ trợ mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div><div class="map-bottom"></div></div>',
                     24:'<div class="info_content"><div class="map-top"><h4>Xwatch Lý Thái Tổ</h4><p>Địa chỉ: 378 Lý Thái Tổ, P10, Q10 (Vòng xoay Ngã Bảy) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0903 248 222</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                     34:'<div class="info_content"><div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div><div class="map-bottom"></div></div>',
                     31:'<div class="info_content"><div class="map-top"><h4>Xwatch Xuân Thủy</h4><p>Địa chỉ: 163 Xuân Thủy, Q. Cầu Giấy (Đối diện ĐHSP) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0358 708 090</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                     27:'<div class="info_content"><div class="map-top"><h4>Xwatch Quang Trung</h4><p>Địa chỉ: 150 Quang Trung, Hà Đông (Open: 8h30 - 21h30)</p><p>Điện thoại: 0969 629 929</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                     21:'<div class="info_content"><div class="map-top"><h4>Xwatch Xã Đàn</h4><p>Địa chỉ: Số 2 Xã Đàn, Đống Đa, Hà Nội (Open: 8h30 - 21h30)</p><p>Điện thoại: 0961 688 182</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
                     20:'<div class="info_content"><div class="map-top"><h4>Xwatch Đường Láng</h4><p>Địa chỉ: 472 Đường Láng, Đống Đa (Open: 8h30 - 21h30)</p><p>Điện thoại: 0939 868 388</p><p>Email: cskh.xwatch@gmail.com</p></div><div class="map-bottom"></div></div>',
               };

               if(address != '' && latitude != '' && longitude != ''){
                  var markers = [
                  [address, latitude,longitude]
                  ];
               }else{
                  var markers = [
                     ["Mua hàng Online", 21.028224,105.835419],
                     ["Xwatch Lý Thái Tổ", 10.767834731153444,106.67417972507292],
                     ["Mua hàng Online", 21.028224,105.835419],
                     ["Xwatch Xuân Thủy", 21.03649600306682,105.78371500145352],
                     ["Xwatch Quang Trung", 20.968944194942473,105.77300666272868],
                     ["Xwatch Xã Đàn", 21.008119981147146,105.84067035513226],
                     ["Xwatch Đường Láng", 21.016544778492374,105.80388918479548],
                  ];

               }
                  // Info Window Content
                  if(info ==0){
                        var infoWindowContent = [
                           ['<div class="info_content">' +'<div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Hỗ trợ mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div>' +'<div class="map-bottom"></div></div>'],

                           ['<div class="info_content">' +'<div class="map-top"><h4>Xwatch Lý Thái Tổ</h4><p>Địa chỉ: 378 Lý Thái Tổ, P10, Q10 (Vòng xoay Ngã Bảy) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0903 248 222</p><p>Email: cskh.xwatch@gmail.com</p></div>' +'<div class="map-bottom"></div></div>'],

                           ['<div class="info_content">' +'<div class="map-top"><h4>Mua hàng Online</h4><p>Địa chỉ: Mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)</p><p>Điện thoại: 1900.0325</p><p>Email: </p></div>' +'<div class="map-bottom"></div></div>'],

                           ['<div class="info_content">' +'<div class="map-top"><h4>Xwatch Xuân Thủy</h4><p>Địa chỉ: 163 Xuân Thủy, Q. Cầu Giấy (Đối diện ĐHSP) (Open: 8h30 - 21h30)</p><p>Điện thoại: 0358 708 090</p><p>Email: cskh.xwatch@gmail.com</p></div>' +'<div class="map-bottom"></div></div>'],

                           ['<div class="info_content">' +'<div class="map-top"><h4>Xwatch Quang Trung</h4><p>Địa chỉ: 150 Quang Trung, Hà Đông (Open: 8h30 - 21h30)</p><p>Điện thoại: 0969 629 929</p><p>Email: cskh.xwatch@gmail.com</p></div>' +'<div class="map-bottom"></div></div>'],

                           ['<div class="info_content">' +'<div class="map-top"><h4>Xwatch Xã Đàn</h4><p>Địa chỉ: Số 2 Xã Đàn, Đống Đa, Hà Nội (Open: 8h30 - 21h30)</p><p>Điện thoại: 0961 688 182</p><p>Email: cskh.xwatch@gmail.com</p></div>' +'<div class="map-bottom"></div></div>'],

                           ['<div class="info_content">' +'<div class="map-top"><h4>Xwatch Đường Láng</h4><p>Địa chỉ: 472 Đường Láng, Đống Đa (Open: 8h30 - 21h30)</p><p>Điện thoại: 0939 868 388</p><p>Email: cskh.xwatch@gmail.com</p></div>' +'<div class="map-bottom"></div></div>'],
                        ];
                  }else{
                        var infoWindowContent = [
                        [markers2[info]]
                        ];
                  }
               // Display multiple markers on a map
               var infoWindow = new google.maps.InfoWindow(), marker, i;

               // Loop through our array of markers & place each one on the map
               for( i = 0; i < markers.length; i++ ) {
                  var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                  bounds.extend(position);
                  marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        title: markers[i][0],
                        icon: 'statics/imgs/point.png'
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
                  if(zoom){
                  this.setZoom(zoom);
               }else{
                  this.setZoom(6);
               }
               google.maps.event.removeListener(boundsListener);
            });

            }
            $(document).ready( function(){
               initialize('','','',0,6);
            });

            $(window).on("load",function(){
                  $(".wrapper-list-agency").mCustomScrollbar({
                     theme:"minimal"
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
                           <h3 class="bota_title_add">Hệ thống Showroom của <span>xwatch</span></h3>
                           <div class="wrapper-select-add">
                              <select name="province" id="province"  onchange="changeCity22(this.value,'district');" >
                                 <option value="">--Chọn tỉnh/thành phố--</option>
                                 <option  value="1">
                                    Hà Nội
                                 </option>
                                 <option  value="2">
                                    Hồ Chí Minh
                                 </option>
                              </select>
                           </div>
                           <div class="wrapper-list-agency">
                              <ul class="list-item-agency">
                                 <li class="item-agency clearfix">
                                    <div class="wrapper-info-agency">
                                       <h2 class="name-agency" onclick="initialize('Mua hàng Online',21.028224,105.835419,35,19)">
                                          <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                             <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"/>
                                             <g>
                                          </svg>
                                          Hỗ trợ mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)
                                       </h2>
                                       <p class="add-phone">1900.0325</p>
                                       <p class="add-email"></p>
                                    </div>
                                 </li>
                                 <li class="item-agency clearfix">
                                    <div class="wrapper-info-agency">
                                       <h2 class="name-agency" onclick="initialize('Xwatch Lý Thái Tổ',10.767834731153444,106.67417972507292,24,19)">
                                          <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                             <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"/>
                                             <g>
                                          </svg>
                                          378 Lý Thái Tổ, P10, Q10 (Vòng xoay Ngã Bảy) (Open: 8h30 - 21h30)
                                       </h2>
                                       <p class="add-phone">0903 248 222</p>
                                       <p class="add-email">cskh.xwatch@gmail.com</p>
                                    </div>
                                 </li>
                                 <li class="item-agency clearfix">
                                    <div class="wrapper-info-agency">
                                       <h2 class="name-agency" onclick="initialize('Mua hàng Online',21.028224,105.835419,34,19)">
                                          <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                             <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"/>
                                             <g>
                                          </svg>
                                          Mua hàng: cskh.xwatch@gmail.com (Open: 8h30 - 18h00)
                                       </h2>
                                       <p class="add-phone">1900.0325</p>
                                       <p class="add-email"></p>
                                    </div>
                                 </li>
                                 <li class="item-agency clearfix">
                                    <div class="wrapper-info-agency">
                                       <h2 class="name-agency" onclick="initialize('Xwatch Xuân Thủy',21.03649600306682,105.78371500145352,31,19)">
                                          <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                             <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"/>
                                             <g>
                                          </svg>
                                          163 Xuân Thủy, Q. Cầu Giấy (Đối diện ĐHSP) (Open: 8h30 - 21h30)
                                       </h2>
                                       <p class="add-phone">0358 708 090</p>
                                       <p class="add-email">cskh.xwatch@gmail.com</p>
                                    </div>
                                 </li>
                                 <li class="item-agency clearfix">
                                    <div class="wrapper-info-agency">
                                       <h2 class="name-agency" onclick="initialize('Xwatch Quang Trung',20.968944194942473,105.77300666272868,27,19)">
                                          <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                             <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"/>
                                             <g>
                                          </svg>
                                          150 Quang Trung, Hà Đông (Open: 8h30 - 21h30)
                                       </h2>
                                       <p class="add-phone">0969 629 929</p>
                                       <p class="add-email">cskh.xwatch@gmail.com</p>
                                    </div>
                                 </li>
                                 <li class="item-agency clearfix">
                                    <div class="wrapper-info-agency">
                                       <h2 class="name-agency" onclick="initialize('Xwatch Xã Đàn',21.008119981147146,105.84067035513226,21,19)">
                                          <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                             <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"/>
                                             <g>
                                          </svg>
                                          Số 2 Xã Đàn, Đống Đa, Hà Nội (Open: 8h30 - 21h30)
                                       </h2>
                                       <p class="add-phone">0961 688 182</p>
                                       <p class="add-email">cskh.xwatch@gmail.com</p>
                                    </div>
                                 </li>
                                 <li class="item-agency clearfix">
                                    <div class="wrapper-info-agency">
                                       <h2 class="name-agency" onclick="initialize('Xwatch Đường Láng',21.016544778492374,105.80388918479548,20,19)">
                                          <svg x="0px" y="0px" viewBox="0 0 54.757 54.757" style="enable-background:new 0 0 54.757 54.757;" xml:space="preserve">
                                             <path d="M40.94,5.617C37.318,1.995,32.502,0,27.38,0c-5.123,0-9.938,1.995-13.56,5.617c-6.703,6.702-7.536,19.312-1.804,26.952  L27.38,54.757L42.721,32.6C48.476,24.929,47.643,12.319,40.94,5.617z M27.557,26c-3.859,0-7-3.141-7-7s3.141-7,7-7s7,3.141,7,7  S31.416,26,27.557,26z"/>
                                             <g>
                                          </svg>
                                          472 Đường Láng, Đống Đa (Open: 8h30 - 21h30)
                                       </h2>
                                       <p class="add-phone">0939 868 388</p>
                                       <p class="add-email">cskh.xwatch@gmail.com</p>
                                    </div>
                                 </li>
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
                           <svg x="0px" y="0px" viewBox="0 0 473.806 473.806" style="enable-background:new 0 0 473.806 473.806;" xml:space="preserve">
                              <g>
                                 <g>
                                    <path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4    c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8    c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6    c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5    c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26    c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9    c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806    C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20    c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6    c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1    c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3    c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5    c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8    c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9    l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1    C420.456,377.706,420.456,388.206,410.256,398.806z"></path>
                                    <path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2    c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11    S248.656,111.506,256.056,112.706z"></path>
                                    <path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11    c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2    c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"></path>
                                 </g>
                              </g>
                           </svg>
                           Tư vấn bán hàng
                        </div>
                        <a href="tel:081-30-55555" title="Tư vấn bán hàng">081-30-55555</a>
                     </div>
                     <div class="hotline-bt">
                        <div>
                           <svg x="0px" y="0px" width="356.484px" height="356.484px" viewBox="0 0 356.484 356.484" style="enable-background:new 0 0 356.484 356.484;" xml:space="preserve">
                              <g>
                                 <g>
                                    <path d="M293.984,7.23H62.5C28.037,7.23,0,35.268,0,69.731v142.78c0,34.463,28.037,62.5,62.5,62.5l147.443,0.001l70.581,70.58    c2.392,2.393,5.588,3.662,8.842,3.662c1.61,0,3.234-0.312,4.78-0.953c4.671-1.934,7.717-6.49,7.717-11.547v-62.237    c30.759-3.885,54.621-30.211,54.621-62.006V69.731C356.484,35.268,328.447,7.23,293.984,7.23z M331.484,212.512    c0,20.678-16.822,37.5-37.5,37.5h-4.621c-6.903,0-12.5,5.598-12.5,12.5v44.064l-52.903-52.903    c-2.344-2.345-5.522-3.661-8.839-3.661H62.5c-20.678,0-37.5-16.822-37.5-37.5V69.732c0-20.678,16.822-37.5,37.5-37.5h231.484    c20.678,0,37.5,16.822,37.5,37.5V212.512z"></path>
                                    <path d="M270.242,95.743h-184c-6.903,0-12.5,5.596-12.5,12.5c0,6.903,5.597,12.5,12.5,12.5h184c6.903,0,12.5-5.597,12.5-12.5    C282.742,101.339,277.146,95.743,270.242,95.743z"></path>
                                    <path d="M270.242,165.743h-184c-6.903,0-12.5,5.596-12.5,12.5s5.597,12.5,12.5,12.5h184c6.903,0,12.5-5.597,12.5-12.5    S277.146,165.743,270.242,165.743z"></path>
                                 </g>
                              </g>
                           </svg>
                           Hỗ trợ dịch vụ
                        </div>
                        <a href="tel:0247 306 3555" title="Hỗ trợ dịch vụ">0247 306 3555</a>
                     </div>
                     <div class="hotline-bt">
                        <div>
                           <svg x="0px" y="0px" viewBox="0 0 54 54" style="enable-background:new 0 0 54 54;" xml:space="preserve">
                              <g>
                                 <path d="M51.22,21h-5.052c-0.812,0-1.481-0.447-1.792-1.197s-0.153-1.54,0.42-2.114l3.572-3.571   c0.525-0.525,0.814-1.224,0.814-1.966c0-0.743-0.289-1.441-0.814-1.967l-4.553-4.553c-1.05-1.05-2.881-1.052-3.933,0l-3.571,3.571   c-0.574,0.573-1.366,0.733-2.114,0.421C33.447,9.313,33,8.644,33,7.832V2.78C33,1.247,31.753,0,30.22,0H23.78   C22.247,0,21,1.247,21,2.78v5.052c0,0.812-0.447,1.481-1.197,1.792c-0.748,0.313-1.54,0.152-2.114-0.421l-3.571-3.571   c-1.052-1.052-2.883-1.05-3.933,0l-4.553,4.553c-0.525,0.525-0.814,1.224-0.814,1.967c0,0.742,0.289,1.44,0.814,1.966l3.572,3.571   c0.573,0.574,0.73,1.364,0.42,2.114S8.644,21,7.832,21H2.78C1.247,21,0,22.247,0,23.78v6.439C0,31.753,1.247,33,2.78,33h5.052   c0.812,0,1.481,0.447,1.792,1.197s0.153,1.54-0.42,2.114l-3.572,3.571c-0.525,0.525-0.814,1.224-0.814,1.966   c0,0.743,0.289,1.441,0.814,1.967l4.553,4.553c1.051,1.051,2.881,1.053,3.933,0l3.571-3.572c0.574-0.573,1.363-0.731,2.114-0.42   c0.75,0.311,1.197,0.98,1.197,1.792v5.052c0,1.533,1.247,2.78,2.78,2.78h6.439c1.533,0,2.78-1.247,2.78-2.78v-5.052   c0-0.812,0.447-1.481,1.197-1.792c0.751-0.312,1.54-0.153,2.114,0.42l3.571,3.572c1.052,1.052,2.883,1.05,3.933,0l4.553-4.553   c0.525-0.525,0.814-1.224,0.814-1.967c0-0.742-0.289-1.44-0.814-1.966l-3.572-3.571c-0.573-0.574-0.73-1.364-0.42-2.114   S45.356,33,46.168,33h5.052c1.533,0,2.78-1.247,2.78-2.78V23.78C54,22.247,52.753,21,51.22,21z M52,30.22   C52,30.65,51.65,31,51.22,31h-5.052c-1.624,0-3.019,0.932-3.64,2.432c-0.622,1.5-0.295,3.146,0.854,4.294l3.572,3.571   c0.305,0.305,0.305,0.8,0,1.104l-4.553,4.553c-0.304,0.304-0.799,0.306-1.104,0l-3.571-3.572c-1.149-1.149-2.794-1.474-4.294-0.854   c-1.5,0.621-2.432,2.016-2.432,3.64v5.052C31,51.65,30.65,52,30.22,52H23.78C23.35,52,23,51.65,23,51.22v-5.052   c0-1.624-0.932-3.019-2.432-3.64c-0.503-0.209-1.021-0.311-1.533-0.311c-1.014,0-1.997,0.4-2.761,1.164l-3.571,3.572   c-0.306,0.306-0.801,0.304-1.104,0l-4.553-4.553c-0.305-0.305-0.305-0.8,0-1.104l3.572-3.571c1.148-1.148,1.476-2.794,0.854-4.294   C10.851,31.932,9.456,31,7.832,31H2.78C2.35,31,2,30.65,2,30.22V23.78C2,23.35,2.35,23,2.78,23h5.052   c1.624,0,3.019-0.932,3.64-2.432c0.622-1.5,0.295-3.146-0.854-4.294l-3.572-3.571c-0.305-0.305-0.305-0.8,0-1.104l4.553-4.553   c0.304-0.305,0.799-0.305,1.104,0l3.571,3.571c1.147,1.147,2.792,1.476,4.294,0.854C22.068,10.851,23,9.456,23,7.832V2.78   C23,2.35,23.35,2,23.78,2h6.439C30.65,2,31,2.35,31,2.78v5.052c0,1.624,0.932,3.019,2.432,3.64   c1.502,0.622,3.146,0.294,4.294-0.854l3.571-3.571c0.306-0.305,0.801-0.305,1.104,0l4.553,4.553c0.305,0.305,0.305,0.8,0,1.104   l-3.572,3.571c-1.148,1.148-1.476,2.794-0.854,4.294c0.621,1.5,2.016,2.432,3.64,2.432h5.052C51.65,23,52,23.35,52,23.78V30.22z"></path>
                                 <path d="M27,18c-4.963,0-9,4.037-9,9s4.037,9,9,9s9-4.037,9-9S31.963,18,27,18z M27,34c-3.859,0-7-3.141-7-7s3.141-7,7-7   s7,3.141,7,7S30.859,34,27,34z"></path>
                              </g>
                           </svg>
                           Tư vấn kỹ thuật
                        </div>
                        <a href="tel:0247 306 3555" title="Tư vấn kỹ thuật">0247 306 3555</a>
                     </div>
                     <div class="hotline-bt">
                        <div>
                           <svg x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                              <g>
                                 <g>
                                    <path d="M467,61H45C20.218,61,0,81.196,0,106v300c0,24.72,20.128,45,45,45h422c24.72,0,45-20.128,45-45V106    C512,81.28,491.872,61,467,61z M460.786,91L256.954,294.833L51.359,91H460.786z M30,399.788V112.069l144.479,143.24L30,399.788z     M51.213,421l144.57-144.57l50.657,50.222c5.864,5.814,15.327,5.795,21.167-0.046L317,277.213L460.787,421H51.213z M482,399.787    L338.213,256L482,112.212V399.787z"></path>
                                 </g>
                              </g>
                           </svg>
                           Email
                        </div>
                        <a href="mailto:cskh.xwatch@gmail.com" title="Tư vấn kỹ thuật">cskh.xwatch@gmail.com</a>
                     </div>
                  </div>
                  <div class="bota_channel_social_title">
                     <div class="bota_block_title"><span>Tham gia cộng đồng xwatch</span></div>
                 </div>
                 <div class="bota_channel_social">
                     <div class='block_facebook facebook_0 blocks_facebook blocks0 block'  id = "block_id_152" >
                        <div class="block_title"><span>Like Fanpage</span></div>
                        <div class="summary-social">
                           Theo dõi, chia sẽ các tin tức về đồng hồ
                        </div>
                        <div class="fb-page" data-href="https://www.facebook.com/Xwatch.DongHoThat" data-tabs="timeline" data-width="295" data-height="255" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                           <blockquote cite="https://www.facebook.com/Xwatch.DongHoThat" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Xwatch.DongHoThat">Xwatch</a></blockquote>
                        </div>
                     </div>
                     <div class='block_youtube youtube_1 blocks_news_list blocks1 block'  id = "block_id_153" >
                     <div class="block_title"><span>XWatch - Xchannel</span></div>
                     <div class="body-social-youtube">
                        <div class="summary-social">
                           Theo dõi kênh youtube để cập nhật những video mới nhất nhé !
                        </div>
                        <div class="image"><img src="statics/imgs/untitled-1_1559702265.png" alt="youtube channel"></div>
                        <div class="image-subcibe">
                           <img src="https://xwatch.vn/images/youtubevn.png" alt="youtube vietnam">
                           <script src="https://apis.google.com/js/platform.js"></script>
                           <div class="g-ytsubscribe" data-channelid="UC4P_yZzBLlxUKZyGygBHhkw" data-layout="default" data-count="default"></div>
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



