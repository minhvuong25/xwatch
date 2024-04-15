@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Top Products</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('topProducts.create') }}">Thêm mới</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form class="search-product" action="" method="get">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Group</label>
                            {!! Form::select('group', \App\Models\TopProduct::makeSelect(), Request::input('group'), ['class'=>'form-control']) !!}
                        </div>

                        <div class="col-md-3 pull-right text-right">
                            <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <div class="box-body">
                    @include('admin.top_products.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

