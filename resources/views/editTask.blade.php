@extends('components.layout')

@section('content')
    <!-- Log In Form-->

    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5 font-weight-bold">{{__('messages.editTask')}}</h3>
                            @if (Auth::id() != $original->user_id)
                                <p class="mb-5 font-weight-bold">{{$original->name}}</p>
                            @endif
                            <form method="POST" action="">
                                @csrf
                                @if (Auth::id() == $original->user_id)
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name">{{__('messages.name')}}
                                            <input name="name" type="text" id="name"
                                                   class="form-control form-control-lg"
                                                   required
                                                   placeholder={{__('messages.enterName')}}
                                                   value="{{$original->name}}"/>
                                        </label>
                                    </div>
                                    @error('name')
                                    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                    @enderror

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="endDate">{{__('messages.endDate')}}
                                            <input name="endDate" type="date" id="endDate"
                                                   class="form-control form-control-lg" placeholder="YYYY/MM/DD"
                                                   required
                                                   value="{{$original->endDate}}"/>
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
                                            <label class="form-check-label"
                                                   for="inlineRadio1">{{__('messages.mistake')}}
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
                                @endif
                                <div class="form-outline mb-4">

                                    <div>
                                        <label class="form-label" for="type">{{__('messages.taskState')}}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1">{{__('messages.inProcess')}}
                                            <input class="form-check-input" type="radio" name="state"
                                                   id="in process" value="in process">
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio2">{{__('messages.denied')}}
                                            <input class="form-check-input" type="radio" name="state"
                                                   id="denied" value="denied">
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio2">{{__('messages.done')}}
                                            <input class="form-check-input" type="radio" name="state"
                                                   id="done" value="done">
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio2">{{__('messages.new')}}
                                            <input class="form-check-input" type="radio" name="state"
                                                   id="new" value="new">
                                        </label>
                                    </div>
                                </div>
                                @error('state')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="comment">{{__('messages.comment')}}
                                        <input name="comment" type="text" id="comment"
                                               class="form-control form-control-lg"
                                               placeholder={{__('messages.writeComment')}}
                                        />
                                    </label>
                                </div>
                                @error('comment')
                                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                                @enderror
                                <button type="submit"
                                        class="btn btn-primary btn-lg btn-block font-weight-bold button-color-red">
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
