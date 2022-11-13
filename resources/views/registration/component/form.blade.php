<form method="POST" action="{{route('registration')}}">
    @csrf
    <div class="form-outline mb-4 vodafone_registration-component-form__form-outline">
        <label class="form-label vodafone_registration-component-form__form-label" for="username">{{__('messages.username')}}

            <input name="username"
                   type="text"
                   required
                   class="form-control form-control-lg vodafone_registration-component-form__form-control"
                   placeholder={{__('messages.enterUsername')}}
                   value="{{old('username')}}"/>
        </label>
    </div>
    @error('username')
    <p class="text-red-500 text-xs mt-1 vodafone_registration-component-form__error-message"> {{$message}}</p>
    @enderror

    <div class="form-outline mb-4 vodafone_registration-component-form__form-outline">
        <label class="form-label vodafone_registration-component-form__form-label" for="email">{{__('messages.email')}}
            <input name="email" type="email" id="email" class="form-control form-control-lg vodafone_registration-component-form__form-control"
                   required
                   placeholder={{__('messages.enterEmail')}}
                   value="{{old('email')}}"/>
        </label>
    </div>
    @error('email')
    <p class="text-red-500 text-xs mt-1 vodafone_registration-component-form__error-message"> {{$message}}</p>
    @enderror

    <div class="form-outline mb-4 vodafone_registration-component-form__form-outline">
        <label class="form-label vodafone_registration-component-form__form-label" for="password">{{__('messages.password')}}
            <input name="password" type="password" id="password" required
                   class="form-control form-control-lg vodafone_registration-component-form__form-control"
                   placeholder={{__('messages.enterPassword')}}/>
        </label>
    </div>
    @error('password')
    <p class="text-red-500 text-xs mt-1 vodafone_registration-component-form__error-message"> {{$message}}</p>
    @enderror

    <button type="submit"
            class="btn btn-lg btn-primary btn-outline-secondary btn-block vodafone_registration-component-form__submit-button">
        {{__('messages.register')}}
    </button>
</form>
