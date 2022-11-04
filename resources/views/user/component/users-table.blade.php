<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.username')}}</th>
        <th scope="col">{{__('messages.email')}}</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->getId()}}</th>
            <td>{{$user->getUsername()}}</td>
            <td>{{$user->getEmail()}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
{{$users->appends(Request::except("page"))->links()}}
