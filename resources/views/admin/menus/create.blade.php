@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tạo mới menu
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'menus.store']) !!}

                        @include('admin.menus.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
