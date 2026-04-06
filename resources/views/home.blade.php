<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gimnasio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded shadow text-center">
        <h1 class="text-2xl font-bold mb-4">BIENVENIDO</h1>

        <p class="mb-6">Inicia sesión o crea una cuenta para continuar</p>

        <div class="space-x-4">
            <a href="{{ route('login') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Iniciar sesión
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Crear cuenta
            </a>
        </div>
    </div>

</body>
</html>