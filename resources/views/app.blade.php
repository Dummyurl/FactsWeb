<!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" id="_tokens" content="{{ csrf_token() }}">
        <title>Facts Nepal</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/line-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/line-awesome-font-awesome.css') }}" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css"> -->

    </head>
    <body>
        <div id="app"></div>

        <!-- <script src="http://localhost:8080/js/bundle.js"></script> -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    </html>