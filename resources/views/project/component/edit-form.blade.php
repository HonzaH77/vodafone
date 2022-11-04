<form method="POST" action="">
    @csrf
    <div class="form-outline mb-4 vodafone_project-component-edit-form__form">
        <label class="form-label vodafone_project-component-edit-form__form-label" for="name">{{__('messages.name')}}
            <input name="name" type="text" id="name"
                   class="form-control form-control-lg vodafone_project-component-edit-form__form-control"
                   placeholder={{__('messages.enterName')}} value="{{$original->name}}"
                   required/>
        </label>
    </div>
    @error('name')
    <p class="text-red-500 text-xs mt-1 vodafone_project-component-edit-form__form-description"> {{$message}}</p>
    @enderror
    <div class="form-outline mb-4 vodafone_project-component-edit-form__form">
        <label class="form-label input-lg vodafone_project-component-edit-form__form-label" for="description">{{__('messages.enterName')}}
            <input name="description" type="text" id="description"
                   class="form-control form-control-lg vodafone_project-component-edit-form__form-control" placeholder={{__('messages.projectDescription')}}
                                               value="{{$original->description}}" required/>
        </label>
    </div>
    @error('description')
    <p class="text-red-500 text-xs mt-1 vodafone_project-component-edit-form__form-description"> {{$message}}</p>
    @enderror

    <button type="submit"
            class="btn btn-primary btn-lg btn-outline-secondary vodafone_project-component-edit-form__submit-button btn-block">
        {{__('messages.save')}}
    </button>
</form>
