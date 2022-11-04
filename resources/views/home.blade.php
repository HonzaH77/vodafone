<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js">
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
        @auth
            <span class="font-weight-bold">{{auth()->user()->username}}</span>
            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-lg btn-outline-secondary text-white font-weight-bold btn-bg-red"
                        type="submit">{{__('messages.logout')}}
                </button>
            </form>
        @else
            <form class="">
                <a class="btn btn-lg btn-outline-secondary text-white font-weight-bold btn-bg-red"
                   type="button" href="/login">{{__('messages.login')}}
                </a>
                <a class="btn btn-lg btn-outline-secondary text-white font-weight-bold btn-bg-red"
                   type="button" href="/register">{{__('messages.registration')}}
                </a>
            </form>
        @endauth


    </div>
    @include('components/language_switcher')
</nav>

<!-- Main Picture-->
<section>
    <div class="row">
        <img class='img-fluid w-100' src="{{asset("img/mainPicture.jpg")}}" alt="Main Picture" width="">
    </div>
</section>

<!-- Page Features-->
<section class="pt-4 bg-color-red">
    <div class="container px-lg-5">
        <div class="row gx-lg-5">
            <div class="col-lg-6 col-xl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <a href="/projects">
                            <h2 class="fs-4 font-weight-bold color-red" >{{__('messages.projects')}}</h2>

                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-collection"></i></div>
                            <img src="{{asset("img/projects.png")}}" alt="Vodafone_icon" width="110" height="120">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <a href="/tasks">
                            <h2 class="fs-4 font-weight-bold color-red" >{{__('messages.tasks')}}</h2>

                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-cloud-download"></i></div>
                            <img src="{{asset("img/tasks.png")}}" alt="Vodafone_icon" width="110" height="120">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <a href="/users">
                            <h2 class="fs-4 font-weight-bold color-red" >{{__('messages.employees')}}</h2>
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-cloud-download"></i></div>
                            <img src="{{asset("img/employes.png")}}" alt="Vodafone_icon" width="130" height="120">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center text-white bg-light">
    <div class="container p-4">
        <section class="">
            <div class="row d-flex justify-content-center">
                <img class="align-content-center" src="{{asset("img/togetherWeCan.jpg")}}" alt="Together We Can"
                     width="250" height="68">
            </div>
        </section>
    </div>
    <div class="text-center p-3 font-weight-bold bg-color-red" >
        © 2022 Copyright
    </div>
</footer>
</body>

</html>
