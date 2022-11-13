<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('main.component.imports')
</head>
<body id="page-top">

@include('main.component.header')

@yield('content')

@include('main.component.main-picture')

@include('main.component.footer')
</body>

</html>

