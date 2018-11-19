@include('/partials/_head')
    <body>
        <div class="wrapper">
            @include("/partials/_menu")
                
            @include('/partials/_header')
            
            @include('/partials/_messages')
            
            @yield('content')

            @include('/partials/_footer')
        </div>
    </body>
</html>
        
        