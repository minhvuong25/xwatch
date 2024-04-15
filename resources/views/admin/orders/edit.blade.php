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
                        <div class="clearfix">
                            {{-- <div class="col-md-4">
                                <form action="{{route('addCart')}}" method="post" style="margin-bottom: 0px">
                                    {!! csrf_field() !!}
                                    <div class="from-group">
                                        <label>Nhập mã sảm phẩm:</label>
                                        <input type="text" name="sku" autofocus class="form-control" value=""
                                               placeholder="Nhập mã sản phẩm">
                                    </div>
                                </form>
                            </div> --}}
                            <div class="col-md-6 pull-right">
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
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="createOrder" action="{{ route('admin.order.postUpdate', ['id' => $order->id]) }}"
                            method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <div class="order_page">
                                <div class="clearfix">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="">Phương thức thanh toán</label>
                                            {!! Form::select(
                                                'payment_method',
                                                [
                                                    \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_COD => 'Thanh Toán Tại Nhà',
                                                    \App\Models\Orders::ORDER_PAYMENT_METHOD_IS_VNP => 'Thanh toán qua chuyển khoản',
                                                ],
                                                Request::input('payment_method'),
                                                ['class' => 'form-control'],
                                            ) !!}
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Trạng thái giao dịch:</label>
                                            <select name="payment_status" class="form-control">
                                                <option value="1">Chờ thanh toán</option>
                                                <option value="2">Đã thanh toán</option>
                                                <option value="-1">Hủy đơn hàng</option>
                                            </select>
                                        </div>

                                        {{-- <div class="form-group col-md-3">
                                            <label> Số tiền thực nhận:</label>
                                            <input name="real_amount" class="form-control"
                                                   value="">
                                        </div> --}}
                                        <div class="clearfix"></div>

                                        <div class="form-group col-md-3">
                                            <label> Họ và Tên Khách hàng:</label>
                                            <input name="affiliate_user" class="form-control"
                                                value="{{ $order->affiliate_user }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label> Số điện thoại khách hàng</label>
                                            <input type="text" class="form-control" name="phone_number"
                                                value="{{ $order->phone_number }}">
                                        </div>

                                        {{-- <div class="form-group col-md-3">
                                            <label for="province"> Chọn tỉnh thành/Thành phố:</label>
                                            <select id="provinceData" onchange="showDistrict()" name="province_id" class="form-control">
                                                <option value="">-- Chọn tỉnh thành --</option>
                                                @foreach ($province as $province)
                                                    <option value="{{ $province->province_id }}">
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label> Chọn Quận/Huyện:</label>
                                            <select id="districtData" onchange="showWards()" name="district_id" class="form-control">
                                                <option value="">-- Chọn quận huyện --</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label> Chọn Xã phường:</label>
                                            <select id="wards" name="ward_id" class="form-control">
                                                <option value="">-- Chọn xã phường --</option>
                                            </select>
                                        </div> --}}

                                        <div class="form-group col-md-3">
                                            {!! Form::label('province_id', 'Chọn Tỉnh Thành:') !!}
                                            <label class="checkbox-inline">
                                                {!! Form::hidden('province_id', 0) !!}
                                            </label>
                                            <select name="province_id" class="form-control">
                                                @foreach ($provinces as $key => $value)
                                                    <option
                                                        @if (isset($order) && $order->province_id == $value->province_id) {{ 'selected' }}
                                                           value="{{ $value->province_id }}">{{ $value->name }}</option> @endif
                                                        value="{{ $value->province_id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            {!! Form::label('district_id', 'Chọn Quận/Huyện:') !!}
                                            <label class="checkbox-inline">
                                                {!! Form::hidden('district_id', 0) !!}
                                            </label>
                                            <select name="district_id" class="form-control">
                                                @foreach ($districs as $key => $value)
                                                    <option
                                                        @if (isset($order) && $order->district_id == $value->district_id) {{ 'selected' }}
                                                           value="{{ $value->district_id }}">{{ $value->name }}</option> @endif
                                                        value="{{ $value->district_id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            {!! Form::label('wards_id', 'Chọn Xã/Phường:') !!}
                                            <label class="checkbox-inline">
                                                {!! Form::hidden('wards_id', 0) !!}
                                            </label>
                                            <select name="wards_id" class="form-control">
                                                @foreach ($wards as $key => $value)
                                                    <option
                                                        @if (isset($order) && $order->ward_id == $value->wards_id) {{ 'selected' }}
                                                           value="{{ $value->wards_id }}">{{ $value->name }}</option> @endif
                                                        value="{{ $value->wards_id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Địa chỉ:</label>
                                            <textarea class="form-control" name="address" placeholder="Địa chỉ: Số nhà - Đường - Xã - Phường - Thị trấn">{{ $order->address ??''}}</textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Ghi chú Quản trị:</label>
                                            <textarea autocomplete="off" class="form-control" name="note" placeholder="Ví Dụ: Yêu cầu nhân viên liên hệ lại cho khách hàng !">{{ $order->note ??''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix">
                                <div style="border-bottom: 1px solid #E6E9ED;margin-bottom: 20px;">
                                    <div style="border-right: 1px solid #E6E9ED;">
                                        <strong>Thông tin về sản phẩm</strong>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div>
                                            <style>
                                                .table>thead>tr>th {
                                                    border-bottom: 1px;
                                                }
                                            </style>
                                            <table class="table" style="font-size: 13px">
                                                <thead>
                                                    <tr style="font-size: 14px">
                                                        <th>STT</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Giá</th>
                                                        {{-- <th>Giá sau giảm</th> --}}
                                                        <th>Số lượng</th>
                                                        {{-- <th>Tồn kho</th> --}}
                                                        {{-- <th>Hành động</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody style="margin-top: -1px">
                                                    <?php $totalAmount = 0;
                                                    $i = 1; ?>
                                                    <?php foreach($order->items as $value) :?>
                                                    <?php $totalAmount += $value->price * $value->quantity; ?>
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td style="font-size: 13px">
                                                            {{ $value->product->name ??''}}
                                                        </td>

                                                        <td>
                                                            <strong class="color_1">
                                                                {{ number_format($value->price, 0, ',', '.') }}đ
                                                            </strong>
                                                        </td>

                                                        <td>
                                                            {{ $value->quantity }}
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                            <div class="order-infor"
                                                style="margin-top: 30px;border-top: 1px solid #dbdbdb;padding-top: 10px">
                                                <div class="text-right" style="font-size: 15px">Tổng giá trị hàng hóa:
                                                    <strong class="color_1">
                                                        {{ $totalAmount }}đ
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3 pull-right">
                                    <div class="row">
                                        <div class="from-group" style="margin-top: 30px">
                                            <button class="form-control btn btn-info" type="submit">Hoàn thành</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        alert(eewewq);

        function showDistrict() {
            var provinceId = $('#provinceData').val();
            console.log(provinceId);
            if (provinceId) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{!! route('cart.postDistrict') !!}',
                    type: "post",
                    dataType: "json",
                    data: {
                        provinceId: provinceId
                    },
                    success: function(data) {
                        $('#districtData').empty();
                        $.each(data, function(key, value) {
                            $('#districtData').append('<option value="' + value.district_id + '">' +
                                value.name + '</option>');

                        });
                        $('#districtData').prepend('<option value="" selected>-- Chọn quận huyện --</option>');

                    }
                });
            } else {
                $('#districtData').empty();
            }
        }

        function showWards() {
            var districtID = $('#districtData').val();
            console.log(districtID);
            if (districtID) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{!! route('cart.postWards') !!}',
                    type: "post",
                    dataType: "json",
                    data: {
                        districtID: districtID
                    },
                    success: function(data) {
                        $('#wards').empty();
                        $.each(data, function(key, value) {
                            $('#wards').append('<option value="' + value.wards_id + '">' + value.name +
                                '</option>');
                        });
                        $('#wards').prepend('<option value="" selected>-- Chọn xã phường --</option>');
                    }
                });
            } else {
                $('#wards').empty();
            }
        }

        $(document).ready(function() {
            $("#createOrder").on('submit', function(event) {
                return confirm("Bạn có thật sự muốn tạo đơn hàng. Bấm Ok để tiếp tục");
            });
        });
    </script>
    @endpush
@endsection
