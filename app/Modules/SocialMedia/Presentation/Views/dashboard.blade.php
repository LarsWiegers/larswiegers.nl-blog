@extends('SocialMedia::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">SocialMedia</div>
                    <div class="panel-body">
                        @if(isset($accounts))
                            @foreach($accounts as $account)
                                <div class="col-md-3 {{strtolower($account->name)}} social-box">
                                    <h3>{{$account->getLatestCount()}}</h3>
                                    <p>{{$account->name}}</p>
                                    <a href="{{$account->url}}">
                                        <div class="url-beam">
                                            Ga naar {{$account->name}}
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        <div class="container-fluid">
                            <div class="col-md-12">
                                @if(!is_null($chart))
                                    @component('SocialMedia::Components.chart', ['chart' => $chart])@endcomponent
                                    @else
                                    Please add a social media account via the profile page. Which you can find
                                    <a href="{{route('profile')}}">here</a>.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
