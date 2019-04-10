<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    <div class="top-bar">
        <div class="left">
            Dashboard
        </div>
        <div class="right">
            <nav class="nav">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke="white" fill="white" stroke-width="0.5"
                         fill-opacity="0.4" stroke-opacity="0.4"
                         width="24" height="24" viewBox="0 0 24 24">
                        <path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z"></svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke="white" fill="white" stroke-width="0.5"
                         fill-opacity="0.4" stroke-opacity="0.4"
                         width="36" height="36" viewBox="0 0 24 24">
                        <path d="M19.803 13.207l-.829 1.093-1.554-3.826c-.077-.189-.244-.306-.437-.306-.157 0-.356.084-.444.321l-1.356 3.664-1.872-8.759c-.062-.291-.288-.394-.462-.394-.203 0-.428.131-.473.424l-1.629 10.581-1.658-6.968c-.067-.282-.291-.382-.463-.382-.167 0-.374.092-.453.349l-1.453 4.753-1.07-2.53c-.078-.185-.245-.299-.436-.299-.154 0-.294.076-.385.209l-1.257 1.805-.087.058h-2.985c-.276 0-.5.224-.5.5s.224.5.5.5h3.284c.152 0 .296-.074.386-.206l.948-1.353 1.24 2.929c.079.187.241.299.433.299.211 0 .39-.138.455-.35l1.324-4.332 1.814 7.629c.068.283.282.384.46.384.203 0 .428-.131.473-.425l1.605-10.425 1.673 7.83c.058.272.277.395.467.395.202 0 .366-.12.441-.321l1.5-4.049 1.426 3.51c.077.189.245.306.438.306.152 0 .292-.075.382-.206l1.146-1.583.087-.046h3.026c.272 0 .492-.22.492-.492s-.22-.494-.492-.494h-3.322c-.151 0-.294.077-.383.207z"></svg>
                </a>
                <a href="#" class="dropdown-trigger">
                    <img src="https://demos.creative-tim.com/black-dashboard-react/static/media/anime3.bd6820f1.png" />
                    <i class="fa fa-chevron-down"></i>
                </a>

                <ul class="dropdown">

                    <li>
                        <a href="{{ route('profile') }}">
                            Profile
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <main>
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('backend-home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        <!-- Authentication Links -->
                        <li>
                            <a href="{{route('social-index')}}">Social Media</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Blog <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{route('backend.blog.index')}}">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.categories.index')}}">
                                        Categories
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.posts.index')}}">
                                        Posts
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.templates.index')}}">
                                        Templates
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('backend.visitors.home')}}">Visitors</a>
                        </li>
                        <li>
                            <a href="{{route('backend.contact.index')}}">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content-container">
            @yield('content')
        </div>
        <search></search> <!-- vuejs component -->
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/backend.js') }}"></script>
@yield('scripts')
</body>
</html>
