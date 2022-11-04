<form method="POST" action="/new-project">
    @csrf
    <div class="form-outline mb-4 vodafone_project-component-create-form__form">
        <label class="form-label vodafone_project-component-create-form__form-label" for="name">{{__('messages.name')}}
            <input name="name" type="text" id="name"
                   class="form-control form-control-lg vodafone_project-component-create-form__form-control"
                   placeholder={{__('messages.enterName')}} value="{{old('name')}}"
                   required/>
        </label>
    </div>
    @error('name')
    <p class="text-red-500 text-xs mt-1 vodafone_project-component-create-form__form-description"> {{$message}}</p>
    @enderror

    <div class="form-outline mb-4 vodafone_project-component-create-form__form">
        <label class="form-label vodafone_project-component-create-form__form-label"
               for="description">{{__('messages.description')}}
            <input name="description" type="text" id="description"
                   class="form-control form-control-lg vodafone_project-component-create-form__form-control"
                   placeholder={{__('messages.projectDescription')}}
                   value="{{old('description')}}" required/>
        </label>
    </div>
    @error('description')
    <p class="text-red-500 text-xs mt-1 vodafone_project-component-create-form__form-description"> {{$message}}</p>
    @enderror

    <button type="submit"
            class="btn btn-lg btn-primary  btn-outline-secondary vodafone_project-component-create-form__submit-button btn-block">
        {{__('messages.createProject')}}
    </button>
</form>
