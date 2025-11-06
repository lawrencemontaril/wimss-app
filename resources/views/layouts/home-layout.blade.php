<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title-prefix', 'WIMSS') @yield('title')</title>

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?&family=Inter:wght@100..900&display=swap" rel="stylesheet" />

    {{-- TailwindCSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
</head>

<body class="bg-zinc-50 font-sans text-zinc-800 antialiased">
    @section('content')

    @show
</body>

</html>

