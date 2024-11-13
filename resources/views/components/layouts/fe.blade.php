<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>

        @vite(['resources/css/fe.css', 'resources/js/fe.js'])
        <link rel="icon" type="image/png" href="{{ asset('favico.png') }}">
        @yield('import_style')
        @yield('import_js')
    </head>

    <body class="bg-white dark:bg-gray-900">
        @include('template.navbar')
        @yield('content')
        @include('template.footer')
    </body>
    @yield('script')
</html>
