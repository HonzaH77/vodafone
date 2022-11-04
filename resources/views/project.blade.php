@extends('components.layout')

@section('content')

    <!-- Projects table-->
    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-left">

                            <h2 class="font-weight-bold">{{$project->name}}</h2>

                            <h3>{{$project->description}}</h3>
                            @if (Auth::id() == $project->user_id)
                                <td>
                                    <a
                                        type="button"
                                        class="btn btn-link btn-rounded btn-sm fw-bold"
                                        data-mdb-ripple-color="dark"
                                        href="/projects/{{$project->id}}/edit"
                                    >
                                        {{__('messages.edit')}}
                                    </a>
                                </td>
                                <td>
                                    <a
                                        type="button"
                                        class="btn btn-link btn-rounded btn-sm fw-bold color-red-500"
                                        data-mdb-ripple-color="red"
                                        href="/projects/{{$project->id}}/delete"
                                    >
                                        {{__('messages.delete')}}
                                    </a>
                                </td>
                            @endif

                            <p>{{__('messages.doneMistake') . $project->counter('done', 'mistake') . __('messages.requirements') . $project->counter('done', 'requirement')}}</p>
                            <p>{{__('messages.deniedMistake') . $project->counter('denied', 'mistake') . __('messages.requirements') . $project->counter('denied', 'requirement')}}</p>
                            <p>{{__('messages.inProcessMistake') . $project->counter('in process', 'mistake') . __('messages.requirements') . $project->counter('in process', 'requirement')}}</p>
                            <p>{{__('messages.newMistake') . $project->counter('new', 'mistake') . __('messages.requirements') . $project->counter('new', 'requirement')}}</p>
                            <hr class="my-4">

                            <div class="p-2">
                                <h3 class="text-center text-decoration-line-through">{{__('messages.attachments')}}</h3>
                            </div>
                            @if (count($project->attachment) > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">{{__('messages.date')}}</th>
                                    <th scope="col">{{__('messages.name')}}</th>
                                </tr>
                                </thead>
                                @endif
                                <tbody>
                            @foreach($project->attachment as $attachment)

                                    <tr>
                                        <th scope="row">{{$attachment->created_at}}</th>
                                        <td><a href="{{$project->id}}/attachment/{{$attachment->id}}">{{$attachment->file_name}}</a> </td>
                                    </tr>

                            @endforeach
                                </tbody>
                            </table>
                            <!-- Input files -->
                            <form method="POST" action="{{$project->id}}/attachment" enctype="multipart/form-data">
                                @csrf
                                <label class="form-label" for="file">{{__('messages.uploadAttachments')}}</label>
                                <input name="file_name" type="file" class="form-control" id="file"/>

                                <button type="submit"
                                        class="btn btn-sm btn-primary btn-outline-secondary font-weight-bold button-color-grey btn-block">
                                    {{__('messages.submitAttachment')}}
                                </button>
                            </form>
                            <hr class="my-4">

                            <div class="p-2">
                                <h3 class="text-center text-decoration-line-through">{{__('messages.tasks')}}</h3>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('messages.name')}}</th>
                                    <th scope="col">{{__('messages.type')}}</th>
                                    <th scope="col">{{__('messages.state')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1 ?>
                                @foreach($project->task as $task)
                                    <tr>
                                        <th scope="row">{{$count++}}</th>
                                        <td><a href="/tasks/{{$task->id}}" style="color: red">{{$task->name}}</a></td>
                                        <td>
                                            @if($task->type == 'mistake')
                                                <button type="button"
                                                        class="btn btn-dark">{{__('messages.mistake')}}</button>
                                            @endif
                                            @if($task->type == 'requirement')
                                                <button type="button"
                                                        class="btn btn-light">{{__('messages.requirement')}}</button>
                                            @endif
                                        </td>
                                        <td>@if($task->state == 'in process')
                                                <button type="button"
                                                        class="btn btn-warning">{{__('messages.inProcess')}}</button>
                                            @endif
                                            @if($task->state == 'done')
                                                <button type="button"
                                                        class="btn btn-success">{{__('messages.done')}}</button>
                                            @endif
                                            @if($task->state == 'new')
                                                <button type="button"
                                                        class="btn btn-secondary">{{__('messages.new')}}</button>
                                            @endif
                                            @if($task->state == 'denied')
                                                <button type="button"
                                                        class="btn btn-danger">{{__('messages.denied')}}</button>
                                            @endif
                                        </td>

                                @endforeach

                                </tbody>
                            </table>
                            <div class="card-body p-5 text-center">
                                <a href="{{$project->id}}/new-task">
                                    <button type="submit"
                                            class="btn btn-lg btn-primary btn-outline-secondary font-weight-bold button-color-red btn-block">
                                        {{__('messages.newTask')}}
                                    </button>
                                </a>
                            </div>
                            <hr class="my-4">

                            <!-- Comments -->


                            <section>
                                <div class="container my-5">
                                    <h3 class="text-center text-decoration-line-through">{{__('messages.comments')}}</h3>

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 col-lg-10 col-xl-8">
                                            <div class="card">

                                                @foreach($project->comment as $comment)
                                                    <div class="card-body">
                                                        <div class="d-flex flex-start align-items-center">

                                                            <div>
                                                                <h6 class="fw-bold text-primary mb-1">{{$comment->user->username}}</h6>
                                                                <p class="text-muted small mb-0">
                                                                    {{__('messages.published')}}
                                                                    - {{$comment->created_at}}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <p class="mt-3 mb-4 pb-2">
                                                            {{$comment->text}}
                                                        </p>

                                                    </div>
                                                @endforeach
                                                <div class="card-footer py-3 border-0"
                                                     style="background-color: #f8f9fa;">
                                                    <label class="form-label"
                                                           for="textAreaExample">{{__('messages.writeComment')}}
                                                    </label>
                                                    <form method="POST" action="/projects/{{$project->id}}/comment">
                                                        @csrf
                                                        <div class="d-flex flex-start w-100">

                                                            <label class="form-outline w-100" for="text">

                                                                <textarea name="text" class="form-control" id="text"
                                                                          rows="4"
                                                                          style="background: #fff;"></textarea>
                                                            </label>

                                                        </div>
                                                        <div class="float-end mt-2 pt-1">
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-primary btn-outline-secondary button-color-red btn-block">
                                                                {{__('messages.publish')}}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
