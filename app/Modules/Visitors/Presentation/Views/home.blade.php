@extends('Backend::layouts.app')
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
                        <div class="row">
                            @if(!is_null($chart))
                                @component('SocialMedia::Components.chart', ['chart' => $chart])@endcomponent
                            @else
                                Please add a social media account via the profile page. Which you can find
                                <a href="{{route('profile')}}">here</a>.
                            @endif
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Count</th>
                                        <th>url</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($urls as $url)
                                    <tr>
                                        <td>
                                            {{$url->value}}
                                        </td>
                                        <td>
                                            {{$url->url}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


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
