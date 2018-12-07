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
                                    <h3>32</h3>
                                    <p>Daily Visitors</p>
                                    @if(true)
                                        <div class="stats visitor-up">
                                            <i class="fa fa-arrow-up"></i>
                                            <span class="how-much">20 %</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="visitor-monthly visitor-box">
                                    <h3>320</h3>
                                    <p>Monthly Visitors</p>
                                    @if(false)

                                        @else
                                        <div class="stats visitor-down">
                                            <i class="fa fa-arrow-down"></i>
                                            <span class="how-much">20 %</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="visitor-yearly visitor-box">
                                    <h3>32000</h3>
                                    <p>Yearly Visitors</p>
                                    @if(true)
                                        <div class="stats visitor-up">
                                            <i class="fa fa-arrow-up"></i>
                                            <span class="how-much">20 %</span>
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
