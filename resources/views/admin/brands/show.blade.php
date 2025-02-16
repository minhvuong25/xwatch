@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Brand
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.brands.show_fields')
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
