<!DOCTYPE html>
<html>
<head>
 <title>@yield('title')</title>
 @include('admin.layouts.head')
 @stack('css')
</head>

@include('admin.layouts.header')

@include('admin.layouts.sidebar')  

@section('conetent')

@show  

@include('admin.layouts.footer')
@include('admin.layouts.foot')
@stack('js')
</body>
</html>
