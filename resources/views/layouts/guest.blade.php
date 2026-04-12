<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gimnasio</title>

    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<body>
    <div class="pantalla-login">
        <div class="tarjeta-login">
            {{ $slot }}
        </div>
    </div>
</body>
</html>