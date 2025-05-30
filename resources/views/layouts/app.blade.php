@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' ? $title . ' - ' :  '' }} {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans mx-auto antialiased">
    <x-banner/>

    @include('layouts.partials.header')

    @yield('hero')

    <main class="w-full container mx-auto px-5 flex flex-grow">
        {{ $slot }}
    </main>

    @include('layouts.partials.footer')

    </body>
    @stack('modals')
    @livewireScripts
</html>
