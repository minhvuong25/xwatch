@extends('web.layouts.master')
@section('content')

    <div class="bota_body_center">
        <div class="bota_breadcrumb_main">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="/" title="Trang chủ">Trang chủ</a></li>
                    <li><span>Đơn hàng</span></a></li>
                </ul>
            </div>
        </div>
        <div class="bota_product_cart_page">
            <div class="container">
                @include('flash::message')
                @if (isset($cart) && count(session('cart')) > 0)
                    <form id="myForm" action="{{ route('addOrder') }}" method="POST">
                        @csrf
                        <div class="bota_product_cart" id="cart-empty">
                            <h1 class="bota_page_title">
                                <span>Mua nhanh thanh toán khi nhận hàng </span>
                            </h1>
                            <div class="bota_detail_inner">
                                {{-- gio hang --}}
                                <div class="bota_cart_wrapper">
                                    @include('web.cart.components.cart_component')
                                </div>

                                <h2 id="Thanhtoan"><span>Thông tin đặt hàng</span></h2>
                                <div class="bota_shopping_buyer_saller">
                                    <div id="msg_error"></div>
                                    <table class="info-customer-gh" width="100%" border="0" cellpadding="5">
                                        <tbody>
                                            <tr>
                                                <td><input placeholder="Họ tên (*)" type="text" name="affiliate_user"
                                                        id="sender_name" value="" class="input_text " size="30">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input placeholder="Điện thoại (*)" type="text" name="phone_number"
                                                        id="phoneCheck" value="" class="input_text" size="30">
                                                </td>
                                            </tr>
                                            {{-- chon tinh thanh --}}
                                            @php
                                                $province = \App\Models\Province::all();
                                            @endphp
                                            <tr>
                                                <td>
                                                    <select id="provinceData" onchange="showDistrict()" name="province_id">
                                                        <option value="">-- Chọn tỉnh thành --</option>
                                                        @foreach ($province as $province)
                                                            <option value="{{ $province->province_id }}">
                                                                {{ $province->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="districtData" onchange="showWards()" name="district_id">
                                                        <option value="">-- Chọn quận huyện --</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="wards" name="ward_id">
                                                        <option value="">-- Chọn xã phường --</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input placeholder="Địa chỉ ( Nhập số nhà, ngõ...)" type="text"
                                                        name="address" id="sender_address" value="" class="input_text"
                                                        size="30"></td>
                                            </tr>
                                            <tr>
                                                <td><input placeholder="Email" type="text" name="email"
                                                        id="sender_email" value="" class="input_text" size="30">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <textarea placeholder="Chú thích đơn hàng" name="description" id="sender_comments"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group col-md-3">
                                                        <h2 id=""><span>Phương thức thanh toán</span></h2>
                                                        <select id="mySelect" class="form-control" name = "payment_method">
                                                            <option value="1">Thanh Toán COD</option>
                                                            <option value="2">Thanh Toán qua chuyển khoản</option>
                                                        </select>
                                                    </div>
                                                    <div class="tab-pane fade show active" id="myDiv" role="tabpanel"
                                                        style="display: none">
                                                        <div>
                                                            {!! \App\Models\Bank::get()->last()->information ?? ''!!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Những có dấu (<font> * </font>) là bắt buộc phải nhập
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="test-info-next">
                                                    <button type="submit" id="addCart" class="button-step button-cart">
                                                        <span>
                                                            Xác Nhận Đặt Hàng
                                                        </span>
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr class="tr-show-payoo display_off">
                                                <td class="test-info-next">
                                                    <div id="installmentdetail"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
                    <h2>Giỏ hàng hiện tại chưa có sản phẩm nào !</h2>
                @endif
            </div>
        </div>
    @stop
    @section('script')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script>
            $(document).ready(function() {
                $('#mySelect').on('change', function() {
                    var selectedOption = $(this).val();

                    if (selectedOption === '1') {
                        $('#myDiv').hide();
                    }
                    if (selectedOption === '2') {
                        $('#myDiv').slideDown();
                    }
                });
            });
        </script>
        <script>
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
        </script>
        <script>
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
            //gio hang
            function cartUpdate(event) {
                event.preventDefault();
                let urlUpdateCart = $('.update_cart_url').data('url');
                let id = $(this).data('id');
                let quantity = $(this).parents('tr').find('input.quantity').val();
                // alert(quantity);
                $.ajax({
                    type: "GET",
                    url: urlUpdateCart,
                    data: {
                        id: id,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            $('.bota_cart_wrapper').html(data.cart_component);
                            alert('Cập nhật thành công');
                            
                        }
                    },
                    error: function() {

                    }
                })
            }

            function cartDelete(event) {
                event.preventDefault();
                let urlDelete = $('.shopcart_product').data('url');
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: urlDelete,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            $('.bota_cart_wrapper').html(data.cart_component);
                            alert('Xóa thành công');
                            if ( parseInt( $("#span-totalQty").text()) === 0 ) {
                                location.reload(true);
                            }
                        }
                    }
                })
            }

            $(function() {
                $(document).on('click', '.cart_update', cartUpdate);
                $(document).on('click', '.cart_delete', cartDelete);
            })
            //onclick
            $(document).ready(function() {
                $('#myButton').click(function() {
                    $('html, body').animate({
                        scrollTop: $('#Thanhtoan').offset().top
                    }, 500); // Thời gian di chuyển (ms)
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#myForm").submit(function(event) {
                    event.preventDefault();
                    if (validateForm()) {
                        this.submit();
                    }
                });

                function validateForm() {
                    $("#myForm").validate({
                        rules: {
                            affiliate_user: {
                                required: true
                            },
                            phone_number: {
                                required: true,
                                digits: true,
                                minlength: 10,
                                maxlength: 11
                            },
                            province_id: {
                                required: true
                            },
                            district_id: {
                                required: true
                            },
                            address: {
                                required: true
                            },
                            ward_id: {
                                required: true
                            },
                            email: {
                                required: true,
                                email: true
                            }
                        },
                        messages: {
                            affiliate_user: {
                                required: " Vui lòng nhập họ tên của bạn !",
                            },
                            phone_number: {
                                required: " Vui lòng nhập số điện thoại của bạn !",
                                digits: " Số điện thoại không hợp lệ !",
                                minlength: " Số điện thoại phải có ít nhất 10 ký tự !",
                                maxlength: " Số điện thoại không được quá 11 ký tự !"
                            },
                            province_id: {
                                required: " Vui lòng chọn tỉnh/thành phố !"
                            },
                            district_id: {
                                required: " Vui lòng chọn quận/huyện !"
                            },
                            address: {
                                required: " Vui lòng nhập địa chỉ của bạn !"
                            },
                            ward_id: {
                                required: " Vui lòng nhập xã của bạn !"
                            },
                            email: {
                                required: " Vui lòng nhập email của bạn !",
                                email: " Định dạng email không đúng !"

                            }
                        },
                        errorElement: "label",
                        errorPlacement: function(error, element) {
                            if (element.attr("name") == "affiliate_user" || element.attr("name") ==
                                "phone_number" ||
                                element.attr("name") == "province_id" || element.attr("name") ==
                                "district_id" ||
                                element.attr("name") == "address" || element.attr("name") == "ward_id" ||
                                element.attr("name") == "email") {
                                error.addClass("text-danger d-block mt-3 ");
                                error.insertAfter(element);
                                element.addClass("is-invalid border border-danger");
                            }
                        },

                        success: function(label) {
                            // label.removeClass("text-danger ");
                            label.prev().removeClass("is-invalid border border-danger");
                        }

                    });
                    return $("#myForm").valid();
                }
            });
        </script>
    @stop
