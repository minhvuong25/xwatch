<head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@if (!empty($category)) {{ $category->name }} - @endif @yield('title') </title>
    @yield('meta')
    <!-- Css -->
    <link href="{!! asset('statics/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('statics/plugins/fancybox/jquery.fancybox.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('statics/css/style.css?v=6.1') !!}" rel="stylesheet">
    <script src="{!! asset('statics/scripts/jquery.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('statics/scripts/owl.carousel.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('statics/scripts/bootstrap.bundle.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('statics/plugins/fancybox/jquery.fancybox.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('statics/scripts/jquery.mmenu.all.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('statics/scripts/jquery.mCustomScrollbar.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('statics/scripts/js_custom.js?v=2.5') !!}" type="text/javascript"></script>
    <script src="{!! asset('statics/scripts/jquery.validate.min.js') !!}" type="text/javascript"></script>
    <!-- End Css -->
</head>
