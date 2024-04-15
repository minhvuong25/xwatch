@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Danh sách đơn hàng</h1>
        {{-- <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('orders.create') }}">Thêm mới</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                <div class="clearfix">
                    <form class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Từ ngày:</label>
                                <input id="time_start" type="text" name="time_start"
                                       class="form-control datetimepicker" value=""
                                       >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Đến ngày:</label>
                                <input id="time_end" type="text" name="time_end"
                                       class="form-control datetimepicker"
                                       >
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tình trạng đơn hàng</label>
                            {!! Form::select('payment_status',array(''=>'Tất cả',\App\Models\Orders::ORDER_PAYMENT_STATUS_IS_COMPLETE => "Đã Thanh Toán",
                            \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_PENDING => "Chưa Thanh Toán",
                            \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_FALSE=> "Thanh Toán Lỗi")
                            ,Request::input('payment_status'),array('class'=>'form-control')) !!}

                        </div>
                        <div class="form-group col-md-3">
                            <label>Phương thức thanh toán</label>
                            {!! Form::select('payment_method',array(''=>'Tất cả',\App\Models\Orders::ORDER_PAYMENT_METHOD_IS_COD => "Thanh toán khi nhận hàng",
                            \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_VNP => "Thanh toán qua chuyển khoản",
                        )
                            ,Request::input('payment_method'),array('class'=>'form-control')) !!}
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label>IpAddress</label>
                                <input id="" type="text" name="ipaddress" value="{{request()->ipaddress}}"
                                       class="form-control "
                                >
                            </div>
                        </div> --}}
                        <div class="col-md-3  text-left" style="padding-top:28px">
                            <a href="{{route("export-order",["time_start"=>request()->time_start,"time_end"=>request()->time_end,"payment_status"=>request()->payment_status,"payment_method"=>request()->payment_method])}}" class="btn btn-primary">
                                Xuất ra Excel
                            </a>
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                        </div>
                    </form>

                </div>
                <div class="clearfix"></div>
                <div class="clearfix">
                    <div class="bota_count">Tổng số có : <strong style="color: red;">{{$count}}</strong> đơn hàng</div>
                    <div class="table-reponsive">
                       <div class="table-responsive">
                           <table class="table table-bordered ">
                               <thead>
                               <tr>
                                   <th class="text-center">STT</th>
                                   <th>Thông tin đơn hàng</th>
                                   <th>Thông tin giao hàng</th>
                                   <th>Danh sách sản phẩm</th>
                                   <th>Trạng thái thanh toán</th>
                                   <th>Hình thức thanh toán</th>
                                   <th>Địa chỉ</th>
                                   <th>Hành động</th>
                               </tr>
                               </thead>
                               <tbody>
                               @php
                                    $index = 1; 
                                @endphp
							   <?php $totalAmount = 0; ?>
                               @foreach($orders as $order)
                                   <tr>
                                       <td class="text-center">{{ $index }}</td>
                                       <td>
                                           <p>
                                               Giá trị đơn hàng:
                                               <strong>
                                                {{number_format($order->total_price, 0 , '.', '.') }}đ
                                               </strong>
                                           </p>
                                           <p></p>
                                           <p>Ngày tạo: {{\App\Helper\FuncLib::fomatTime($order->created_at)}}</p>

                                           {{-- @if ($order->order_status == \App\Models\Orders::ORDER_STATUS_IS_PENDING)
                                               <p class="blue">Đơn hàng mới</p>
                                           @endif --}}
                                       </td>
                                       <td>
                                           <p>Mã vận đơn: {{$order->order_code ?? ''}}</p>
                                           <p>Tên người nhận: {{$order->affiliate_user}}</p>
                                           <p>Điện thoại: <strong class="color_1">{{($order->phone_number)}}</strong>
                                           </p>
                                           {{-- <p>Địa chỉ: {{ $order->address }}</p> --}}
                                       </td>
                                       <td>
                                           @foreach($order->items as $item)
                                               <div style="margin-bottom: 10px">
                                                   <div>[SKU: {{$item->product->sku ?? ''}}] </div>
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
                                               <p class="label btn-primary">Thanh toán qua chuyển khoản</p>
                                        
                                           @else
                                               <p class="label btn-info">Thanh toán khi nhận hàng</p>
                                           @endif
                                       </td>
                                       @php
                                        $province = \App\Models\Province::find($order->province_id)->name;
                                         $district = \App\Models\District::find($order->district_id)->name;
                                         if($order->ward_id !== null)
                                         $ward = \App\Models\Wards::find($order->ward_id)->name;
                                       @endphp
                                       <td>{{ $order->address ?? '' }}, {{ $ward ?? ''}},
                                        {{ $district }},{{ $province }}</td>
                                       <td>
                                           <div>
                                               <a style="width: 100%" class="btn-sm btn btn-default "
                                                  href="{{route('orders.show', ['order' => $order->id])}}">
                                                   Xem chi tiết
                                               </a>
                                           </div>
                                           <div>
                                               <a style="width: 100%" class="btn-sm btn btn-default "
                                                  href="{{route('orders.edit', ['order' => $order->id])}}">
                                                   Cập nhật đơn hàng
                                               </a>
                                           </div>
                                           @if($order->payment_status == \App\Models\Orders::ORDER_PAYMENT_STATUS_IS_FALSE)
                                           <div>
                                     
                                            {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                                            {!! Form::button('<a class="btn-sm btn btn-danger" style="width: 100%">Xóa đơn hàng</a>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'onclick' => "return confirm('Are you sure?')",
                                            ]) !!}
                                            {!! Form::close() !!}
                                         
                                           </div>
                                           @endif
                                       </td>
                                   </tr>
                                @php
                                    $index++; 
                                @endphp
                               @endforeach
                               </tbody>
                           </table>
                       </div>
                        <div>
                            {{$orders->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        {{--document.getElementById('time_start').value = "<?php if(isset($_GET['time_start'])) {echo $_GET['time_start'];} else{echo date('Y-m-d', time());}?>";--}}
        document.getElementById('time_start').value = "<?php if(isset($_GET['time_start'])) echo $_GET['time_start'];?>";
        document.getElementById('time_end').value = "<?php if(isset($_GET['time_end'])) echo $_GET['time_end'];?>";
        var currentDate = new Date();
        var currentDateTimeString = currentDate.toISOString().slice(0, 19).replace('T', ' ');
        document.getElementById('time_start').value = currentDateTimeString;
        document.getElementById('time_end').value = currentDateTimeString;
      </script>
@endsection

