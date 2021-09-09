<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        nav .badge{
            position: relative;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>

    @include('partials.menu')

    @auth
        @if (auth()->user()->blocked == 1)
            <h2>Not alowed</h2>
        @else
            @yield('content')
        @endif
    @endauth
    @guest
        @yield('content')
    @endguest

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });

        //select option
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>
