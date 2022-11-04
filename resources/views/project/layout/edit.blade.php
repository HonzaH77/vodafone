@extends('main.layout.index')

@section('content')

    <section class="vh-100 bg-light vodafone_project-layout-edit__edit-section">
        <div class="container py-5 h-100 vodafone_project-layout-edit__edit-container">
            <div
                class="row d-flex justify-content-center align-items-center h-100 vodafone_project-layout-edit__edit-row">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 vodafone_project-layout-edit__edit-col">
                    <div class="card shadow-2-strong vodafone_project-layout-edit__card">
                        <div class="card-body p-5 text-center vodafone_project-layout-edit__card-body">

                            <h3 class="mb-5 vodafone_project-layout-edit__title">{{__('messages.editProject')}}</h3>
                            @include('project.component.edit-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
