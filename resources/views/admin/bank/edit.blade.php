@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
      
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($bank, ['route' => ['bank.update', $bank->id], 'method' => 'patch']) !!}
                    @include('admin.bank.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
