@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Best Seller
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('product_best_sellers.show_fields')
                    <a href="{{ route('productBestSellers.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
