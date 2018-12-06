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
                                @if($type === "create")
                                    {!! Form::open(['url' => route('backend.posts.store'), 'method' => 'POST']) !!}
                                    @else
                                    {!! Form::open(['url' => route('backend.posts.update', ['post' => $post->id]), 'method' => 'PUT']) !!}
                                @endif

                                {{ Form::textGroup([
                                               'name' => 'title',
                                               'value' => old('title')  === null ? $post->title : old('title'),
                                               'label' => 'The post title',
                                               'required' => 'required'
                                           ], $errors) }}
                                {{ Form::textAreaGroup([
                                               'name' => 'content',
                                               'value' => old('content')  === null ? $post->content : old('content'),
                                               'label' => 'The content',
                                               'required' => 'required',
                                               'cols' => 10,
                                               'rows' => 10
                                           ], $errors) }}
                                {{ Form::textGroup([
                                               'name' => 'slug',
                                               'value' => old('slug')  === null ? $post->slug : old('slug'),
                                               'label' => 'The slug'
                                           ], $errors) }}
                                @if(!is_null($category))
                                    {{ Form::selectGroup([
                                               'name' => 'category_id',
                                               'value' => old('category_id')  === null ? $post->category_id : old('category_id'),
                                               'label' => 'category',
                                               'selected' => $category,
                                               'options' => $categories
                                           ], $errors) }}
                                @else
                                    {{ Form::selectGroup([
                                              'name' => 'category_id',
                                              'value' => old('category_id')  === null ? $post->category_id : old('category_id'),
                                              'label' => 'category',
                                              'options' => $categories
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