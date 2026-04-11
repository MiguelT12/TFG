<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gimnasio</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<body>

    <div class="pantalla-login">
        <div class="tarjeta-login">
            <h1 class="titulo-login">BIENVENIDO</h1>
            
            <p class="texto-login">Inicia sesión o crea una cuenta para continuar</p>

            <div class="botones-login">
                <a href="{{ route('login') }}" class="btn-primario">
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}" class="btn-secundario">
                    Crear cuenta
                </a>
            </div>
        </div>
    </div>

</body>
</html>