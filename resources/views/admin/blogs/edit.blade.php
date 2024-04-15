@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sửa tin tức
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($blogData, ['route' => ['blog.update', $blogData->id], 'method' => 'patch',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.blogs.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
