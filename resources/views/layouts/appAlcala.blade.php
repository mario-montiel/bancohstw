<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="css/sweetalert2.css">

        <title>HSTW</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        @include('globals.navbar')
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
        @include('globals.footer')
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mdb/mdb.js') }}"></script>
    <script src="js/jquery.js"></script>
    <script src="js/fontawesome.js"></script>
</html>
