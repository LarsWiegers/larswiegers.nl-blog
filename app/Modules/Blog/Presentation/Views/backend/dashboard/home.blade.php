@extends('Blog::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 categories social-box">
                                <h3>{{count($categories)}}</h3>
                                <p>Category</p>
                                <a href="{{route('backend.categories.index')}}">
                                    <div class="url-beam">
                                        Ga naar Category
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 posts social-box">
                                <h3>{{count($posts)}}</h3>
                                <p>Posts</p>
                                <a href="{{route('backend.categories.index')}}">
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
    </div>
@endsection