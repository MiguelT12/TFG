<x-app-layout>
    <div class="flex flex-col items-center justify-center h-[80vh] text-center">

        <!-- MENSAJE DINÁMICO -->
        <h1 class="text-3xl font-bold mb-6">
            @if(auth()->user()->role === 'admin')
                Bienvenido Admin 
            @elseif(auth()->user()->role === 'monitor')
                Bienvenido Monitor 
            @else
                Bienvenido Usuario 
            @endif
        </h1>

        <!-- BOTÓN LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="px-4 py-2 bg-red-600 rounded-md text-white hover:bg-red-700 transition">
                Cerrar sesión
            </button>
        </form>

    </div>
</x-app-layout>