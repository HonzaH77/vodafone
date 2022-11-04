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
            <td><a href="/projects/{{$task->getProjectId()}}"
                   class="color-red">{{$task->getProjectName()}}</a></td>
            <td>
                <a href="/tasks/{{$task->getId()}}" class="color-red">
                    {{$task->getName()}}
                </a>
            </td>

            <td>
                @if($task->getType() == 'mistake')
                    <button type="button"
                            class="btn btn-dark">{{__('messages.mistake')}}</button>
                @endif
                @if($task->getType() == 'requirement')
                    <button type="button"
                            class="btn btn-light">{{__('messages.requirement')}}</button>
                @endif
            </td>

            <td>
                @if($task->getState() == 'in process')
                    <button type="button"
                            class="btn btn-warning">{{__('messages.inProcess')}}</button>
                @endif
                @if($task->getState() == 'done')
                    <button type="button"
                            class="btn btn-success">{{__('messages.done')}}</button>
                @endif
                @if($task->getState() == 'new')
                    <button type="button"
                            class="btn btn-secondary">{{__('messages.new')}}</button>
                @endif
                @if($task->getState() == 'denied')
                    <button type="button"
                            class="btn btn-danger">{{__('messages.denied')}}</button>
                @endif
            </td>
            <td>{{$task->getCreatedAt()}}</td>
            <td>{{$task->getEndDate()}}</td>

        </tr>
    @endforeach

    </tbody>
</table>
{{$tasks->links()}}
