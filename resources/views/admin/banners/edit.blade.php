@extends('admin.layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            Banner
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($banner, ['id' => 'banners','route' => ['banners.update', $banner->id], 'method' => 'patch', "enctype" => "multipart/form-data"]) !!}

                        @include('admin.banners.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection