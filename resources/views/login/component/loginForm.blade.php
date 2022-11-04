<form method="POST" action="/login">
    @csrf
    <div class="form-outline mb-4">
        <label class="form-label" for="email">{{__('messages.email')}}
            <input name="email" type="email" id="email" class="form-control form-control-lg"
                   required
                   placeholder={{__('messages.enterEmail')}}
                                               value="{{old('email')}}"/>
        </label>
    </div>
    @error('email')
    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    @enderror

    <div class="form-outline mb-4">
        <label class="form-label" for="password">{{__('messages.password')}}
            <input name="password" type="password" id="password" required
                   class="form-control form-control-lg"
                   placeholder={{__('messages.enterPassword')}}/>
        </label>
    </div>
    @error('password')
    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    @enderror

    <button type="submit"
            class="btn btn-lg btn-primary  btn-outline-secondary font-weight-bold button-color-red btn-block">
        {{__('messages.login')}}
    </button>
</form>
