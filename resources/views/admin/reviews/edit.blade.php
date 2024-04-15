@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bài viết đánh giá
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($review, ['route' => ['reviews.update', $review->id], 'method' => 'patch']) !!}

                        @include('admin.reviews.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
