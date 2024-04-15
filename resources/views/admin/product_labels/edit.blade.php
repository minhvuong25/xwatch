@extends('admin.layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            Nhãn sản phẩm
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productLabel, ['route' => ['productLabels.update', $productLabel->id], 'method' => 'patch']) !!}

                        @include('admin.product_labels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection