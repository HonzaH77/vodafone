@extends('components.layout')

@section('content')
    <!-- Projects table-->
    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-left">

                            <h2 class="font-weight-bold">{{$task->name}}</h2>
                            @if($task->state == 'in process')
                                <button type="button" class="btn btn-warning">{{__('messages.inProcess')}}</button>
                            @endif
                            @if($task->state == 'done')
                                <button type="button" class="btn btn-success">{{__('messages.done')}}</button>
                            @endif
                            @if($task->state == 'new')
                                <button type="button" class="btn btn-secondary">{{__('messages.new')}}</button>
                            @endif
                            @if($task->state == 'denied')
                                <button type="button" class="btn btn-danger">{{__('messages.denied')}}</button>
                            @endif

                            <p>{{__('messages.startDate') . ": " . $task->created_at}}</p>
                            <p>{{__('messages.endDate') . ": " . $task->endDate}}</p>
                            <td>
                                <a
                                    type="button"
                                    class="btn btn-link btn-rounded btn-sm fw-bold"
                                    data-mdb-ripple-color="dark"
                                    href="/tasks/{{$task->id}}/edit"
                                >
                                    {{__('messages.edit')}}
                                </a>
                            </td>
                            @if (Auth::id() == $task->user_id)
                                <td>
                                    <a
                                        type="button"
                                        class="btn btn-link btn-rounded btn-sm fw-bold"
                                        data-mdb-ripple-color="dark"
                                        href="/tasks/{{$task->id}}/delete"
                                    >
                                        {{__('messages.delete')}}
                                    </a>
                                </td>
                            @endif

                            <hr class="my-4">
                            <div class="p-2">
                                <h3 class="text-center text-decoration-line-through">{{__('messages.stateHistory')}}</h3>
                            </div>


                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('messages.date')}}</th>
                                    <th scope="col">{{__('messages.state')}}</th>
                                    <th scope="col">{{__('messages.comment')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1 ?>
                                @foreach($task->history as $hist)
                                    <tr>
                                        <th scope="row">{{$count}}</th>
                                        <td>{{$hist->created_at}}</td>
                                        <td>
                                            @if($hist->state == 'in process')
                                                <button type="button" class="btn btn-warning">{{__('messages.inProcess')}}</button>
                                            @endif
                                            @if($hist->state == 'done')
                                                <button type="button" class="btn btn-success">{{__('messages.done')}}</button>
                                            @endif
                                            @if($hist->state == 'new')
                                                <button type="button" class="btn btn-secondary">{{__('messages.new')}}</button>
                                            @endif
                                            @if($hist->state == 'denied')
                                                <button type="button" class="btn btn-danger">{{__('messages.denied')}}</button>
                                            @endif
                                        </td>

                                        <td>{{$hist->comment}}</td>
                                @endforeach
                                </tbody>
                            </table>
                            <hr class="my-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
