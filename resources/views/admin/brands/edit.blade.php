@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thương hiệu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($brand, ['route' => ['brands.update', $brand->id], 'method' => 'patch', "enctype" => "multipart/form-data"]) !!}
                        @include('admin.brands.fields')
                   {!! Form::close() !!}
               </div>
           </div>

       </div>
   </div>
@endsection
