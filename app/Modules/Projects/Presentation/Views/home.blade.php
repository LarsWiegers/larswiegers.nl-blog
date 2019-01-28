@extends("Projects::layouts.app")
@section("body")
    <div class="card-container">
        @foreach($repositories as $repository)
            <div class="card">
                <a href="{{$repository['html_url']}}">
                    <h1>{{$repository['name']}}</h1>
                    <p>
                        {{$repository['description']}}
                    </p>
                    <div class="bottom-row">
                        <h6>
                            Created
                            at: {{Carbon\Carbon::createFromTimeString($repository['created_at'])->format('Y-m-d i:s')}}
                        </h6>
                        <h6>
                            Updated
                            at: {{Carbon\Carbon::createFromTimeString($repository['updated_at'])->format('Y-m-d i:s')}}
                        </h6>
                    </div>
                </a>

            </div>
        @endforeach
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/projects.css')}}">
@endsection
