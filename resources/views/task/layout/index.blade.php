@extends('main.layout.index')

@section('content')
    <!-- Projects table-->
    <section class="vh-100 bg-light vodafone_task-layout-index__section">
        <div class="container py-5 h-100 vodafone_task-layout-index__container">
            <div class="row d-flex justify-content-center align-items-center h-100 vodafone_task-layout-index__row">
                    <div class="card shadow-2-strong vodafone_task-layout-index__card">
                        <div class="card-body p-5 text-left vodafone_task-layout-index__card-body">
                            <h2 class="font-weight-bold vodafone_task-layout-index__state">{{$task->getName()}}</h2>
                            @if($task->getState() == 'in process')
                                <button type="button" class="btn btn-warning">{{__('messages.inProcess')}}</button>
                            @endif
                            @if($task->getState() == 'done')
                                <button type="button" class="btn btn-success">{{__('messages.done')}}</button>
                            @endif
                            @if($task->getState() == 'new')
                                <button type="button" class="btn btn-secondary">{{__('messages.new')}}</button>
                            @endif
                            @if($task->getState() == 'denied')
                                <button type="button" class="btn btn-danger">{{__('messages.denied')}}</button>
                            @endif

                            <p>{{__('messages.startDate') . ": " . $task->getCreatedAt()}}</p>
                            <p>{{__('messages.endDate') . ": " . $task->getEndDate()}}</p>
                            <td>
                                <a
                                    type="button"
                                    class="btn btn-link btn-rounded btn-sm fw-bold vodafone_task-layout-index__edit-link"
                                    data-mdb-ripple-color="dark"
                                    href="/tasks/{{$task->getId()}}/edit"
                                >
                                    {{__('messages.edit')}}
                                </a>
                            </td>
                            @if (Auth::id() == $task->getAuthorId())
                                <td>
                                    <a
                                        type="button"
                                        class="btn btn-link btn-rounded btn-sm fw-bold vodafone_task-layout-index__delete-link"
                                        data-mdb-ripple-color="dark"
                                        href="/tasks/{{$task->getId()}}/delete"
                                    >
                                        {{__('messages.delete')}}
                                    </a>
                                </td>
                            @endif

                            <hr class="my-4">
                            <div class="p-2">
                                <h3 class="text-center text-decoration-line-through vodafone_task-layout-index__history">{{__('messages.stateHistory')}}</h3>
                            </div>

                            @include('task.component.task-history')

                            <hr class="my-4 vodafone_task-layout-index__hr">
                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection
