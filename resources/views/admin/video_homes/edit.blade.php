@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Video Home
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($videos, ['route' => ['videoHome.update', $videos->id], 'method' => 'patch',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.video_homes.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
