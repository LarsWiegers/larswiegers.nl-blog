<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Lars Wiegers Homepage">
        <link rel="icon" type="image/png" href="{{asset('icons/favicon/favicon-32x32.png')}}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{asset('icons/favicon/favicon-16x16.png')}}" sizes="16x16" />

        <title>Lars Wiegers Blog</title>
        <meta name="theme-color" content="#317EFB"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/home-main.css')}}" />
        <link rel="manifest" href="{{asset('manifest.json')}}" />
    </head>
    <body>
        @yield("body")
        @yield("scripts")
        <script src="{{asset("js/app.js")}}"></script>
        <script src="{{asset("js/main.js")}}"></script>
    </body>
</html>
