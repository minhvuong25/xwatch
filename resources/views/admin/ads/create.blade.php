@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin Quảng Cáo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::open(['id' => 'adsForm', 'route' => 'ads.store', 'enctype' => 'multipart/form-data']) !!}

                    @include('admin.ads.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
