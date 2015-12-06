<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ elixir("assets/css/app.css") }}">
        
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="content">
                @include('parts.navbar')
                <div class="title">Laravel 5</div>
                <i class="material-icons">face</i>
            </div>
        </div>
    </body>
    
    <script src="{{ elixir("assets/js/all.js") }}" />
    <script>
        $.material.init();
    </script

</html>
