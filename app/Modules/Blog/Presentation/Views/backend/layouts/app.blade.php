<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    @component('Backend::components.nav-bar')@endcomponent
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    @component('Blog::components.panel-heading',
                    ['type' => $type, 'model' => $model])@endcomponent
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/backend.js') }}"></script>
@yield('scripts')
</body>
</html>
