@extends('components.layout')

@section('content')
    <!-- Log In Form-->

    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5 font-weight-bold">{{__('messages.registration')}}</h3>
                            <form method="POST" action="/register">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="username">{{__('messages.username')}}

                                        <input name="username"
                                               type="text"
                                               required
                                               class="form-control form-control-lg"
                                               placeholder={{__('messages.enterUsername')}}
                                        value="{{old('username')}}"/>
                                    </label>
                                </div>
                                @error('username')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">{{__('messages.email')}}
                                        <input name="email" type="email" id="email" class="form-control form-control-lg"
                                               required
                                               placeholder={{__('messages.enterEmail')}}
                                               value="{{old('email')}}"/>
                                    </label>
                                </div>
                                @error('email')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">{{__('messages.password')}}
                                        <input name="password" type="password" id="password" required
                                               class="form-control form-control-lg"
                                               placeholder={{__('messages.enterPassword')}}/>
                                    </label>
                                </div>
                                @error('password')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror

                                <button type="submit"
                                        class="btn btn-lg btn-primary  btn-outline-secondary font-weight-bold button-color-red btn-block">
                                    {{__('messages.register')}}
                                </button>
                            </form>
                            <hr class="my-4">
                            <div class="text-center">
                                <p>{{__('messages.haveAccount')}} </p>
                            </div>
                            <a href="/login">
                                <button class="btn btn-lg btn-primary btn-outline-secondary button-color-grey btn-block"
                                        type="submit"><i class="fab fa-google me-2"></i> {{__('messages.loginUser')}}
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
