<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="{{ config('app.description') }}">
    <meta name="keywords" content="{{ config('app.keyword') }}">
    <meta name="author" content="{{ config('app.author') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Practice Therapy') }}</title>

    <!-- Styles -->
    <link href="{{ secure_asset('css/practice_therapy.css') }}" rel="stylesheet">

    <!-- Extra styles -->
    @stack('styles')
</head>

<body>
    <noscript>
        <strong>
            {{ __("We're sorry but Practice Therapy doesn't work properly without JavaScript enabled. Please enable it and refresh the page.") }}
        </strong>
    </noscript>

    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/practice_therapy.js') }}" defer></script>

    <!-- Extra cripts -->
    @stack('scripts')
</body>

</html>
