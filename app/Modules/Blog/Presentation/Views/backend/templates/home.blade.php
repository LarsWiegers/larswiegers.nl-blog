@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-crud">
                        <div class="panel-heading-left">
                            <h1>Templates</h1>
                        </div>
                        <div class="panel-heading-right">
                            <a href="{{route('backend.templates.create')}}">
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
                                        <th>path</th>
                                        <th>edit</th>
                                        <th>destroy</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($templates as $template)
                                        <tr>
                                            <td>
                                                {{$template->title}}
                                            </td>
                                            <td>
                                                {{$template->path}}
                                            </td>
                                            <td>
                                                <a href="{{route('backend.templates.edit',
                                                ['category' => $template->id])}}">
                                                    <i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('backend.templates.destroy',
                                                ['post' => $template->id])}}"   onclick="event.preventDefault();
                                                     document.getElementById('destroy-template-{{$template->id}}').submit();">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="destroy-template-{{$template->id}}" action="
    {{route('backend.templates.destroy', ['template' => $template->id])}}" style="display: none;"  method="post">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            @if(count($templates) <= 0)
                                <h1>There are no templates yet!</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection("content")