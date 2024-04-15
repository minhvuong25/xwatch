@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Quản lý liên hệ
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($contact, ['route' => ['contact.update', $contact->id], 'method' => 'patch']) !!}


                    @include('admin.contact.field')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
