@extends("Contact::layouts.app")
    @section("headerBannerMainTitle")
        Contact
    @endsection
    @section("headerBannerSubTitle")
       Lars Wiegers
    @endsection
    @section("body")
        @if(session()->has('message'))
            @if(session()->get('message')['type'] === 'success')
                @component('components.alert-success', ['message' => session()->get('message')])@endcomponent
                @else
                @component('components.alert-failure', ['message' => session()->get('message')])@endcomponent
            @endif
        @endif
        {!! Form::open(['route' => 'contact.save']) !!}
        {{ Form::textGroup([
            'name' => 'name',
            'value' => old('name') === null ? $contactMessage->name : old('name'),
            'label' => 'name',
            'required' => 'required'
        ], $errors) }}
        {{ Form::textGroup([
            'name' => 'email',
            'value' => old('email') === null ? $contactMessage->email : old('email'),
            'label' => 'email',
            'required' => 'required'
        ], $errors) }}
        {{ Form::textAreaGroup([
           'name' => 'text',
           'value' => old('text')  === null ? $contactMessage->text : old('text'),
           'label' => 'Your message',
           'required' => 'required',
           'cols' => 10,
           'rows' => 10
       ], $errors) }}
        <div class="row">
            <div>
                <button type="submit">Send</button>
            </div>
        </div>
        {!! Form::close() !!}
    @endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}" type="text/css">
@endsection
