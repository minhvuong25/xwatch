@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
        Warranty Home
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($warranty, ['route' => ['warranty.update', $warranty->id], 'method' => 'patch',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.warranty.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
