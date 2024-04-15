@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm Sản phẩm
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                 @include('flash::message')

                    {!! Form::open(['route' => 'products.store', "enctype" => "multipart/form-data"]) !!}

                        @include('admin.products.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
