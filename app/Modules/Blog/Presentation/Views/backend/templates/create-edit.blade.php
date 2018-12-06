@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if($type === "create")
                            <h1>Create a template</h1>
                        @else
                            <h1>Edit a template</h1>
                        @endif

                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                @if($type === "create")
                                    {!! Form::open(['url' => route('backend.templates.store'),
                                    'method' => 'POST']) !!}
                                    @else
                                    {!! Form::open(['url' => route('backend.templates.update',
                                    ['template' => $template->id]), 'method' => 'PUT']) !!}
                                @endif


                                {{ Form::textGroup([
                                               'name' => 'title',
                                               'value' => old('title')  === null ?
                                               $template->title : old('title'),
                                               'label' => 'The template title',
                                               'required' => 'required'
                                           ], $errors) }}
                                @if(!is_null($template))
                                    {{ Form::fileSelectGroup([
                                               'name' => 'path',
                                               'value' => old('path')  === null ?
                                               $template->path : old('path'),
                                               'label' => 'Path',
                                               'selected' => $template->path,
                                               'options' => $paths
                                           ], $errors) }}
                                @else
                                    {{ Form::fileSelectGroup([
                                              'name' => 'path',
                                              'value' => old('path')  === null ?
                                              $template->path : old('path'),
                                              'label' => 'Path',
                                              'options' => $paths
                                          ], $errors) }}
                                @endif

                                <div class="row">
                                    <div class="col-md-2 col-md-offset-2">
                                        {!! Form::submit('create',
                                        [ 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection