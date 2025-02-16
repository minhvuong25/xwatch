@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Địa chỉ
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['storeAddresses.store'], "enctype" => "multipart/form-data"]) !!}

                    @include('admin.store_address.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

