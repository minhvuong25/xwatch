@extends('admin.layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            Promotion Import Log
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($promotionImportLogs, ['route' => ['promotionImportLogs.update', $promotionImportLogs->id], 'method' => 'patch']) !!}

                        @include('admin.promotion_import_logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection