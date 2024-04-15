@extends('admin.layouts.app')
@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="col-md-12" style="margin: 20px 0px">
                            <div class="row">
                                {{-- <div class="col-md-7">
                                    {!! Form::model($order, ['route' => ['admin.order.postUpdateOrder', $order->id], 'method' => 'post', "enctype" => "multipart/form-data"]) !!}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="orderId" value="{{$order->id}}">
                                        <div class="form-group col-md-7">
                                            <label>Cập nhật trạng thái đơn hàng:</label>
                                            <select id="order_status" name="order_status" class="form-control">
                                                @foreach(\App\Models\Orders::$orderStatus as $key => $name)
                                                    <option @if ($order->order_status == $key) @endif
                                                    value="{{$key}}">{{$name}}</option>
                                                @endforeach
                                            </select>
                                            <label style="margin-top: 25px;" for="order_note">Ghi chú đơn hàng:</label>
                                            <textarea name="note" id="" cols="55" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info form-control"
                                                        style="margin-top: 22px;">Cập nhật trạng thái đơn hàng
                                                </button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                </div> --}}
                                <div class="col-md-5 pull-right">
                                    @if ($errors->any())
                                        <div class="alert alert-danger" style="margin-bottom: 0px">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" style="margin-top: 0px">
                        <div style="border-bottom: 1px solid #E6E9ED;">
                            <div class="col-md-6" style="border-right: 1px solid #E6E9ED;padding: 10px">
                                <strong>Thông tin về sản phẩm</strong>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                    <style>
                                        .table > thead > tr > th {
                                            border-bottom: 1px;
                                        }
                                    </style>
                                    <table class="table">
                                        <thead>
                                        <tr style="font-size: 14px">
                                            {{-- <th>Ảnh</th> --}}
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody style="margin-top: -1px">
                                        <?php $totalAmount = 0; ?>
                                        @foreach($order->items as $value)
                                            <?php $totalAmount += $value->price_unit; ?>
                                            <tr>

                                                <td style="font-size: 13px">
                                                    <div>
                                                        {{$value->product->name ?? ''}}
                                                    </div>
                                                    <div> SKU:
                                                        <strong class="color_1">
                                                            {{$value->product->sku ?? ''}}
                                                        </strong>
                                                    </div>
                                                    <div>
                                                        @php $size = \App\Helper\FuncLib::convertString($value->size ?? '') @endphp
                                                        @if(isset($size))
                                                        Size: <strong> {{$size }}</strong>
                                                        @else
                                                       @endif
                                                    </div>
                                                    <div>
                                                        Số lượng: <strong>{{$value->quantity}}</strong>
                                                    </div>
                                                </td>
                                                <td style="font-size: 13px">
                                                    <div> Giá:
                                                        <strong class="color_1">
                                                            {{number_format($value->price , 0, ',', '.')}}đ
                                                        </strong>
                                                    </div>

                                                    {{-- <div> Giá sau giảm:
                                                        <strong class="color_1">
                                                            {{number_format($value->price - $value->promotion_discount, 0, ',', '.')}}
                                                            đ
                                                        </strong>
                                                    </div> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="order-infor"
                                         style="margin-top: 30px;border-top: 1px solid #dbdbdb;padding-top: 10px">

                                         <div class="order-log">
                                            <label for="">Ghi chú quản trị :</label>
                                            <p>{{$order->note ?? ''}}</p>
                                            {{-- @foreach($ordernotes as $ordernote)
                                            <p> {{ $ordernote->user->name}} đã ghi chú: {{$ordernote->content}}</p>
                                            @endforeach
                                            <label for="">Log:</label>
                                            @foreach ($orderlogs as $orderlog)
                                                <p>{{$orderlog->user->name}} {{  $orderlog->content }}</p>
                                            @endforeach --}}
                                        </div>
                                        <div class="text-right" style="margin-top: 20px">
                                            <div>
                                                <div class="col-md-2 pull-right text-left">
                                                    <strong class="color_1">{{number_format($order->total_price, 0 , '.', '.') }}đ </strong>
                                                </div>
                                                <div class="col-md-5 pull-right">
                                                    Giá trị sản phẩm:
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        
                                      
                                    </div>
                                </div>
                                <div class="col-md-6" style="border-left: 1px solid #E6E9ED;padding-top: 10px">
                                    <table class="table table-bordered">
                                        <tbody style="margin-top: -1px">
                                        <tr>
                                            <td style="font-size: 13px">
                                                Mã đơn hàng
                                            </td>
                                            <td style="font-size: 13px">
                                                {{$order->order_code ?? ''}}
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-size: 13px">
                                                Trạng thái đơn hàng
                                            </td>
                                            <td style="font-size: 13px">

                                                @if ($order->status == \App\Models\Orders::ORDER_STATUS_IS_PENDING)
                                                    <p class="blue">Đơn hàng mới</p>
                                                @endif
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td style="font-size: 13px">
                                                Trạng thái thanh toán
                                            </td>
                                            <td style="font-size: 13px">
                                                @if ($order->payment_status == \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_PENDING)
                                                    <p class="label  btn-warning">Đơn hàng chưa thanh toán</p>
                                                @elseif ($order->payment_status == \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_COMPLETE)
                                                    <p class="label btn-success">Đơn hàng đã thanh toán</p>
                                                    @elseif ($order->payment_status == "")
                                                    <p class="label btn-info">Đơn hàng chưa xét duyệt</p>
                                                {{-- @elseif ($order->payment_status == \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_FAILS)
                                                    <p class="label btn-danger">Đơn hàng thất bại</p> --}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 13px">
                                                Hình thức thanh toán
                                            </td>
                                            <td style="font-size: 13px">
                                                @if ($order->payment_method == \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_COD)
                                                    <p class="label  btn-warning">Thanh toán khi nhận hàng</p>
                                                @elseif ($order->payment_method == \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_VNP)
                                                    <p class="label btn-primary">Thanh toán qua chuyển khoản</p>
                                              
                                                @else
                                                    <p class="label btn-info">Thanh toán khi nhận hàng</p>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 13px">
                                                Số tiền cần thanh toán
                                            </td>
                                            <td style="font-size: 13px">
                                                <strong class="color_1">
                                                    {{number_format($order->total_price, 0 , '.', '.') }}đ
                                                </strong>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-size: 13px">
                                                Số tiền thực nhận
                                            </td>
                                            <td style="font-size: 13px">
                                                <strong class="color_1">
                                                    {{($order->real_amount)}}đ
                                                </strong>
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td style="font-size: 13px">
                                                Tên người nhận
                                            </td>
                                            <td style="font-size: 13px">
                                                <strong>{{$order->affiliate_user}}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 13px">
                                                Số Điện thoại
                                            </td>
                                            <td style="font-size: 13px">
                                                <strong>{{($order->phone_number)}}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 13px">
                                                Địa chỉ :
                                            </td>
                                           
                                                @php
                                                $province = \App\Models\Province::find($order->province_id)->name;
                                                 $district = \App\Models\District::find($order->district_id)->name;
                                                 if($order->ward_id !== null)
                                                 $ward = \App\Models\Wards::find($order->ward_id)->name;
                                               @endphp
                                               <td style="font-size: 13px">{{ $order->address }}, {{ $ward ??'' }},
                                                {{ $district }},{{ $province }}</td>

                                        
                                        </tr>
                                        <tr>
                                            <td style="font-size: 13px">
                                                Ngày tạo
                                            </td>
                                            <td style="font-size: 13px">
                                                {{\App\Helper\FuncLib::fomatTime($order->created_at)}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 13px">
                                                Ghi chú khách hàng :
                                            </td>
                                            <td style="font-size: 13px">
                                                {{$order->description ?? ''}}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    @if ($order->status == \App\Models\Orders::ORDER_STATUS_IS_PENDING)
                                        <div class="col-md-6 pull-right">
                                            <div class="row">
                                                <div class="from-group" style="margin-top: 30px">
                                                    <a href="{{route('orders.edit', ['order' => $order->id])}}" class="form-control btn btn-info">
                                                        Sửa thông tin đơn hàng
                                                    </a>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
