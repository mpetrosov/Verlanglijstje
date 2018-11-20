<?php 
    if ($user = Auth::user()){
?>
<li class="nav-item">
    <a class="nav-link" 
    href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
</li>
<?php
    }
?>