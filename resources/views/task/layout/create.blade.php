@extends('main.layout.index')

@section('content')
    <!-- Log In Form-->

    <section class="vh-100 bg-light vodafone_task-layout-create__section">
        <div class="container py-5 h-100 vodafone_task-layout-create__container">
            <div class="row d-flex justify-content-center align-items-center h-100 vodafone_task-layout-create__row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 vodafone_task-layout-create__col">
                    <div class="card shadow-2-strong vodafone_task-layout-create__card">
                        <div class="card-body p-5 text-center vodafone_task-layout-create__card-body">

                            <h3 class="mb-5 vodafone_task-layout-create__title">{{__('messages.newTask')}}</h3>

                            @include('task.component.create-form')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
