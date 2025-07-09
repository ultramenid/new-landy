<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/thumbnail.png') }}">

    @yield('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts


</head>
<body class="font-sans">
    @yield('content')

    @stack('scripts')
</body>
</html>
