@extends('Backend::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                {!! Form::open(['route' => ['profile-save', Auth::id()],
                                    'method' => 'put',
                                    'onsubmit' => 'return fileSmallEnough(); return false;']) !!}
                                <h2>Profile image: </h2>
                                <input type="file" name="profile_image" accept="image/*">
                                {{dump($errors)}}
                                <h2> Social media accounts :</h2>
                                {{ Form::textGroup([
                                            'name' => 'twitterUrl',
                                            'value' => old('twitterUrl'),
                                            'label' => 'Full Twitter url',
                                        ], $errors) }}
                                {{ Form::textGroup([
                                             'name' => 'instagramUrl',
                                             'value' => old('instagramUrl'),
                                             'label' => 'Full instagram url',
                                         ], $errors) }}
                                {{ Form::textGroup([
                                            'name' => 'youtubeUrl',
                                            'value' => old('youtubeUrl'),
                                            'label' => 'Full Youtube url',
                                        ], $errors) }}
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        {!! Form::submit('Opslaan') !!}
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
