@extends('admin.layouts.app')
@section('content')
<div class="clearfix">
    <div class="content-header">
        <h1>Cài Đặt Google Analytics</h1>
    </div>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <form action="{{ route('settings.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="google_analytics_code">Nhập mã Google Analytics</label>
                        <textarea id="google_analytics_code" name="google_analytics_code" class="form-control" rows="4">{{ old('google_analytics_code', $googleAnalyticsCode ?? '') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection