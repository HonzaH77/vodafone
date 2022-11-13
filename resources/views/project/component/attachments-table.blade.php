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
                <th scope="row">{{$attachment->getCreatedAt()}}</th>
                <td>
                    <a href="{{route('attachment', ['attachment' => $attachment->getId(), 'project' => $project->getId()])}}">{{$attachment->getFileName()}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
