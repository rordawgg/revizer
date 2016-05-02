<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title>@yield("title")</title>
    </head>



    <body>
        @include("partial.nav")

        @include("partial.message")
    	
    	@yield("content")
    
    	@yield("footer")
    </body>

</html>