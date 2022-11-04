@extends('main.layout.index')

@section('content')

    <!-- Projects table-->
    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h2 class="font-weight-bold">{{__('messages.tasks')}}</h2>

                            <div class="btn-group rounded py-2  justify-content-center">
                                @include('task.component.filter')
                            </div>

                            @include('task.component.task-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


