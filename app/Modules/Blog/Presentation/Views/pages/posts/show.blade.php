@extends("Blog::layouts.content")
@section("headerBannerMainTitle")
    {{$post->title}}
@endsection
@section("headerBannerSubTitle")
    By {{$post->author->name}}
@endsection
@section("body")
    <div id="app">

    </div>
@endsection