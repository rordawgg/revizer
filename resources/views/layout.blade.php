<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href={{ asset("css/lib/Skeleton/css/normalize.css") }}>
        <link rel="stylesheet" href={{ asset("css/lib/Skeleton/css/skeleton.css") }}>
        <link rel="stylesheet" href={{ asset("css/app.css") }}>
        <title>@yield("title")</title>
    </head>



    <body>
        @include("partial.nav")
        
        <div class="container">
            @include("partial.message")
            
            @yield("content")
        
            @yield("footer")
        </div>
    </body>

</html>