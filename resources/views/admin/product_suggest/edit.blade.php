@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Gợi ý sản phẩm
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productSuggest, ['route' => ['productSuggest.update', $productSuggest->id], 'method' => 'patch']) !!}

                        @include('admin.product_suggest.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
