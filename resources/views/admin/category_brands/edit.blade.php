@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Danh mục thương hiệu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoryBrand, ['route' => ['categoryBrands.update', $categoryBrand->id], 'method' => 'patch']) !!}

                        @include('admin.category_brands.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
