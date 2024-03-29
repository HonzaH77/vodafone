@if (count($attachments) > 0)
    <table class="table table-striped vodafone_project-component-create-attachment-table__table">
        <thead>
        <tr>
            <th scope="col">{{__('messages.date')}}</th>
            <th scope="col">{{__('messages.name')}}</th>
        </tr>
        </thead>
        @endif
        <tbody>
        @foreach($attachments as $attachment)
            <tr>
                <th scope="row">{{$attachment->created_at}}</th>
                <td>
                    <a href="{{$project->getId()}}/attachment/{{$attachment->id}}">{{$attachment->file_name}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
