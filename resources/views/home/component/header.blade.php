<nav class="navbar bg-light vodafone_home-component-header__nav">
    <div class="container vodafone_home-component-header__container">
        <a class="navbar-brand vodafone_home-component-header__navbar-brand" href="/">
            <img src="{{asset("img/Vodafone_icon.png")}}" alt="Vodafone_icon" width="190" height="50">
        </a>
        @auth
            <span class="font-weight-bold vodafone_home-component-header__username">{{auth()->user()->username}}</span>
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <button class="btn btn-lg btn-outline-secondary text-white  btn-bg-red vodafone_home-component-header__logout"
                        type="submit">{{__('messages.logout')}}
                </button>
            </form>
        @else
            <form class="">
                <a class="btn btn-lg btn-outline-secondary text-white btn-bg-red vodafone_home-component-header__login"
                   type="button" href="{{route('login')}}">{{__('messages.login')}}
                </a>
                <a class="btn btn-lg btn-outline-secondary text-white btn-bg-red vodafone_home-component-header__registration"
                   type="button" href="{{route('register')}}">{{__('messages.registration')}}
                </a>
            </form>
        @endauth


    </div>
    @include('home.component.language-switcher')
</nav>

<!-- Main Picture-->
<section>
    <div class="row vodafone_home-component-header__row">
        <img class='img-fluid w-100 vodafone_home-component-header__main-picture' src="{{asset("img/mainPicture.jpg")}}" alt="Main Picture" width="">
    </div>
</section>
