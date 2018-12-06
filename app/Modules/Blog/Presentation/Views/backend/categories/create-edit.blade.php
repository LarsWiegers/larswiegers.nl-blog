@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if($type === "create")
                            <h1>Create a post</h1>
                            @else
                            <h1>Edit a post</h1>
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                @if($type === "create")
                                    {!! Form::open(['url' => route('backend.categories.store'), 'method' => 'POST']) !!}
                                    @else
                                    {!! Form::open(['url' => route('backend.categories.update', ['category' => $category->id]),
                                    'method' => 'PUT']) !!}
                                @endif

                                    {{ Form::textGroup([
                                    'name' => 'title',
                                    'value' => old('title') === null ? $category->title : old('title'),
                                    'label' => 'The category title',
                                    'required' => 'required'
                                    ], $errors) }}
                                    {{ Form::textAreaGroup([
                                                   'name' => 'description',
                                                   'value' => old('description') === null
                                                   ? $category->description
                                                   : old('description'),
                                                   'label' => 'The category description',
                                                   'required' => 'required',
                                                   'cols' => 10,
                                                   'rows' => 5
                                               ], $errors) }}
                                    {{ Form::textGroup([
                                                   'name' => 'slug',
                                                   'value' => old('slug') === null ? $category->slug : old('slug'),
                                                   'label' => 'slug',
                                                   'required' => 'required'
                                               ], $errors) }}
                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-2">
                                            {!! Form::submit('update', [ 'class' => 'form-control']) !!}
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