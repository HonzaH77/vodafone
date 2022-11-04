@extends('components.layout')

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
                                <form method="GET" action="#" class="form-inline">
                                    <div class="form-group mr-2">
                                        <input type="text"
                                               name="search"
                                               class="form-control rounded"
                                               placeholder={{__('messages.writeSomething')}}
                                               aria-label="Search"
                                               aria-describedby="search-addon"
                                               value="{{request('search')}}"/>
                                    </div>
                                    <div class="form-group mr-2">
                                        <select class="form-control" name="type">
                                            @if(is_null(request("type")))
                                                <option selected="selected"
                                                        disabled>{{__('messages.type')}}</option>
                                            @endif
                                            <option @if(request("type") == "requirement")
                                                        {{ "selected='selected" }}
                                                    @endif
                                                    value="requirement">{{__('messages.requirement')}}
                                            </option>
                                            <option @if(request("type") == "mistake")
                                                        {{ "selected='selected" }}
                                                    @endif
                                                    value="mistake">{{__('messages.mistake')}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-2">
                                        <select class="form-control" name="state">
                                            @if(is_null(request("state")))
                                                <option selected="selected"
                                                        disabled>{{ __("messages.state") }}</option>
                                            @endif
                                            <option @if(request("state") == "denied")
                                                        {{ "selected='selected" }}
                                                    @endif
                                                    value="denied">{{__('messages.denied')}}
                                            </option>
                                            <option @if(request("state") == "done")
                                                        {{ "selected='selected" }}
                                                    @endif
                                                    value="done">{{__('messages.done')}}
                                            </option>
                                            <option @if(request("state") == "new")
                                                        {{ "selected='selected" }}
                                                    @endif
                                                    value="new">{{__('messages.new')}}
                                            </option>
                                            <option @if(request("state") == "in process")
                                                        {{ "selected='selected" }}
                                                    @endif
                                                    value="in process">{{__('messages.inProcess')}}
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-secondary button-color-red">
                                        {{ __("messages.filter") }}</button>
                                </form>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">{{__('messages.project')}}</th>
                                    <th scope="col">{{__('messages.name')}}</th>
                                    <th scope="col">{{__('messages.type')}}</th>
                                    <th scope="col">{{__('messages.state')}}</th>
                                    <th scope="col">{{__('messages.startDate')}}</th>
                                    <th scope="col">{{__('messages.endDate')}}</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($tasks as $task)
                                    <tr>
                                        <td><a href="/projects/{{$task->project->id}}"
                                               class="color-red">{{$task->project->name}}</a></td>
                                        <td>
                                            <a href="/tasks/{{$task->id}}" class="color-red">
                                                {{$task->name}}
                                            </a>
                                        </td>

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

                                        <td>
                                            @if($task->state == 'in process')
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
                                        <td>{{$task->created_at}}</td>
                                        <td>{{$task->endDate}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{$tasks->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


