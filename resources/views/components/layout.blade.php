<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vodafone</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('/css/style.css') }}">
</head>
<body id="page-top">

<!-- Navigation-->
<nav class="navbar bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset("img/Vodafone_icon.png")}}" alt="Vodafone_icon" width="190" height="50">
        </a>
    </div>
</nav>

@yield('content')

<!-- Main Picture-->
<section>
    <div class="row">
        <img class='img-fluid w-100' src="{{asset("img/mainPicture.jpg")}}" alt="Main Picture"
             width="">

    </div>
</section>


<!-- Footer -->
<footer class="text-center text-white bg-light">
    <div class="container p-4">
        <section class="">
            <div class="row d-flex justify-content-center">
                <img class="align-content-center" src="{{asset("img/togetherWeCan.jpg")}}"
                     alt="Together We Can"
                     width="250" height="68">
            </div>
        </section>
    </div>
    <div class="text-center p-3 font-weight-bold" style="background-color: red;">
        © 2022 Copyright
    </div>
</footer>
</body>

</html>

