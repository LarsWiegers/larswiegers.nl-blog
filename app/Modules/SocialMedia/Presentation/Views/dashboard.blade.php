@extends('Backend::layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/backend-social-media.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">SocialMedia</div>
                    <div class="panel-body">
                        @if(isset($accounts))
                            <div class="social-boxes">
                                @foreach($accounts as $account)
                                    <div class="{{strtolower($account->accountType->name)}} social-box">
                                        <h3>{{$account->getLatestCount()}}</h3>
                                        <p>{{$account->accountType->name}}</p>
                                        <a href="{{$account->url}}">
                                            <div class="url-beam">
                                                Ga naar {{$account->accountType->name}}
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

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
@section("scripts")
    @if(!is_null($chart))
        @yield('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script>
		const timeFormat = 'MM/DD/YYYY HH:mm';
		function newDateString(days) {
			return moment().add(days, 'd').format(timeFormat);
		}
    </script>
@endsection
