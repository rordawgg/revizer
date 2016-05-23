<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href={{ asset("css/lib/normalize.css") }}>
        <link rel="stylesheet" href={{ asset("css/lib/skeleton.css") }}>
        <link rel="stylesheet" href={{ asset("css/app.css") }}>
        <title>@yield("title")</title>
    </head>



    <body>
        {{--@include("partial.nav")--}}
        @include("partial.small_nav")
        
        <div class="container">
            @include("partial.message")
            
            @yield("content")
        
            @yield("footer")
        </div>
    </body>

</html>