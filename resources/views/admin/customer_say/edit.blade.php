@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sửa Khách hàng nói về chúng tôi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customerSays, ['route' => ['customerSays.update', $customerSays->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

                        @include('admin.customer_say.field')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
