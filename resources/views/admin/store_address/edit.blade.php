@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sửa Địa chỉ cửa hàng
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($storeAddress, ['route' => ['storeAddresses.update', $storeAddress->id], 'method' => 'patch']) !!}


                    @include('admin.store_address.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
