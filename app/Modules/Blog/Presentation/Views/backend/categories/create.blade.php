@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Create a Category</h1>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                {!! Form::open(['url' => route('backend.categories.store'), 'method' => 'POST']) !!}
                                {{ Form::textGroup([
                                               'name' => 'title',
                                               'value' => old('title'),
                                               'label' => 'The category title',
                                               'required' => 'required'
                                           ], $errors) }}
                                {{ Form::textAreaGroup([
                                               'name' => 'description',
                                               'value' => old('description'),
                                               'label' => 'The category description',
                                               'required' => 'required',
                                               'cols' => 10,
                                               'rows' => 5
                                           ], $errors) }}
                                {{ Form::textGroup([
                                               'name' => 'slug',
                                               'value' => old('slug'),
                                               'label' => 'slug',
                                           ], $errors) }}
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-2">
                                        {!! Form::submit('create', [ 'class' => 'form-control']) !!}
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
@endsection("content")