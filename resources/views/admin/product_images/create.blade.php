@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Image
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productImages.store']) !!}

                        @include('admin.product_images.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
