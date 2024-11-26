<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <title>{{ $title ?? 'StreamPlus User Onboarding Form' }}</title>
    </head>
    <body>

        {{-- {{ $slot }} --}}

        @yield('content')

    </body>
</html>
