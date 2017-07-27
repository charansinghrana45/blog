<!DOCTYPE html>
<html>
<head>
 <title>@yield('title')</title>
 @include('admin.layouts.head')
</head>

@include('admin.layouts.header')

@include('admin.layouts.sidebar')  

@section('conetent')

@show  

@include('admin.layouts.footer')
@include('admin.layouts.foot')
</body>
</html>
