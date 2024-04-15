@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Logo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'logo.store',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.logo.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
