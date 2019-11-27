@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-crud">
                        <div class="panel-heading-left">
                            <h1>Posts</h1>
                        </div>
                        <div class="panel-heading-right">
                            @if(!is_null($category))
                                <a href="{{route('backend.posts.create',
                            ['category' => $category->id])}}">
                                @else
                                <a href="{{route('backend.posts.create')}}">
                            @endif
                                <i class="fa fa-plus"></i>
                            </a>
            </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>content</th>
                                        <th>public</th>
                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th>link</th>
                                        <th>edit</th>
                                        <th>delete</th>
                                        <th>author</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                {{$post->title}}
                                            </td>
                                            <td>
                                                {{$post->content}}
                                            </td>
                                            <td>
                                                {{($post->public === 1 ? 'yes' : 'no')}}
                                            </td>
                                            <td>
                                                {{$post->created_at}}
                                            </td>
                                            <td>
                                                {{$post->updated_at}}
                                            </td>
                                            <td>
                                                <a href="{{route('posts.show',
                                                ['slug' => $post->slug])}}">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('backend.posts.edit',
                                                ['post' => $post->id])}}">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('backend.posts.destroy',
                                                ['post' => $post->id])}}"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form-{{$post->id}}').submit();">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="logout-form-{{$post->id}}" action="
    {{route('backend.posts.destroy', ['post' => $post->id])}}" style="display: none;"  method="post">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{route('backend.users.index',
                                                ['user' => $post->author_id])}}">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            @if(count($posts) <= 0)
                                <h1>There are no posts yet!</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection("content")
