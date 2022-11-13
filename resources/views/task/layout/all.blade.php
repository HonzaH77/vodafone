@extends('main.layout.index')

@section('content')

    <!-- Projects table-->
    <section class="vh-100 bg-light vodafone_task-layout-all__section">
        <div class="container py-5 h-100 vodafone_task-layout-all__container">
            <div class="row d-flex justify-content-center align-items-center h-100 vodafone_task-layout-all__row">
                    <div class="card shadow-2-strong vodafone_task-layout-all__card">
                        <div class="card-body p-5 text-center vodafone_task-layout-all__card-body">
                            <h2 class="vodafone_task-layout-all__title">{{__('messages.tasks')}}</h2>

                            <div class="btn-group rounded py-2 justify-content-center vodafone_task-layout-all__filter">
                                @include('task.component.filter')
                            </div>

                            @include('task.component.task-table')
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection


