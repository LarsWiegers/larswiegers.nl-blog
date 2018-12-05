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