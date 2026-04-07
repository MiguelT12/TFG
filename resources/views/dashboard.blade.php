<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 text-center">

        <h1 class="text-3xl font-bold mb-10">
            @if(auth()->user()->role === 'admin')
                Bienvenido Admin 
            @elseif(auth()->user()->role === 'monitor')
                Bienvenido Monitor 
            @else
                Bienvenido a tu zona de entrenamiento 💪
            @endif
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            
            <div class="bg-blue-50 p-6 rounded-lg shadow border border-blue-200">
                <h3 class="text-xl font-bold text-blue-900 mb-2">Actividades</h3>
                <p class="text-gray-700 mb-4">Descubre nuestro catálogo y apúntate a tus clases favoritas.</p>
                <a href="{{ route('actividades') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-semibold w-full">
                    Ver Calendario
                </a>
            </div>

            <div class="bg-green-50 p-6 rounded-lg shadow border border-green-200">
                <h3 class="text-xl font-bold text-green-900 mb-2">Reserva de Pistas</h3>
                <p class="text-gray-700 mb-4">Reserva tu pista de pádel o tenis para jugar con amigos.</p>
                <a href="#" class="inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 font-semibold w-full">
                    Gestionar Pistas
                </a>
            </div>

            <div class="bg-purple-50 p-6 rounded-lg shadow border border-purple-200">
                <h3 class="text-xl font-bold text-purple-900 mb-2">Suscripción</h3>
                <p class="text-gray-700 mb-4">Revisa tu plan actual o descubre nuevas ventajas.</p>
                <a href="{{ route('tarifas') }}" class="inline-block bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700 font-semibold w-full">
                    Ver Tarifas
                </a>
            </div>

        </div>

        <form method="POST" action="{{ route('logout') }}" class="inline-block">
            @csrf
            <button type="submit" class="px-6 py-2 bg-red-600 rounded-md text-white font-semibold hover:bg-red-700 transition">
                Cerrar sesión
            </button>
        </form>

    </div>
</x-app-layout>