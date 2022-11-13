<table class="table table-striped vodafone_project-component-project-table__table">
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
                <a class="vodafone_project-component-project-table__link" href="{{route('project', ['project' => $project->getId()]) }}">
                    {{$project->getName()}}
                </a>
            </th>

            <td>{{$project->getDescription()}}</td>
            <td> {{$project->getAuthor()}}</td>
            <td>
                @foreach($requirements as $requirement)
                    @if($requirement["projectId"] == $project->getId())
                        @foreach($requirement["status"] as $requirement => $count)

                            @if($requirement == 'in process' and $count > 0)
                                <button type="button" style="margin-bottom: 3%"
                                        class="btn btn-warning">{{$count . ' ' . __('messages.inProcess')}}</button>
                            @endif
                            @if($requirement == 'done'and $count > 0)
                                <button type="button" style="margin-bottom: 3%"
                                        class="btn btn-success">{{$count . ' ' . __('messages.done')}}</button>
                            @endif
                            @if($requirement == 'new'and $count > 0)
                                <button type="button" style="margin-bottom: 3%"
                                        class="btn btn-secondary">{{$count . ' ' . __('messages.new')}}</button>
                            @endif
                            @if($requirement == 'denied' and $count > 0)
                                <button type="button" style="margin-bottom: 3%"
                                        class="btn btn-danger">{{$count . ' ' . __('messages.denied')}}</button>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($mistakes as $mistake)
                    @if($mistake["projectId"] == $project->getId())
                        @foreach($mistake["status"] as $status => $count)

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
                    @endif
                @endforeach
            </td>
            <td><a href="{{route('notification', ['project' => $project->getId()])}}"
                   class="vodafone_project-component-project-table__notification">{{__('messages.notification')}}</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$projects->appends(Request::except("page"))->links()}}
