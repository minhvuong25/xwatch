@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category Brand
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.category_brands.show_fields')
                    <a href="{{ route('categoryBrands.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
