<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gimnasio</title>
    
    <script>
        const idiomaGuardado = localStorage.getItem('idioma');
        window.idiomaApp = idiomaGuardado ? idiomaGuardado : "{{ session('idioma', 'es') }}";
        window.baseUrl = "{{ url('/') }}";
    </script>
    
    <script src="{{ asset('js/traducciones.js') }}?v={{ time() }}"></script>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<body>
    
    <div class="selector-idioma-guest">
        <select id="selector-idioma" onchange="cambiarIdiomaGuest(this.value)">
            <option value="es">Español</option>
            <option value="en">English</option>
        </select>
    </div>

    <script>
        function cambiarIdiomaGuest(idioma) {
            localStorage.setItem('idioma', idioma);
            location.reload();
        }
        document.getElementById('selector-idioma').value = window.idiomaApp || 'es';
    </script>

    <div class="pantalla-login">
        <div class="tarjeta-login">
            {{ $slot }}
        </div>
    </div>
</body>
</html>