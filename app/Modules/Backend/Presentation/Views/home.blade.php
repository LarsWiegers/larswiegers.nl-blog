@extends('Backend::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 instagram social-box">
                                @if(isset($instagramFollowers) && is_numeric($instagramFollowers))
                                    <h3>{{$instagramFollowers}}</h3>
                                    <p>
                                        Instagram followers
                                    </p>
                                    <a href="{{$instagramUrl}}">
                                        <div class="url-beam">
                                            Ga naar instagram
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </a>
                                @else
                                    <h3>Sorry</h3>
                                    <p>
                                        {{$instagramFollowers}}
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-3 youtube social-box">
                                @if(isset($youtubeSubscribers) && is_numeric($youtubeSubscribers))
                                    <h3>{{$youtubeSubscribers}}</h3>
                                    <p>
                                        Youtube Subscribers
                                    </p>
                                    <a href="{{$youtubeUrl}}">
                                        <div class="url-beam">
                                            Ga naar youtube
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </a>
                                @else
                                    <h3>Sorry</h3>
                                    <p>
                                        {{$youtubeSubscribers}}
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-3 twitter social-box">
                                @if(isset($twitterFollowers) && is_numeric($twitterFollowers))
                                    <h3>{{$twitterFollowers}}</h3>
                                    <p>
                                        Twitter followers
                                    </p>
                                    <a href="{{$twitterUrl}}">
                                        <div class="url-beam">
                                            Ga naar twitter
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </a>
                                @else
                                    <h3>Sorry</h3>
                                    <p>
                                        {{$twitterFollowers}}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
