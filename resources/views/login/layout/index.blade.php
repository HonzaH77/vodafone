@extends('main.layout.index')

@section('content')
    <section class="vh-100 bg-light vodafone_login-layout-index__section">
        <div class="container py-5 h-100 vodafone_login-layout-index__container">
            <div class="row d-flex justify-content-center align-items-center h-100 vodafone_login-layout-index__row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 vodafone_login-layout-index__col">
                    <div class="card shadow-2-strong vodafone_login-layout-index__card">
                        <div class="card-body p-5 text-center vodafone_login-layout-index__card-body">
                            <h3 class="mb-5 vodafone_login-layout-index__title">{{__('messages.loginSubmit')}}</h3>

                            @include('login.component.login-form')

                            <hr class="my-4 vodafone_login-layout-index__hr">
                            <div class="text-center vodafone_login-layout-index__message">
                                <p>{{__('messages.noAccount')}}</p>
                            </div>
                            <div class="text-center vodafone_login-layout-index__register-button">
                                <a class="btn btn-lg btn-primary btn-outline-secondary btn-block vodafone_login-layout-index__button"
                                   href="{{route('register')}}">
                                    {{__('messages.registerSubmit')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
