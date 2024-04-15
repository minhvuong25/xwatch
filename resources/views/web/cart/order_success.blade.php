@extends('web.layouts.master')
@section('content')
    {{-- {{ $dataOrder }}
    {{ $dataOrderItem }} --}}
    <div class="bota_breadcrumb_main">
       <div class="container">
          <ul class="breadcrumb">
             <li><a href="/" title="Trang chủ">Trang chủ</a></li>
             <li><span>Thanh toán</span></li>
          </ul>
       </div>
    </div>
    <div class="bota_payment_page">
    <div class="container">
        <div id="products-cart">
            <h1 class="bota_page_title"><span>Chi tiết đơn hàng</span></h1>
            <div class="tab-info-oder">
                <span>Mã đơn hàng : </span>{{ $dataOrder->order_code ?? '' }}
            </div>
            <div class="frame-large-body">
                <table width="100%">
                    <tr>
                        <th width="4.3%" height="35">STT</th>
                        <th width="56.7%">Tên sản phẩm</th>
                        <th width="13.2%">Giá sản phẩm</th>
                        <th width="8%">Số lượng</th>
                        <th width="13.2%">Tổng</th>
                    </tr>
                    @php
                        $i = 1;
                        $province = \App\Models\Province::find($dataOrder->province_id)->name;
                        $district = \App\Models\District::find($dataOrder->district_id)->name;
                        $ward = \App\Models\Wards::find($dataOrder->ward_id)->name;
                    @endphp
                    @foreach ($dataOrderItem as $item)
                        <tr>
                            <td style="text-align: center;">{{$i++}}</td>
                            
                            <td>
                                @php
                                $id = $item->product_id;
                                $product = \App\Models\Product::find($id);
                                @endphp
                           
                            <div class="title-img">
                            <a href="{{ route('web.product.show', $product->slug) }}" title="{{ $product->name }}">
                                @if ($product->images->first() === null)
                                    <img src="" alt="donghothinhvuong.bota.vn">
                                @else
                                <img width="80" height="100" src="{{ route('productImageShow', [
                                            'id' => $product->id,
                                            'fileName' => $product->images->last()->name ?? 'default.jpg',
                                        ]) }}" alt="{{ $product->name }}">
                                @endif
                            </a>
                            </div>   
                            <div class="title-name">
        						<h2 class="name">
        						    <a class="name-product" title="{{ $product->name }}" href="{{ route('web.product.show', $product->slug) }}"
        						    >{{ $product->name }}
        						    </a>
        						 </h2>
        						<p>Mã sản phẩm: <span>{{ $product->sku }}</span></p>
        						@if(!empty($item['size']))
                                    <p>Size: <span>{{$item['size']}}mm</span></p>
                                @else
                                @endif
        					</div>
                            </td>
                            <td style="text-align: center;">
                                <div class="price"> {{number_format($item->price )}} VNĐ</div>
                            </td>
                            <td style="text-align: center;">{{$item->quantity}}</td>
                            <td style="text-align: center;">
                                <div class="price"> {{ number_format($item['price'] * $item['quantity']) }} VNĐ</div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="frame-large-body-mobile clearfix">
                   <div class="list-product-oder">
                      <div class="title-img">
                         <a href="https://xwatch.vn/dong-ho-nam/og35861amr-gl-p957506.html"> 
                         <img width="80" height="100" src="https://xwatch.vn/images/products/2021/06/03/resized/ogival-og35861amr-gl_1622714219.jpg" alt="Đồng hồ Ogival OG358.61AMR-GL">
                         </a> 
                      </div>
                      <div class="title-name">
                         <h2 class="name"><a class="name-product" title="" href="https://xwatch.vn/dong-ho-nam/og35861amr-gl-p957506.html">Đồng hồ Ogival OG358.61AMR-GL</a></h2>
                         <p>Mã sản phẩm: <span>OG358.61AMR-GL</span></p>
                         <p>
                         </p>
                         <p>Đơn giá: <span class="price">17.663.000VNĐ</span></p>
                         <p>Số lượng: <span>1</span></p>
                      </div>
                      <div class="clear"></div>
                   </div>
                   <div class="clear"></div>
                </div>
                <div class="bottom">
                    <p>Tổng tiền: <span>{{number_format($dataOrder->total_price )}}</span></p>
                    <div class="clear"></div>
                </div>
                <div class='clear'></div>
            </div>


            <div class='clear'></div>
            <div class="products-cart-info">
                <h3 class="title">Thông tin đặt hàng</h3>
                <div class='shopping_buyer_saller'>
                    <table class="info-customer-gh" width="100%">
                        <div class="form-item form-item-customer">
                            <h4 class="title-steps">I.Thông tin khách hàng</h4>
                            <div class="tabl-info-customer">
                                <div class="customer-item">
                                    <div class='lable'><span>Tên người đặt hàng</span>
                                    </div>
                                    <div class='value'>{{ $dataOrder->affiliate_user }}</div>
                                    <div class="clear"></div>
                                </div>
                               
                                <div class="customer-item">
                                    <div class='lable'><span>Địa chỉ</span></div>
                                    <div class='value'> {{ $dataOrder->address }}, {{ $ward }},
                                        {{ $district }},{{ $province }}</div>
                                    <div class="clear"></div>
                                </div>
                                <div class="customer-item">
                                    <div class='lable'><span>Email</span></div>
                                    <div class='value'>{{ $dataOrder->email }}</div>
                                    <div class="clear"></div>
                                </div>
                                <div class="customer-item">
                                    <div class='lable'><span>Số Điện thoại</span></div>
                                    <div class='value'>{{ $dataOrder->phone_number }}</div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- <div class="form-item form-item-pay">
                               <h4 class="title-steps">II.Hình thức thanh toán</h4>
                               <div class="item-pay">
                          </div>
                          </div> -->
                        <!-- <div class="form-item form-item-order">
                               <h4 class="title-steps">II.Hình thức nhận</h4>
                               <div class="item-pay">
                          </div> -->
                    </table>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </div>
<script>
    window.onload = function () {
    alert(Đơn hàng của bạn đã được gửi đi. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất. Xin cảm ơn!);
    }
    // var myAlert = alert(Đơn hàng của bạn đã được gửi đi. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất. Xin cảm ơn!);
    // setTimeout(function() {
    //  myAlert.close();
    // }, 3000);

</script>
@stop

