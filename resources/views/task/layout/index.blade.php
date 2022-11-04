@extends('main.layout.index')

@section('content')
    <!-- Projects table-->
    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-left">

                            <h2 class="font-weight-bold">{{$task->getName()}}</h2>
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
                                    class="btn btn-link btn-rounded btn-sm fw-bold"
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
                                        class="btn btn-link btn-rounded btn-sm fw-bold"
                                        data-mdb-ripple-color="dark"
                                        href="/tasks/{{$task->getId()}}/delete"
                                    >
                                        {{__('messages.delete')}}
                                    </a>
                                </td>
                            @endif

                            <hr class="my-4">
                            <div class="p-2">
                                <h3 class="text-center text-decoration-line-through">{{__('messages.stateHistory')}}</h3>
                            </div>

                            @include('task.component.task-history')

                            <hr class="my-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
