<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-center mb-8">Elige tu Plan de Entrenamiento</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($cuotas as $cuota)
                <div class="bg-white p-6 rounded-lg shadow-md border text-center">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $cuota->nombre }}</h3>
                    <p class="text-4xl text-blue-600 font-extrabold mb-4">
                        {{ $cuota->precio }}€ <span class="text-sm text-gray-500 font-normal">/mes</span>
                    </p>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full font-semibold">
                        Inscribirse
                    </button>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>