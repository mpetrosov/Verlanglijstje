<?php 
    if (!$user = Auth::user()){
?>
    <li class="nav-item">
        @include('partials/menu/_form_register')
    </li>
<?php
    }
?>


