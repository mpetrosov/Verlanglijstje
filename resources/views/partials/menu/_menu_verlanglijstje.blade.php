<?php 
    if ($user = Auth::user()){
?>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('/nieuw') ? "nav-active" : "" }}" href="/nieuw">nieuwe lijst</a>
    </li>
<?php
    }
?>


