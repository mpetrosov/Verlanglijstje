<?php 
    if ($user = Auth::user()){
?>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/verlanglijstjes') ? "nav-active" : "" }}" href="/verlanglijstjes/">mijn lijstje(s)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/verlanglijstjes/create') ? "nav-active" : "" }}" href="/verlanglijstjes/create">nieuwe lijst</a>
    </li>
<?php
    }
?>


