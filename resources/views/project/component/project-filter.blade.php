<form method="GET" action="#">
    <div class="input-group vodafone_project-component-project-filter__filter-input">
        <input type="text"
               name="search"
               class="form-control rounded vodafone_project-component-project-filter__form-control"
               placeholder={{__('messages.search')}}
                                               aria-label="Search"
               aria-describedby="search-addon"
               value="{{request('search')}}"/>
        <button class="btn btn-outline-primary vodafone_project-component-project-filter__button--button-grey">
            {{__('messages.search')}}
        </button>
    </div>
</form>
