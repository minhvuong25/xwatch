@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
        Chế độ bảo hành
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'warranty.store',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.warranty.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
