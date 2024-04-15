@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Promotion
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.product_promotions.show_fields')
                    <a href="{{ route('productPromotions.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
