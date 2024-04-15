@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Top Products Category</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('topProductCat.create') }}">Thêm mới</a>
        </h1>
    </section>
    <div class="clearfix"></div>
    <div class="box box-primary">
        <form action="" method="get">
        <div class="box-body">
            <div class="form-group col-sm-3">
                {!! Form::label('category_id', 'Category Id:') !!}
                <select class="form-control" name="category_id" onchange="this.form.submit()">
                    <option value="0">All</option>
                    @foreach($categories as $val)
                        <option @if(request()->get('category_id') == $val["id"]) selected @endif value="{{$val["id"]}}">
                            @if($val["level"] == 1){{"----"}}@endif
                            @if($val["level"] == 2){{"------"}}@endif
                            {{$val["name"]}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 pull-right text-right">
                <button type="submit" class="btn btn-success" style="margin-top: 25px">Tìm kiếm</button>
            </div>
        </form>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.top_products_cats.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

