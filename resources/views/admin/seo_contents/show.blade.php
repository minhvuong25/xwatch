@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Nội dung Seo
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.seo_contents.show_fields')
                    <a href="{{ route('seoContents.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
