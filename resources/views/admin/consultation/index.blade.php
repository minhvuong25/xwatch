@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Danh sách tư vấn khách hàng</h1>
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('consultation.create') }}">Thêm mới</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    <form action="">
                    <label>Tìm kiếm số điện thoại</label>
                    <input type="text" value="{{request()->get('search')}}" placeholder="Số điện thoại.." name="search"
                        class="form-control">
                    <div class="col-md-3 pull-right text-right">
                        <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.consultation.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

