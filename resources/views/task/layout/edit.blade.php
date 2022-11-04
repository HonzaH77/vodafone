@extends('main.layout.index')

@section('content')
    <!-- Log In Form-->

    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5 font-weight-bold">{{__('messages.editTask')}}</h3>
                            @include('task.component.edit-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
