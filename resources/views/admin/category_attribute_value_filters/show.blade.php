@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Category Attribute Value Filters
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.category_attribute_value_filters.show_fields')
                    <a href="{{ route('categoryAttributeValueFilters.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
