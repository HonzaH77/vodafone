<form method="GET" action="#" class="form-inline">
    <div class="form-group mr-2">
        <input type="text"
               name="search"
               class="form-control rounded"
               placeholder={{__('messages.writeSomething')}}
                                               aria-label="Search"
               aria-describedby="search-addon"
               value="{{request('search')}}"/>
    </div>
    <div class="form-group mr-2">
        <select class="form-control" name="type">
            @if(is_null(request("type")))
                <option selected="selected"
                        disabled>{{__('messages.type')}}</option>
            @endif
            <option @if(request("type") == "requirement")
                        {{ "selected='selected" }}
                    @endif
                    value="requirement">{{__('messages.requirement')}}
            </option>
            <option @if(request("type") == "mistake")
                        {{ "selected='selected" }}
                    @endif
                    value="mistake">{{__('messages.mistake')}}
            </option>
        </select>
    </div>
    <div class="form-group mr-2">
        <select class="form-control" name="state">
            @if(is_null(request("state")))
                <option selected="selected"
                        disabled>{{ __("messages.state") }}</option>
            @endif
            <option @if(request("state") == "denied")
                        {{ "selected='selected" }}
                    @endif
                    value="denied">{{__('messages.denied')}}
            </option>
            <option @if(request("state") == "done")
                        {{ "selected='selected" }}
                    @endif
                    value="done">{{__('messages.done')}}
            </option>
            <option @if(request("state") == "new")
                        {{ "selected='selected" }}
                    @endif
                    value="new">{{__('messages.new')}}
            </option>
            <option @if(request("state") == "in process")
                        {{ "selected='selected" }}
                    @endif
                    value="in process">{{__('messages.inProcess')}}
            </option>
        </select>
    </div>
    <button type="submit" class="btn btn-secondary button-color-red">
        {{ __("messages.filter") }}</button>
</form>
