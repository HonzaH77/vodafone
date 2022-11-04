@extends('components.layout')

@section('content')

    <!-- Projects table-->
    <section class="vh-100 bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h2 class="font-weight-bold"> {{__('messages.projects')}} </h2>
                            <div class="input-group rounded py-2 justify-content-center">
                                <form method="GET" action="#">
                                    <div class="input-group">
                                        <input type="text"
                                               name="search"
                                               class="form-control rounded"
                                               placeholder={{__('messages.search')}}
                                               aria-label="Search"
                                               aria-describedby="search-addon"
                                               value="{{request('search')}}"/>
                                        <button class="btn btn-outline-primary button-color-grey">
                                            {{__('messages.search')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th scope="col">{{__('messages.name')}}</th>
                                    <th scope="col">{{__('messages.description')}}</th>
                                    <th scope="col">{{__('messages.author')}}</th>
                                    <th scope="col">{{__('messages.requirementsN')}}</th>
                                    <th scope="col">{{__('messages.mistakesN')}}</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <th>
                                            <a href="/projects/{{$project->id}}" style="color: red">
                                                {{$project->name}}
                                            </a>
                                        </th>

                                        <td>{{$project->description}}</td>
                                        <td>{{$project->author->username}}</td>
                                            <?php $statuses = array('done', 'denied', 'in process', 'new'); ?>
                                        <td>
                                            @foreach($statuses as $status)
                                                    <?php $count = $project->counter($status, 'mistake') ?>
                                                @if($status == 'in process' and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-warning">{{$count . ' ' . __('messages.inProcess')}}</button>
                                                @endif
                                                @if($status == 'done'and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-success">{{$count . ' ' . __('messages.done')}}</button>
                                                @endif
                                                @if($status == 'new'and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-secondary">{{$count . ' ' . __('messages.new')}}</button>
                                                @endif
                                                @if($status == 'denied' and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-danger">{{$count . ' ' . __('messages.denied')}}</button>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($statuses as $status)
                                                    <?php $count = $project->counter($status, 'requirement') ?>
                                                @if($status == 'in process' and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-warning">{{$count . ' ' . __('messages.inProcess')}}</button>
                                                @endif
                                                @if($status == 'done'and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-success">{{$count . ' ' . __('messages.done')}}</button>
                                                @endif
                                                @if($status == 'new'and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-secondary">{{$count . ' ' . __('messages.new')}}</button>
                                                @endif
                                                @if($status == 'denied' and $count > 0)
                                                    <button type="button" style="margin-bottom: 3%"
                                                            class="btn btn-danger">{{$count . ' ' . __('messages.denied')}}</button>
                                                @endif
                                            @endforeach
                                        </td>

                                        <td><a href="/projects/notify/{{$project->id}}"
                                               class="color-black">{{__('messages.notification')}}</a></td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            {{$projects->links()}}

                            <div class="card-body p-5 text-center">
                                <a href="/new-project">
                                    <button type="submit"
                                            class="btn btn-lg btn-primary btn-outline-secondary font-weight-bold button-color-red btn-block">
                                        {{__('messages.newProject')}}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
