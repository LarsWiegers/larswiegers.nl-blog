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
                            <a href="{{route('backend.categories.create')}}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>description</th>
                                        <th>public</th>
                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th>slug</th>
                                        <th>link</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                {{$category->title}}
                                            </td>
                                            <td>
                                                {{$category->description}}
                                            </td>
                                            <td>
                                                {{($category->title === 1 ? 'yes' : 'no')}}
                                            </td>
                                            <td>
                                                {{$category->created_at}}
                                            </td>
                                            <td>
                                                {{$category->updated_at}}
                                            </td>
                                            <td>
                                                {{$category->slug}}
                                            </td>
                                            <td>
                                                <a href="{{route('categories.show',['category' => $category->slug])}}">Link</a>
                                            </td>
                                            <td>
                                                <a href="{{route('backend.categories.edit',
                                                ['category' => $category->id])}}">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('backend.categories.destroy',
                                                ['category' => $category->id])}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
@endsection("content")