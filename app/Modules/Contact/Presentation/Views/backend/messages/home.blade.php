@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-crud">
                        <div class="panel-heading-left">
                            <h1>Contact messages</h1>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>text</th>
                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th>view</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>
                                                {{$message->name}}
                                            </td>
                                            <td>
                                                {{$message->email}}
                                            </td>
                                            <td>
                                                {{$message->text}}
                                            </td>
                                            <td>
                                                {{$message->created_at}}
                                            </td>
                                            <td>
                                                {{$message->updated_at}}
                                            </td>
                                            <td>
                                                <a href="{{route('backend.contact.show',['message' => $message])}}">
                                                    <i class="fa fa-address-book"></i>
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
    </div>
@endsection("content")
