@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if($type === "create")
                            <h1>Create a post</h1>
                            @elseif($type === "update")
                            <h1>Edit a post</h1>
                            @elseif($type === "show")
                            <h1>Show</h1>
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                @if($type === "create")
                                    {!! Form::open(['url' => route('backend.categories.store'), 'method' => 'POST']) !!}
                                    @elseif($type === "update")
                                    {!! Form::open(['url' => route('backend.categories.update', ['category' => $message->id]),
                                    'method' => 'PUT']) !!}
                                @endif

                                    {{ Form::textGroup([
                                        'name' => 'name',
                                        'value' => old('name') === null ? $contactMessage->name : old('name'),
                                        'label' => 'name',
                                        'required' => 'required',
                                        'read-only' => true
                                    ], $errors) }}
                                    {{ Form::textGroup([
                                        'name' => 'email',
                                        'value' => old('email') === null ? $contactMessage->email : old('email'),
                                        'label' => 'email',
                                        'required' => 'required',
                                        'read-only' => true
                                    ], $errors) }}
                                    {{ Form::textAreaGroup([
                                       'name' => 'text',
                                       'value' => old('text')  === null ? $contactMessage->text : old('text'),
                                       'label' => 'Your message',
                                       'required' => 'required',
                                       'cols' => 10,
                                       'rows' => 10,
                                       'read-only' => true
                                   ], $errors) }}
                                    @if($type !== 'show') ], $errors) }}
                                        <div class="row">
                                            <div class="col-md-2 col-md-offset-2">
                                                {!! Form::submit('update', [ 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
