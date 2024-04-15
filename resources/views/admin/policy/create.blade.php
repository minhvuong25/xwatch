@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Điều khoản
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'policy.store',"enctype" => "multipart/form-data"]) !!}


                    @include('admin.policy.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
