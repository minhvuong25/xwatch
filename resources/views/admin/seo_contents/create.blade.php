@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nội dung Seo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'seoContents.store']) !!}

                    @include('admin.seo_contents.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('scripts') --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script>
        $('#getEntity').select2();
        function getEntityData() {
            var entityType = $('#entity_type').val();
            console.log(entityType);
            $('#getEntity').html('');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('seocontent.getData')}}',
                type: 'post',
                data: {
                    entityType: entityType,
                    page: 5
                },
                dataType: 'json',
                success: function (res) {
                    var option = '';
                    if (res.status === 200) {
                        if (res.product) {
                            res.data.forEach(function (item, index) {
                                var value = item.id;
                                var name = item.name;
                                option += '<option value="'+ value +'">' + name +'</option>'
                            })
                            $('#getEntity').append(option);
                        }

                        if (res.brand) {
                            res.data.forEach(function (item, index) {
                                var value = item.id;
                                var name = item.name;
                                option += '<option value="'+ value +'">' + name +'</option>'
                            })
                            $('#getEntity').append(option);
                        }

                        if (res.category) {
                            res.data.forEach(function (item, index) {
                                var value = item.id;
                                var name = item.name;
                                option += '<option value="'+ value +'">' + name +'</option>'
                            })
                            $('#getEntity').append(option);
                        }
                        if (res.blog) {
                            res.data.forEach(function (item, index) {
                                var value = item.id;
                                var name = item.title;
                                option += '<option value="'+ value +'">' + name +'</option>'
                            })
                            $('#getEntity').append(option);
                        }

                    }

                }
            });
        }
    </script>
{{-- @stop --}}
