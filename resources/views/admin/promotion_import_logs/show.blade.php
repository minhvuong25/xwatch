@extends('admin.layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            Promotion Import Log
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.promotion_import_logs.show_fields')
                    <a href="{{ route('promotionImportLogs.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
