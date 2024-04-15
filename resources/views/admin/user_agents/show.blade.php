@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Agent
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.user_agents.show_fields')
                    <a href="{{ route('userAgents.index') }}" class="btn btn-default">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
