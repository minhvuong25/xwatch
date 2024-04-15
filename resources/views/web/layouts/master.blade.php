<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">
@include('web.layouts.head')
<body>
<div class="bota_body_main">
    @include('web.layouts.header')
    @yield('content')

    @yield('script')
    @include('web.layouts.footer')
</div>
</body>
</html>
