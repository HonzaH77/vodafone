@extends('components.layout')

@section('content')
    <!-- Log In Form-->

    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5 font-weight-bold">{{__('messages.editProject')}}</h3>
                            <form method="POST" action="">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">{{__('messages.name')}}
                                        <input name="name" type="text" id="name"
                                               class="form-control form-control-lg"
                                               placeholder={{__('messages.enterName')}} value="{{$original->name}}"
                                               required/>
                                    </label>
                                </div>
                                @error('name')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror
                                <div class="form-outline mb-4">
                                    <label class="form-label input-lg" for="description">{{__('messages.enterName')}}
                                        <input name="description" type="text" id="description"
                                               class="form-control form-control-lg" placeholder={{__('messages.projectDescription')}}
                                               value="{{$original->description}}" required/>
                                    </label>
                                </div>
                                @error('description')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror

                                <button type="submit"
                                        class="btn btn-primary btn-lg btn-outline-secondary font-weight-bold button-color-red btn-block">
                                    {{__('messages.save')}}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
