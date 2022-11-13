<table class="table table-striped vodafone_task-component-history-table__table">
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
    @foreach($history as $hist)
        <tr>
            <th scope="row">{{$count}}</th>
            <td>{{$hist->getCreatedAt()}}</td>
            <td>
                @if($hist->getState() == 'in process')
                    <button type="button"
                            class="btn btn-warning vodafone_task-component-history-table__state">{{__('messages.inProcess')}}</button>
                @endif
                @if($hist->getState() == 'done')
                    <button type="button"
                            class="btn btn-success vodafone_task-component-history-table__state">{{__('messages.done')}}</button>
                @endif
                @if($hist->getState() == 'new')
                    <button type="button"
                            class="btn btn-secondary vodafone_task-component-history-table__state">{{__('messages.new')}}</button>
                @endif
                @if($hist->getState() == 'denied')
                    <button type="button"
                            class="btn btn-danger vodafone_task-component-history-table__state">{{__('messages.denied')}}</button>
                @endif
            </td>

            <td>{{$hist->getComment()}}</td>
    @endforeach
    </tbody>
</table>
