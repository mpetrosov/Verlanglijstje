<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon white"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? "nav-active" : "" }}" href="/">home</a>
            </li> --}}

            @include('partials/menu/_menu_verlanglijstje')

            @include('partials/menu/_menu_register')

            @include('partials/menu/_menu_login')

            @include('partials/menu/_form_logout')

        </ul>
    </div>
</nav>

