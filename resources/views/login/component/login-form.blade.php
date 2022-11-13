<form method="POST" action="{{route('loginSubmit')}}">
    @csrf
    <div class="form-outline mb-4 vodafone_login-component-login-form__form-outline">
        <label class="form-label vodafone_login-component-login-form__form-label" for="email">{{__('messages.email')}}
            <input name="email" type="email" id="email"
                   class="form-control form-control-lg vodafone_login-component-login-form__form-control"
                   required
                   placeholder={{__('messages.enterEmail')}}
                   value="{{old('email')}}"/>
        </label>
    </div>
    @error('email')
    <p class="text-red-500 text-xs mt-1 vodafone_login-component-login-form__error-message"> {{$message}}</p>
    @enderror

    <div class="form-outline mb-4 vodafone_login-component-login-form__form-outline">
        <label class="form-label vodafone_login-component-login-form__form-label"
               for="password">{{__('messages.password')}}
            <input name="password" type="password" id="password" required
                   class="form-control form-control-lg vodafone_login-component-login-form__form-control"
                   placeholder={{__('messages.enterPassword')}}/>
        </label>
    </div>
    @error('password')
    <p class="text-red-500 text-xs mt-1 vodafone_login-component-login-form__error-message"> {{$message}}</p>
    @enderror

    <button type="submit"
            class="btn btn-lg btn-primary btn-outline-secondary font-weight-bold btn-block vodafone_login-component-login-form__submit-button">
        {{__('messages.login')}}
    </button>
</form>
