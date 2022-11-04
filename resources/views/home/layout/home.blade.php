<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

@include('main.components.imports')

</head>
<body id="page-top">

@include('home.component.header')

<section class="pt-4 bg-color-red">
    <div class="container px-lg-5">
        <div class="row gx-lg-5">
            <div class="col-lg-6 col-xl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                        <a href="/projects">
                            <h2 class="fs-4 font-weight-bold color-red">{{__('messages.projects')}}</h2>
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
                            <h2 class="fs-4 font-weight-bold color-red">{{__('messages.tasks')}}</h2>

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
                            <h2 class="fs-4 font-weight-bold color-red">{{__('messages.employees')}}</h2>
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

@include('home.component.footer')

</body>

</html>
