<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-white subpixel-antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans font-normal text-black leading-normal flex flex-col min-h-screen">

@include('common.navigation')
@include('common.flash')

<div class="container mx-auto flex-grow">
    <main>
        @yield('content')
    </main>
</div>

@include('common.footer')
</body>
</html>
