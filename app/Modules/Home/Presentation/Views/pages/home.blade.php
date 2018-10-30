@extends("Blog::layouts.welcome")
@section("body")
    <div id="app">
        <section class="top-bar">
            <input type="checkbox" class="top-bar__nav-checkbox" id="top-bar__nav-checkbox" name="top-bar__nav-checkbox">
            <section class="top-bar__nav-mobile">
                <label for="top-bar__nav-checkbox" title="mobile menu">
                    <i class="fa fa-bars" title="mobile menu"></i>
                </label>
            </section>
            <nav class="top-bar__nav">
                <a class="top-bar__nav__link" href="/home">Lars Wiegers</a>
                <a class="top-bar__nav__link" href="/home">Home</a>
                <a class="top-bar__nav__link" href="{{route('blog.index')}}">Blog</a>
                <a class="top-bar__nav__link" href="/home">Projects</a>
                <a class="top-bar__nav__link" href="/home">Contact</a>
            </nav>
            <section class="top-bar__actions">
                <a href="#" class="top-bar__actions__icon" title="search">
                    <i class="fa fa-search" title="search"></i>
                </a>
                <a href="#" class="top-bar__actions__icon"title="linkedin">
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
        <section class="blog-pills">
            <ul class="blog-pills__list">
                @if($request->segment(2) == null)
                    <li class="blog-pills__list__item blog-pills__list__item--active">
                @else
                    <li class="blog-pills__list__item">
                @endif
                        <a href="{{route('categories.show', ['slug' => 'all'])}}" class="blog-pills__list__link">All</a>
                    </li>
                @foreach($categories as $category)
                    @if($category->slug == $request->segment(2))
                        <li class="blog-pills__list__item blog-pills__list__item--active">
                            @else
                        <li class="blog-pills__list__item">
                    @endif
                        <a href="{{route('categories.show', ['slug' => $category->slug])}}"
                           class="blog-pills__list__link">
                            {{$category->title}}</a>
                    </li>
                @endforeach
            </ul>
        </section>
        <section class="blog-cards">
            @foreach($posts as $post)
                <div class="blog-cards__card">
                    <a href="{{route("blog.show",['id' => $post->id])}}">
                        <div class="blog-cards__card__image-container">
                            <img class="blog-cards__card__image" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/sites/11/2016/11/1-1024x777.jpg">
                        </div>
                        <div class="blog-cards__card__text-container">
                            <div class="info">
                                by <span class="author">{{$post->author->name}}</span>
                                <span class="date">{{$post->created_at->format('l jS \\of F Y')}}</span>
                            </div>
                            <div class="title">
                                <h3>{{$post->title}}</h3>
                            </div>
                            <div class="content">
                                {{$post->content}}
                            </div>
                        </div>
                        <div class="blog-cards__card__comment-section">
                            <hr class="blog-cards__card__comment-line">
                            <span class="blog-cards__card__comment-bubble-container">
                                <span class="blog-cards__card__comment-bubble">

                                <i class="fa fa-comment-o"></i> {{123}}
                                </span>
                            </span>
                        </div>
                    </a>
                </div>

            @endforeach
        </section>
    </div>
@endsection("body")