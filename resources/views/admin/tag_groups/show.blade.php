@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tag Group
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.tag_groups.show_fields')
                    <a href="{{ route('tagGroups.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
