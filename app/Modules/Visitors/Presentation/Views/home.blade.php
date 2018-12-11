@extends('Backend::layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/backend-visitors.css')}}" type="text/css">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Visitors dashboard</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="visitor-boxes">
                                <div class="visitor-daily visitor-box">
                                    <h3>{{$allToday}}</h3>
                                    <p>Daily Visitors</p>
                                    @if($allToday > $previousToday)
                                        <div class="stats visitor-up">
                                            <i class="fa fa-arrow-up"></i>
                                            <span class="how-much">
                                                {{round(($allToday  - $previousToday) / $allToday * 100)}} %
                                            </span>
                                        </div>
                                    @else
                                        <div class="stats visitor-down">
                                            <i class="fa fa-arrow-down"></i>
                                            <span class="how-much">
                                                {{round(($previousToday - $allToday ) / $previousToday * 100)}} %</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="visitor-monthly visitor-box">
                                    <h3>{{$allMonth}}</h3>
                                    <p>Monthly Visitors</p>
                                    @if($allMonth > $previousMonth)
                                        <div class="stats visitor-up">
                                            <i class="fa fa-arrow-up"></i>
                                            <span class="how-much">
                                                {{round(($allMonth - $previousMonth) / $allMonth * 100)}} %
                                            </span>
                                        </div>
                                    @else
                                        <div class="stats visitor-down">
                                            <i class="fa fa-arrow-down"></i>
                                            <span class="how-much">
                                                {{round(($previousMonth  - $allMonth) / $previousMonth * 100)}} %
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="visitor-yearly visitor-box">
                                    <h3>{{$allYear}}</h3>
                                    <p>Yearly Visitors</p>
                                    @if($allYear > $previousYear)
                                        <div class="stats visitor-up">
                                            <i class="fa fa-arrow-up"></i>
                                            <span class="how-much">
                                                {{round(($allYear  - $previousYear) / $allYear * 100)}} %
                                            </span>
                                        </div>
                                    @else
                                        <div class="stats visitor-down">
                                            <i class="fa fa-arrow-down"></i>
                                            <span class="how-much">
                                                {{round(($previousYear  - $allYear) / $previousYear * 100)}} %</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
