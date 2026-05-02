<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarifas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/actividades.css') }}">
    <link rel="stylesheet" href="{{ asset('css/monitor.css') }}"> 

    @stack('styles')

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/tarifas.js') }}"></script>
    <script src="{{ asset('js/calendario.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pistas.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen"> 
        @include('layouts.header')

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>