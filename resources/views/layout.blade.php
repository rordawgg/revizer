<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href={{ asset("css/lib/normalize.css") }}>
        <link rel="stylesheet" href={{ asset("css/lib/skeleton.css") }}>
        <link rel="stylesheet" href={{ asset("css/app.css") }}>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <title>@yield("title")</title>
    </head>



    <body>
        @include("partial.full_search")
        @include("partial.nav")
        @include("partial.small_nav")
        
        <div class="container">
            @include("partial.message")
            
            @yield("content")
        
            @yield("footer")
        </div>

        <script src={{ asset("js/app.js") }}></script>
        
        <hr>
        @include("partial.footer")
    </body>

</html>