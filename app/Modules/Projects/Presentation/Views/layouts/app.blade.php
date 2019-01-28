<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lars Wiegers Blog">
    <link rel="icon" type="image/png" href="{{asset('icons/favicon/favicon-32x32.png')}}" sizes="32x32"/>
    <link rel="icon" type="image/png" href="{{asset('icons/favicon/favicon-16x16.png')}}" sizes="16x16"/>
    <title>Lars Wiegers Blog</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="manifest" href="./manifest.json">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    @yield('styles')
</head>
<body>
<div id="app">
    @component("Blog::layouts.navbar")@endcomponent
    @component("Blog::layouts.header-banner")
        @slot('backgroundUrl')
            @if(View::hasSection('headerBannerBackgroundUrl'))
                @yield('headerBannerBackgroundUrl')
            @else
                https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/11/2016/11/Blog_title_image.jpg
            @endif
        @endslot
        @slot('mainTitle')
            @if(View::hasSection('headerBannerMainTitle'))
                @yield('headerBannerMainTitle')
            @else
                Your ocean of posts
            @endif
        @endslot
        @slot('subTitle')
            @if(View::hasSection('headerBannerSubTitle'))
                @yield('headerBannerSubTitle')
            @else
                By Lars Wiegers
            @endif
        @endslot
    @endcomponent
    @yield("body")
    @yield("scripts")
    <script src="{{asset("js/blog.js")}}"></script>
    <script src="{{asset("main.js")}}"></script>
</body>
</html>
