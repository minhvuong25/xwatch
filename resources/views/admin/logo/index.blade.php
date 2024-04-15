@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Logo</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                href="{{ route('logo.create') }}">Thêm mới</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.logo.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
@section('script')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
        function UpdateStatus(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                method: "GET",
                url: "{{ route('admin.logo.UpdateLogo') }}",
                data: {
                    status: $('#customSwitch3').val(),
                    id: e,

                },
            });
        }
    </script>
