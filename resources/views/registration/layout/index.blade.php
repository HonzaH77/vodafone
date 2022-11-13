@extends('main.layout.index')

@section('content')
    <!-- Log In Form-->
    <section class="vh-100 bg-light vodafone_registration-layout-index__section">
        <div class="container py-5 h-100 vodafone_registration-layout-index__container">
            <div
                class="row d-flex justify-content-center align-items-center h-100 vodafone_registration-layout-index__row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 vodafone_registration-layout-index__col">
                    <div class="card shadow-2-strong vodafone_registration-layout-index__card">
                        <div class="card-body p-5 text-center vodafone_registration-layout-index__card-body">
                            <h3 class="mb-5 vodafone_registration-layout-index__title">{{__('messages.registration')}}</h3>
                            @include('registration.component.form')
                            <hr class="my-4 vodafone_registration-layout-index__hr">
                            <div class="text-center vodafone_registration-layout-index__message">
                                <p>{{__('messages.haveAccount')}} </p>
                            </div>
                            <div class="text-center vodafone_registration-layout-index__login-button">
                                <a class="btn btn-lg btn-primary btn-outline-secondary btn-block vodafone_registration-layout-index__button"
                                   type="submit"
                                   href="{{route('login')}}"> {{__('messages.loginUser')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
