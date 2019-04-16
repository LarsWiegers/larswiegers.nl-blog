@extends('Backend::layouts.app')
@section('content')
    <div class="container" id="graph-container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <graph ref="graph"></graph>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/people.js')}}"></script>
@endsection
