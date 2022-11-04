@extends('main.layout.index')

@section('content')

    <section class="vh-100 bg-light vodafone_project-layout-all__project-section">
        <div class="container py-5 h-100 vodafone_project-layout-all__project-section-container">
            <div class="row d-flex justify-content-center align-items-center h-100 vodafone_project-layout-all__row">
                <div class="card shadow-2-strong vodafone_project-layout-all__card vodafone_project-layout-all__title">
                    <div class="card-body p-5 text-center vodafone_project-layout-all__filter">
                        <h2 class="font-weight-bold"> {{__('messages.projects')}} </h2>
                        <div class="input-group rounded py-2 justify-content-center vodafone_project-layout-all__filter">
                            @include('project.component.project-filter')
                        </div>
                        @include('project.component.projects-table')

                        <div class="card-body p-5 text-center">
                            <a class="btn btn-lg btn-primary btn-outline-secondary btn-block vodafone_project-layout-all__new-project-button"
                               href="{{route('newProject')}}">
                                {{__('messages.newProject')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
