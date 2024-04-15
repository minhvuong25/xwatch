@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
         Thêm Khách hàng nói về chúng tôi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'customerSays.store',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.customer_say.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
