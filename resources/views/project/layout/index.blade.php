@extends('main.layout.index')

@section('content')

    <section class="vh-100 bg-light vodafone_project-layout-index__project-section">
        <div class="container py-5 h-100 vodafone_project-layout-index__container">
            <div class="row d-flex justify-content-center align-items-center h-100 vodafone_project-layout-index__row">
                <div class="card shadow-2-strong vodafone_project-layout-index__card">
                    <div class="card-body p-5 text-left vodafone_project-layout-index__card-body">

                        <h2 class="vodafone_project-layout-index__title">{{$project->getName()}}</h2>

                        <h3>{{$project->getDescription()}}</h3>
                        @if (Auth::id() == $project->getAuthorId())
                            <td>
                                <a
                                    type="button"
                                    class="btn btn-link btn-rounded btn-sm fw-bold vodafone_project-layout-index__edit-button"
                                    href="/projects/{{$project->getId()}}/edit"
                                >
                                    {{__('messages.edit')}}
                                </a>
                            </td>
                            <td>
                                <a
                                    type="button"
                                    class="btn btn-link btn-rounded btn-sm fw-bold vodafone_project-layout-index__delete-button"
                                    href="/projects/{{$project->getId()}}/delete"
                                >
                                    {{__('messages.delete')}}
                                </a>
                            </td>
                        @endif

                        <hr class="my-4 vodafone_project-layout-index__line">

                        <div class="p-2 text-center text-decoration-line-through vodafone_project-layout-index__title">
                            <h3 >{{__('messages.attachments')}}</h3>
                        </div>

                        @include('project.component.attachments-table')

                        @include('project.component.files-input')
                        <hr class="my-4 vodafone_project-layout-index__line">

                        <div class="p-2 text-center text-decoration-line-through vodafone_project-layout-index__title" >
                            <h3>{{__('messages.tasks')}}</h3>
                        </div>

                        @include('project.component.tasks-table')

                        <div class="card-body p-5 text-center vodafone_project-layout-index__button">
                            <a href="{{$project->getId()}}/new-task">
                                <button type="submit"
                                        class="btn btn-lg btn-primary btn-outline-secondary btn-block vodafone_project-layout-index__submit-button ">
                                    {{__('messages.newTask')}}
                                </button>
                            </a>
                        </div>
                        <hr class="my-4 vodafone_project-layout-index__line">

                        @include('project.component.comments')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
