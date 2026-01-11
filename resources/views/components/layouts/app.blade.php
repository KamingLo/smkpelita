<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel App' }}</title>
    <meta name="description" content="{{$description ?? 'Pelita IV'}}">
    <meta name="keywords" content="sekolah, jakarta barat, terpercaya, internasional">
    <meta name="author" content="Pelita IV">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100 min-h-screen flex flex-col">

    <livewire:ui.navbar />

    <main class="flex-grow w-full">
        {{ $slot }}
    </main>

    <x-ui.footer />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
          duration: 1000,
          once: true,
      });
    </script>
</body>
</html>