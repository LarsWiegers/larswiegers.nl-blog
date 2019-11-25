@extends('Backend::layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend-blog.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body blog-dashboard">
                        <div class="categories social-box">
                            <h3>{{count($categories)}}</h3>
                            <p>Category</p>
                            <a href="{{route('backend.categories.index')}}">
                                <div class="url-beam">
                                    Ga naar Category
                                    <i class="fa fa-arrow-circle-right"></i>
                                </div>
                            </a>
                        </div>
                        <div class="posts social-box">
                            <h3>{{count($posts)}}</h3>
                            <p>Posts</p>
                            <a href="{{route('backend.posts.index')}}">
                                <div class="url-beam">
                                    Ga naar Posts
                                    <i class="fa fa-arrow-circle-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
