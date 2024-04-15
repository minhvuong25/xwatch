@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
        Sửa menu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($menu, ['route' => ['menus.update', $menu->id], 'method' => 'patch']) !!}

                        @include('admin.menus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
