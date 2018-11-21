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
    <section class="top-bar">
        <input type="checkbox" class="top-bar__nav-checkbox" id="top-bar__nav-checkbox" name="top-bar__nav-checkbox">
        <section class="top-bar__nav-mobile">
            <label for="top-bar__nav-checkbox" title="mobile menu">
                <i class="fa fa-bars" title="mobile menu"></i>
            </label>
        </section>
        <nav class="top-bar__nav">
            <a class="top-bar__nav__link" href="{{route('home')}}">Lars Wiegers</a>
            <a class="top-bar__nav__link" href="{{route('home')}}">Home</a>
            <a class="top-bar__nav__link" href="{{route('blog.index')}}">Blog</a>
            <a class="top-bar__nav__link" href="{{route('projects.index')}}">Projects</a>
            <a class="top-bar__nav__link" href="{{route('contact.index')}}">Contact</a>
        </nav>
        <section class="top-bar__actions">
            <a href="#" class="top-bar__actions__icon" title="search">
                <i class="fa fa-search" title="search"></i>
            </a>
            <a href="#" class="top-bar__actions__icon" title="linkedin">
                <i class="fa fa-linkedin" title="linkedin"></i>
            </a>
        </section>
        <section class="top-bar__actions__extra">
        </section>


    </section>
    <section class="header-banner">
        <div class="header-banner__background" style="background-image: url(https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/11/2016/11/Blog_title_image.jpg)"></div>
        <div class="header-banner__foreground">
            <h1 class="header-banner__foreground__main-title">
                Your ocean of posts
            </h1>
            <h2 class="header-banner__foreground__sub-title">
                By lars Wiegers
            </h2>
        </div>
    </section>
@yield("body")
@yield("scripts")
<script src="{{asset("js/blog.js")}}"></script>
<script src="{{asset("main.js")}}"></script>
</body>
</html>
