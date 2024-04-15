@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Dashboard</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="small-box bg-info bg-red">
                                <div class="inner">
                                    <h3>{{number_format($totalEarning , 0 , '.', '.')}} VND</h3>
                                    <p>Tổng doanh thu</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <a href="#" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>{{ $orders }}</h3>
                                    <p>Đơn hàng mới</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="/admin/orders" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-12">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>{{ $newUser }}</h3>
                                    <p>Khách hàng mới</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div><!-- end row -->
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Đơn hàng mới</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr style="font-size: 14px">
                                    <th>STT</th>
                                    <th>Thông tin đơn hàng</th>
                                    <th>Thông tin giao hàng</th>
                                    <th>Danh sách sản phẩm</th>
                                    <th>Trạng thái thanh toán</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            @php
                            $count = 1;
                        @endphp
                            <tbody style="margin-top: -1px">
                                <?php $totalAmount = 0; ?>
                                @foreach ($lastOrders as $order)
                                    <tr>

                                        <td style="font-size: 13px">{{ $count++ }}</td>
                                        <td style="font-size: 13px">
                                            <p>
                                                Giá trị đơn hàng:
                                                <strong>
                                                    {{number_format($order->total_price, 0 , '.', '.') }}đ
                                                </strong>
                                            </p>
                                            <p>Ngày tạo: {{\App\Helper\FuncLib::fomatTime($order->created_at)}}</p>

                                            {{-- @if ($order->status == \App\Models\Orders::ORDER_STATUS_IS_PENDING)
                                                <p class="blue">Đơn hàng mới</p>
                                            @endif --}}
                                        </td>
                                        <td style="font-size: 13px">
                                            <p>Điện thoại: <strong class="color_1">{{ $order->phone_number }}</strong>
                                            </p>
                                            <p>Địa chỉ: {{ $order->address }}</p>
                                        </td>
                                        <td style="font-size: 13px">
                                            @foreach ($order->items as $item)
                                                <div style="margin-bottom: 10px">
                                                    <div>[SKU: {{ $item->product->name ?? '' }}]</div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($order->payment_status == \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_PENDING)
                                                <p class="label  btn-warning">Đơn hàng chưa thanh toán</p>
                                            @elseif ($order->payment_status == \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_COMPLETE)
                                                <p class="label btn-success">Đơn hàng đã thanh toán</p>
                                            @elseif ($order->payment_status == \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_FALSE)
                                                <p class="label btn-danger">Đơn hàng thất bại</p>
                                                @elseif ($order->payment_status == "")
                                                <p class="label btn-info">Đơn hàng chưa xét duyệt</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->payment_method == \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_COD)
                                                <p class="label  btn-warning">Thanh toán khi nhận hàng</p>
                                            @elseif ($order->payment_method == \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_VNP)
                                                <p class="label btn-primary">Thanh toán qua Chuyển khoản</p>
                                            @else
                                                <p class="label btn-info">Thanh toán qua Chuyển khoản</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                <a style="width: 100%" class="btn-sm btn btn-default "
                                                    href="{{ route('orders.show', ['order' => $order->id]) }}">
                                                    Xem chi tiết
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
