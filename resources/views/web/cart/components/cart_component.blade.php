<div class="shopcart_product" data-url="{{route('cart.deleteCartItem')}}">
    <form action="https://xwatch.vn/gio-hang.html#" method="post" name="shopcart">
        <table width="100%" border="1" class="table update_cart_url" data-url="{{ route('cart.updateCart') }}"
            bordercolor="#DCDCDC" cellpadding="6">
            @if (isset($cart))

                <thead>
                    <tr class="head-tr">
                        <th class="th-column" width="6%">STT</th>
                        <th class="th-column" width="">Tên</th>
                        <th class="th-column" width="12%">Số lượng</th>
                        <th class="th-column don_gia_hide" width="18%">Đơn giá(VNĐ)</th>
                        <th class="th-column" width="18%">Tổng</th>
                        <th class="th-column" width="10%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $i = 1;
                        $total = 0;
                        $totalQty = 0;
                    @endphp
                    <!--  Product list -->
                    @foreach ($cart as $id => $item)
                        @php
                            $total += $item['price'] * $item['quantity'];
                            $totalQty += $item['quantity'];
                        @endphp
                        <tr>
                            {{-- <td class="center-column" align="center">1{{ $item->id }}</td> --}}
                            <td class="center-column" align="center"> {{ $i++ }}</td>
                            <td class="name-product" align="center">
                                @php
                                    $product = \App\Models\Product::find($id);
                                @endphp
                                <a href="{{ route('web.product.show', $product->slug) }}" title="">
                                    {{ $product->name }}
                                </a>
                                <a href="{{ route('web.product.show', $product->slug) }}" title="">
                                    @if ($product->images->first() === null)
                                        <img src="" alt="donghothinhvuong.bota.vn">
                                    @else
                                        <img width="80" height="100" alt="anh"
                                            src="{{ route('productImageShow', [
                                                'id' => $product->id,
                                                'fileName' => $product->images->last()->name ?? 'default.jpg',
                                            ]) }}">
                                    @endif
                                </a>
                                @if(!empty($item['size']))
                                    <p>Size {{$item['size']}}mm</p>
                                @else
                                @endif
                            </td>
                            <td align="center">
                                <input class="numbers-pro quantity" type="number" value="{{ $item['quantity'] }}"
                                    min="1" name="quantity_957117" size="8px">
                            </td>
                            <td class="price-product don_gia_hide" align="center">

                                <div class="price_km">
                                    <span class="price">{{ number_format($item['price'] , 0 , '.', '.') }}
                                        ₫</span>
                                </div>


                            </td>

                            <td class="total-price" align="center">
                                <span class="price">
                                    {{ number_format($item['price'] * $item['quantity'] , 0 , '.', '.' ) }}₫</span>
                            </td>
                            <td class="text-center">
                                {{-- xoa --}}
                                <a href="" data-id="{{$id}}"
                                    class="btn btn-primary cart_update"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                <a href="" data-id="{{$id}}" class="btn btn-danger cart_delete"><i class="fa fa-close" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
        </table>
        <div class="all-button-cart pull-left">
            <input class="button-cart" type="button" name="next_step" id="sub-next-buy"
                onclick="javascript:window.location = &#39;https://donghothinhvuong.bota.vn/filter;"
                value="◄ Tiếp tục mua hàng">
  
            <a href="{{ route('cart.deleteCart') }}" class="button-cart">Xóa Hết</a>
            <input class="button-cart" type="button" name="order" id="myButton" value="Thanh toán ►"
                >
        </div>

        <div class="total-price pull-right" align="right">
           Tổng:
            <span> {{ number_format($total , 0 , '.', '.') }} VNĐ </span>
            <input type="hidden" name="total_price" value="{{$total}}">
            <br>
            Tổng số sản phẩm :
            <span id="span-totalQty">{{ $totalQty }}</span>
            @php
            session()->put('totalQty', $totalQty);
            @endphp

        </div>
        @else
        <h1>Giỏ hàng hiện tại chưa có sản phẩm nào</h1>
        @endif
        <div class="clearfix"></div>
        <input type="hidden" name="Itemid" value="11">
        <input type="hidden" name="module" value="products">
        <input type="hidden" name="view" value="cart">
        <input type="hidden" name="task" value="ere_cal2" id="task">

    </form>
</div>
