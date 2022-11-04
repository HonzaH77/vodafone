@extends('components.layout')

@section('content')
    <!-- Log In Form-->

    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5 font-weight-bold">{{__('messages.newTask')}}</h3>
                            <form method="POST" action="">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">{{__('messages.name')}}
                                        <input name="name" type="text" id="name" class="form-control form-control-lg"
                                               required
                                               placeholder={{__('messages.enterName')}}
                                               value="{{old('name')}}"/>
                                    </label>
                                </div>
                                @error('name')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="endDate">{{__('messages.endDate')}}
                                        <input name="endDate" type="date" id="endDate"
                                               class="form-control form-control-lg" placeholder="YYYY/MM/DD" required
                                               value="{{old('endDate')}}"/>
                                    </label>

                                </div>
                                @error('endDate')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror
                                <div class="form-outline mb-4">

                                    <div>
                                        <label class="form-label" for="type">{{__('messages.taskType')}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">{{__('messages.mistake')}}
                                            <input class="form-check-input" type="radio" name="type"
                                                   id="mistake" value="mistake">
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label"
                                               for="inlineRadio2">{{__('messages.requirement')}}
                                            <input class="form-check-input" type="radio" name="type"
                                                   id="requirement" value="requirement">
                                        </label>
                                    </div>
                                </div>
                                @error('type')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror

                                <button type="submit"
                                        class="btn btn-lg btn-primary  btn-outline-secondary font-weight-bold button-color-red btn-block">
                                    {{__('messages.createTask')}}
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
