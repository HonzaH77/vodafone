<form method="POST" action="">
    @csrf
    <div class="form-outline mb-4 vodafone_task-component-create-form__form-outline">
        <label class="form-label vodafone_task-component-create-form__form-label" for="name">{{__('messages.name')}}
            <input name="name" type="text" id="name" class="form-control form-control-lg vodafone_task-component-create-form__form-control"
                   required
                   placeholder={{__('messages.enterName')}}
                                               value="{{old('name')}}"/>
        </label>
    </div>
    @error('name')
    <p class="text-red-500 text-xs mt-1 vodafone_task-component-create-form__error-message"> {{$message}}</p>
    @enderror

    <div class="form-outline mb-4 vodafone_task-component-create-form__form-outline">
        <label class="form-label vodafone_task-component-create-form__form-label" for="endDate">{{__('messages.endDate')}}
            <input name="endDate" type="date" id="endDate"
                   class="form-control form-control-lg vodafone_task-component-create-form__form-control" placeholder="YYYY/MM/DD" required
                   value="{{old('endDate')}}"/>
        </label>

    </div>
    @error('endDate')
    <p class="text-red-500 text-xs mt-1 vodafone_task-component-create-form__error-message"> {{$message}}</p>
    @enderror

    <div class="form-outline mb-4 vodafone_task-component-create-form__form-outline">
        <div>
            <label class="form-label vodafone_task-component-create-form__form-label" for="type">{{__('messages.taskType')}}</label>
        </div>
        <div class="form-check form-check-inline vodafone_task-component-create-form__form-check">
            <label class="form-check-label vodafone_task-component-create-form__form-check-label" for="inlineRadio1">{{__('messages.mistake')}}
                <input class="form-check-input vodafone_task-component-create-form__form-check-input" type="radio" name="type"
                       id="mistake" value="mistake">
            </label>
        </div>
        <div class="form-check form-check-inline vodafone_task-component-create-form__form-check-inline">
            <label class="form-check-label vodafone_task-component-create-form__form-check-label"
                   for="inlineRadio2">{{__('messages.requirement')}}
                <input class="form-check-input vodafone_task-component-create-form__form-check-input" type="radio" name="type"
                       id="requirement" value="requirement">
            </label>
        </div>
    </div>
    @error('type')
    <p class="text-red-500 text-xs mt-1 vodafone_task-component-create-form__error-message"> {{$message}}</p>
    @enderror

    <button type="submit"
            class="btn btn-lg btn-primary  btn-outline-secondary font-weight-bold btn-block vodafone_task-component-create-form__submit-button">
        {{__('messages.createTask')}}
    </button>
</form>
