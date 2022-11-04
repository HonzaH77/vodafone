<form method="POST" action="{{$project->getId()}}/attachment" enctype="multipart/form-data">
    @csrf
    <label class="form-label" for="file">{{__('messages.uploadAttachments')}}</label>
    <input name="file_name" type="file" class="form-control" id="file" required/>

    <button type="submit"
            class="btn btn-sm btn-primary btn-outline-secondary font-weight-bold button-color-grey btn-block">
        {{__('messages.submitAttachment')}}
    </button>
</form>
