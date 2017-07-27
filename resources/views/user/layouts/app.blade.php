<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<title>@yield('title')</title>
	@include('user.layouts.head')
</head>
<body>
@include('user.layouts.header')

@section('content')

@show

@include('user.layouts.footer')
</body>
</html>