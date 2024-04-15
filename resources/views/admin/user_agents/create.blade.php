@extends('admin.layouts.app')


@section('content')
    <section class="content-header">
        <h1>
            User Agent
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'userAgents.store']) !!}

                        @include('admin.user_agents.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
