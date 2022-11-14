<table class="table table-striped vodafone_task-component-task-table__table">
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
            <td><a href="{{route('project', ['project' => $task->getProjectId()])}}"
                   class="vodafone_task-component-task-table__project-name">{{$task->getProjectName()}}</a></td>
            <td>
                <a href="{{route('task', ['task' => $task->getId()])}}" class="vodafone_task-component-task-table__task-name">
                    {{$task->getName()}}
                </a>
            </td>

            <td>
                @if($task->getType() == 'mistake')
                    <button type="button"
                            class="btn btn-dark vodafone_task-component-task-table__mistake">{{__('messages.mistake')}}</button>
                @endif
                @if($task->getType() == 'requirement')
                    <button type="button"
                            class="btn btn-light vodafone_task-component-task-table__requirement">{{__('messages.requirement')}}</button>
                @endif
            </td>

            <td>
                @if($task->getState() == 'in process')
                    <button type="button"
                            class="btn btn-warning vodafone_task-component-task-table__state">{{__('messages.inProcess')}}</button>
                @endif
                @if($task->getState() == 'done')
                    <button type="button"
                            class="btn btn-success vodafone_task-component-task-table__state">{{__('messages.done')}}</button>
                @endif
                @if($task->getState() == 'new')
                    <button type="button"
                            class="btn btn-secondary vodafone_task-component-task-table__state">{{__('messages.new')}}</button>
                @endif
                @if($task->getState() == 'denied')
                    <button type="button"
                            class="btn btn-danger vodafone_task-component-task-table__state">{{__('messages.denied')}}</button>
                @endif
            </td>
            <td>{{$task->getCreatedAt()}}</td>
            <td>{{$task->getEndDate()}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
{{$tasks->appends(Request::except("page"))->links()}}

