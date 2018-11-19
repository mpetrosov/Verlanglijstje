<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon white"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? "nav-active" : "" }}" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? "nav-active" : "" }}" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
                @include('partials/_form_register')
            </li>
            <li class="nav-item">
                @include('partials/_form_login')
            </li>
        </ul>
    </div>
</nav>

