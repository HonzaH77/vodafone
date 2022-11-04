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
    @foreach($tasks as $task)
        <tr>
            <th scope="row">{{$count++}}</th>
            <td><a href="/tasks/{{$task->id}}" style="color: red">{{$task->name}}</a>
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
