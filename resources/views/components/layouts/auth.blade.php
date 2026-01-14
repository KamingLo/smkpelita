<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login' }} - SMK Pelita</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @livewireStyles
</head>
<body class="antialiased font-sans bg-gray-50">

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>