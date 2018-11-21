@extends("Blog::layouts.app")
@section("body")
        @if(count($posts) <= 0)
            <div class="no-content-error">
                <h1> It seems like there is no content here.</h1>
                <p>
                    Do you believe this is wrong? please contact me so I can fix it.
                    Please email me <a href="mailto:larswiegers@live.nl">larswiegers@live.nl</a>
                    or use the contact form which you can find <a href="{{route('contact.index')}}">here</a>.
                </p>

            </div>
            @else
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
        @endif

    </div>
@endsection("body")