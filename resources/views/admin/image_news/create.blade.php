@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ảnh khung tin tức
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'imageNew.store',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.image_news.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
