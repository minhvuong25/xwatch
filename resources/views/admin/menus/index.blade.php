@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Quản lý menu</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('menus.create') }}">Thêm mới</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-4">
                    <h2><i class="fa fa-navicon"></i> Quản lý Menu trên</h2>
                    <div class="table-responsive">
                    <table class="table" id="menus-table">
                        <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th>Tên</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                        </thead>
                            <tbody>
                                @php
                                    $index = 1; 
                                @endphp
                                @foreach($menusTree as $key => $val)
                                    <tr>
                                        <td class="text-center">{{ $index }}</td>
                                        <td>
                                            @if($val["level"] == 1){{"----"}}@endif
                                            @if($val["level"] == 2){{"------"}}@endif
                                            <a href="{{ route('menus.edit', $val['id']) }}" class='btn btn-default btn-xs'>
                                                {{$val["name"]}}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a target="_blank" href="{{$val["url"]}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                            <a href="{{ route('menus.edit', $val['id']) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    </tr>
                                @php
                                    $index++; 
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2><i class="fa fa-navicon"></i> Danh sách Menu</h2>
                    @include('admin.menus.table')
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

