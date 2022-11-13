@extends('main.layout.index')

@section('content')

    <!-- Employees table-->
    <section class="vh-100 bg-light vodafone_user-layout-index__section">
        <div class="container py-5 h-100 vodafone_user-layout-index__container">
            <div class="row d-flex justify-content-center align-items-center h-100 vodafone_user-layout-index__row">
                    <div class="card shadow-2-strong vodafone_user-layout-index__card"">
                        <div class="card-body p-5 text-center vodafone_user-layout-index__card-body">
                            <h2 class="vodafone_user-layout-index__title">{{__('messages.employeesList')}}</h2>

                            @include('user.component.users-table')

                        </div>
                    </div>
                </div>
        </div>
    </section>

@endsection
