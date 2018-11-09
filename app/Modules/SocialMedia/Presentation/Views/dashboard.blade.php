@extends('SocialMedia::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                @foreach($charts as $chart)
                                    @component('SocialMedia::Components.chart', ['chart' => $chart])@endcomponent
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
