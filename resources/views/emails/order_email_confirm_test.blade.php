<div class="bota_mail_page" style="text-align: center;background-color: #f5f5f5;">
    <div class="container"
        style="max-width: 600px;margin: auto;background: #fff;padding: 20px;border: 4px solid #b22222;">
        <p style="font-size: 16px; font-weight: bold;"> Thân gửi <strong
                style="color: #b22222;">{{ $order->affiliate_user }}</strong>,</p>
        Cảm ơn bạn đã đặt hàng tại <a href="https://donghothinhvuong.bota.vn" style="color: #b22222;">Donghothinhvuong</a>
        . Đơn hàng của bạn đã được tạo
        thành công. <br> Chúng tôi sẽ liên hệ xác nhận lịch giao hàng.
        <br>
        <br>
        Đơn đặt hàng của bạn: [#{{ $order->order_code }}]<br>
        Đặt hàng lúc {{ date('H:i:s', strtotime($order->created_at)) }} Ngày
        {{ date('d', strtotime($order->created_at)) }}
        Tháng {{ date('m', strtotime($order->created_at)) }} Năm {{ date('Y', strtotime($order->created_at)) }}
        <br>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width="300px">
                        <p>Thông tin thanh toán</p>
                        <p style="margin-bottom: 5px;margin-top: 10px;"><strong>Số điện thoại:
                            </strong>{{ $order->phone_number }}</p>
                        <p style="margin-bottom: 5px;margin-top: 10px;"><strong> Mã đơn hàng:
                            </strong>#{{ $order->order_code }}</p>
                        <p style="margin-bottom: 5px;margin-top: 10px;"><strong>Địa chỉ:
                            </strong>{{ $order->district->name }}, {{ $order->province->name }}</p>
                        <p style="margin-bottom: 5px;margin-top: 10px;"><strong>Khu vực: </strong>Việt Nam</p>
                    </td>
                    <td width="300px">
                        <p>Thông tin vận chuyển</p>
                        <p style="margin-bottom: 5px; "><strong>Số điện thoại: </strong> {{ $order->phone_number }}</p>
                        <p style="margin-bottom: 5px; "> <strong> Mã đơn hàng: </strong>#{{ $order->order_code }}</p>
                        <p style="margin-bottom: 5px;margin-top: 10px;"><strong>Địa chỉ:
                            </strong>{{ $order->district->name }}, {{ $order->province->name }}</p>
                        <p style="margin-bottom: 5px;margin-top: 10px;"><strong>Khu vực: </strong>Việt Nam</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table>
            <tbody>
                <tr>
                    <td width="300px">
                        <p><strong>Phương thức thanh toán: </strong></p>

                        @if ($order->payment_method == \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_COD)
                            <p>Thanh toán khi nhận hàng</p>
                        @else
                            <p>Thanh toán trực tuyến</p>
                        @endif
                    </td>
                    <td width="300px">
                        <p> <strong>Phương thức vận chuyển:</strong></p>
                        <p>Giao hàng Tận nơi</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="100%" cellpadding="4" cellspacing="0" border="0"
            style="border:1px solid #dee2e3;margin-top:18px;color:#000;margin-bottom: 30px;font-family: Arial; font-size: 12px;">
            <tbody>
                <tr bgcolor="#b22222" style="font-weight:bold;color:#fff">
                    <td align="center">Ảnh</td>
                    <td align="center">Tên sản phẩm</td>
                    <td align="center">Số lượng</td>
                    <td align="center">Đơn giá</td>
                    <td align="center">Thành tiền</td>
                </tr>
                <?php
                            $totalAmount = $totalQuantity = 0;
                            ?>
                @foreach ($order->items as $item)
                <tr>
                        <td> 
                            <a href="/" target="_blank"><img width="50px"
                                    src="{{ route('productImageShow', [
                                        'id' => $item->product->id,
                                        'fileName' => $item->product->images->first()->name ?? 'default.jpg',
                                    ]) }}"></a>
                        </td>
                        <td><a href="/" target="_blank">{{ $item->product->name ?? '' }}</a></td>
                        <td align="center" style="font-weight:bold;text-align:center">{{ $item->quantity }}</td>
                        <td style="white-space:nowrap;text-align:right">{{ $item->price }} đ</td>
                        <td style="white-space:nowrap;font-weight:bold;text-align:right">
                            {{ $item->price * $item->quantity }} đ</td>
                        <?php
                        $totalAmount += $item->price * $item->quantity;
                        ?>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" align="right" style="border-top:1px dotted #dee2e3">
                        <p style="padding:3px 0px;margin:0px">Chiết khấu</p>
                    </td>
                    <td align="right" style="border-top:1px dotted #dee2e3">
                        <p style="padding:3px 0px;margin:0px">0 đ</p>
                    </td>
                </tr>

                <tr>
                    <td colspan="4" align="right" style="border-top:1px dotted #dee2e3">
                        <p style="padding:3px 0px;margin:0px">Phí giao hàng</p>
                    </td>
                    <td align="right" style="border-top:1px dotted #dee2e3">
                        <p style="padding:3px 0px;margin:0px">Miễn phí</p>
                    </td>
                </tr>

                <tr>
                    <td colspan="4" align="right" style="border-top:1px dotted #dee2e3">
                        <p style="padding:3px 0px;margin:0px">Tổng giá trị đơn hàng</p>
                    </td>
                    <td align="right" style="border-top:1px dotted #dee2e3">
                        <p style="padding:3px 0px;margin:0px"><b style="color:#f53030">{{ $totalAmount }} đ</b></p>
                    </td>
                </tr>

            </tbody>
        </table>
        <div>
            <p style="margin: 7px 0;">
                <strong>
                    Thịnh Vượng Watch - Hệ thống bán lẻ đồng hồ uy tín chính hãng
                </strong>
            </p>
            <p style="margin: 7px 0;"> Hotline: <a href="tel:18002093">1800 2093</a> </p>
            <p style="margin: 7px 0;"> Email: cskh@thinhvuongwatch.com</p>
            <p style="margin: 7px 0;"> Website: <a href="www.thinhvuongwatch.bota.vn">www.thinhvuongwatch.bota.vn</a>
            </p>
        </div>
    </div>
</div>
