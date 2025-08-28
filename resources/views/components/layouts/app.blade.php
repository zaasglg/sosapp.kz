<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Sosapp.kz' }}</title>
 
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">

    @if (app()->environment('production'))
        <link rel="stylesheet" href="{{ mix('build/assets/app.css') }}">
        <script src="{{ mix('build/assets/app.js') }}" defer></script>
    @else
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    @endif


    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-De9rIDdk.css') }}">
    <script src="{{ asset('build/assets/app-Bvs41a34.js') }}"></script> --}}

    <!-- Video Player -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

    @yield('style')

</head>

<body @class(['grayscale' => session('isBlackWhite', false)])>

    {{ $slot }}


    <livewire:components.footer />

    <livewire:components.chat-assistant />


</body>

</html>
