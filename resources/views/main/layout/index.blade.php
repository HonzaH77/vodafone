<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('main.components.imports')
</head>
<body id="page-top">

@include('main.components.header')

@yield('content')

@include('main.components.main-picture')

@include('main.components.footer')
</body>

</html>

