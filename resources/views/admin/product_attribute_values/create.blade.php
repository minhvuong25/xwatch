@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Code sản phẩm khách hàng.
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productAttributeValues.store']) !!}

                        @include('admin.product_attribute_values.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
