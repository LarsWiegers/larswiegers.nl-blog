<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lars Wiegers Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="manifest" href="./manifest.json">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
</head>
<body>
<div id="app">
    @extends("Blog::layouts.content")
    @section("headerBannerMainTitle")
        {{$post->title}}
    @endsection
    @section("headerBannerSubTitle")
        By {{$post->author->name}}
    @endsection
    @section("body")
        <div id="app">
            <div class="post-content">
                <p>
                    {{$post->content}}
                </p>
            </div>
        </div>
    @endsection
@yield("scripts")
<script src="{{asset("js/blog.js")}}"></script>
<script src="{{asset("main.js")}}"></script>
</body>
</html>
