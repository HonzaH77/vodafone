<table class="table table-striped vodafone_project-component-tasks-table__table">
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
    @foreach($tasks as $task)
        <tr>
            <th scope="row">{{$count++}}</th>
            <td><a href="/tasks/{{$task->id}}" style="color: red">{{$task->name}}</a>
            </td>
            <td>
                @if($task->type == 'mistake')
                    <button type="button"
                            class="btn btn-dark table-striped vodafone_project-component-tasks-table__mistake">{{__('messages.mistake')}}</button>
                @endif
                @if($task->type == 'requirement')
                    <button type="button"
                            class="btn btn-light table-striped vodafone_project-component-tasks-table__requirement">{{__('messages.requirement')}}</button>
                @endif
            </td>
            <td>@if($task->state == 'in process')
                    <button type="button"
                            class="btn btn-warning table-striped vodafone_project-component-tasks-table__in-process">{{__('messages.inProcess')}}</button>
                @endif
                @if($task->state == 'done')
                    <button type="button"
                            class="btn btn-success table-striped vodafone_project-component-tasks-table__done">{{__('messages.done')}}</button>
                @endif
                @if($task->state == 'new')
                    <button type="button"
                            class="btn btn-secondary table-striped vodafone_project-component-tasks-table__new">{{__('messages.new')}}</button>
                @endif
                @if($task->state == 'denied')
                    <button type="button"
                            class="btn btn-danger table-striped vodafone_project-component-tasks-table__denied">{{__('messages.denied')}}</button>
                @endif
            </td>

    @endforeach

    </tbody>
</table>
