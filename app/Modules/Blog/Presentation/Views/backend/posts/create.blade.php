@extends("Backend::layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Create a post</h1>
                    </div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                {!! Form::open(['url' => route('backend.posts.store'), 'method' => 'POST']) !!}
                                {{ Form::textGroup([
                                               'name' => 'title',
                                               'value' => old('title'),
                                               'label' => 'The post title',
                                               'required' => 'required'
                                           ], $errors) }}
                                {{ Form::textAreaGroup([
                                               'name' => 'content',
                                               'value' => old('content'),
                                               'label' => 'The content',
                                               'required' => 'required',
                                               'cols' => 10,
                                               'rows' => 10
                                           ], $errors) }}
                                @if(!is_null($category))
                                    {{ Form::selectGroup([
                                               'name' => 'Category',
                                               'value' => old('category'),
                                               'label' => 'category',
                                               'selected' => $category,
                                               'options' => $categories
                                           ], $errors) }}
                                    @else
                                    {{ Form::selectGroup([
                                              'name' => 'Category',
                                              'value' => old('category'),
                                              'label' => 'category',
                                              'options' => $categories
                                          ], $errors) }}
                                @endif

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