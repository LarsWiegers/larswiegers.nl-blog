@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-crud">
                        <div class="panel-heading-left">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="panel-heading-right">
                            <ul>
                                <li>
                                    <a href="{{route('categories.create')}}">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($categories as $category)
                                {{$category}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection("content")