@extends("Blog::backend.layouts.app")
@section("content")
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
@endsection
