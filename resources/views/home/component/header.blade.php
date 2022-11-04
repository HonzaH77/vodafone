<nav class="navbar bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset("img/Vodafone_icon.png")}}" alt="Vodafone_icon" width="190" height="50">
        </a>
        @auth
            <span class="font-weight-bold">{{auth()->user()->username}}</span>
            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-lg btn-outline-secondary text-white font-weight-bold btn-bg-red"
                        type="submit">{{__('messages.logout')}}
                </button>
            </form>
        @else
            <form class="">
                <a class="btn btn-lg btn-outline-secondary text-white font-weight-bold btn-bg-red"
                   type="button" href="/login">{{__('messages.login')}}
                </a>
                <a class="btn btn-lg btn-outline-secondary text-white font-weight-bold btn-bg-red"
                   type="button" href="/register">{{__('messages.registration')}}
                </a>
            </form>
        @endauth


    </div>
    @include('home.component.language-switcher')
</nav>

<!-- Main Picture-->
<section>
    <div class="row">
        <img class='img-fluid w-100' src="{{asset("img/mainPicture.jpg")}}" alt="Main Picture" width="">
    </div>
</section>
