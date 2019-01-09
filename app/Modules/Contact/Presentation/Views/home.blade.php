@extends("Blog::layouts.app")
    @section("headerBannerMainTitle")
        Contact
    @endsection
    @section("headerBannerSubTitle")
       Lars Wiegers
    @endsection
    @section("body")
        {!! Form::open(['route' => 'contact.save']) !!}
        @csrf
        <div class="row">
            <label  for="name">name *<br />
            </label>
            <div>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{isset($name) ? $name : ''}}"
                    placeholder="name"
                    required>
            </div>
        </div>
        <div class="row">
            <label  for="email">email *<br />
            </label>
            <div>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{isset($email) ? $email : ''}}"
                    placeholder="email"
                    required>
            </div>
        </div>
        <div class="row">
            <label  for="text">bericht *<br />
            </label>
            <div>
                <textarea
                    type="text"
                    id="text"
                    name="text"
                    class="form-control"
                    rows="8"
                    placeholder="bericht"
                    required>{{isset($text) ? $text : ''}}</textarea>
            </div>
        </div>
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
