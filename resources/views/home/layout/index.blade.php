<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    @include('main.component.imports')

</head>
<body id="page-top">

@include('home.component.header')

<section class="pt-4 vodafone_home-layout-index__home-section">
    <div class="container px-lg-5 vodafone_home-layout-index__container">
        <div class="row gx-lg-5 vodafone_home-layout-index__row">
            <div class="col-lg-6 col-xl-4 mb-5 vodafone_home-layout-index__col">
                <div class="card bg-light border-0 h-100 vodafone_home-layout-index__card">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0 vodafone_home-layout-index__card-body">
                        <a href="/projects">
                            <h2 class="fs-4 vodafone_home-layout-index__object-title">{{__('messages.projects')}}</h2>
                            <img src="{{asset("img/projects.png")}}" alt="Vodafone_icon" width="110" height="120">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 mb-5 vodafone_home-layout-index__col">
                <div class="card bg-light border-0 h-100 vodafone_home-layout-index__card">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0 vodafone_home-layout-index__card-body">
                        <a href="/tasks">
                            <h2 class="fs-4 vodafone_home-layout-index__object-title">{{__('messages.tasks')}}</h2>
                            <img src="{{asset("img/tasks.png")}}" alt="Vodafone_icon" width="110" height="120">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4 mb-5 vodafone_home-layout-index__col">
                <div class="card bg-light border-0 h-100 vodafone_home-layout-index__card">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0 vodafone_home-layout-index__card-body">
                        <a href="/users">
                            <h2 class="fs-4 vodafone_home-layout-index__object-title">{{__('messages.employees')}}</h2>
                            <img src="{{asset("img/employes.png")}}" alt="Vodafone_icon" width="130" height="120">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.component.footer')

</body>

</html>
