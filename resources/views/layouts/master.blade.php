<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Linkzone</title>

        <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/custom.css') !!}">

        <script src="{!! asset('assets/js/jquery-3.2.1.min.js') !!}"></script>
        <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('assets/js/custom.js') !!}"></script>
    </head>
    <body>
        @include('partials.navigation')

        <div class="container">
            @include('partials.alerts')
            @yield('content')
        </div>
    </body>
</html>