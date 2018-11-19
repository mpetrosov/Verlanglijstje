<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="/">
        {{-- <img src="../images/logo.png" class="logo"> --}}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? "nav-active" : "" }}" href="/">Home</a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Request::is('wat-is-aardbeleving') ? "nav-active" : "" }}" href="/wat-is-aardbeleving">Over ons</a> --}}
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('beving-wijzer') ? "nav-active" : "" }}" href="/beving-wijzer">Beving<i>wijzer</i></a>
            </li> --}}
            <li class="nav-item">
                {{-- <a class="nav-link {{ Request::is('posts') ? "nav-active" : "" }}" href="/posts">Verhalen</a> --}}
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? "nav-active" : "" }}" href="/contact">Contact</a>
            </li>
    </ul>
    </div>
    {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-right navbar-nav ml-auto">
            <li class="nav-item">
                @include('partials/_form_register')
            </li>
            <li class="nav-item">
                @include('partials/_form_login')
            </li>
        </ul>
    </div> --}}
</nav>

