<x-app-layout>

    <div class="max-w-3xl mx-auto text-white text-center mt-10">

        <h1 class="text-4xl font-bold text-yellow-400">
            {{ $plan['nombre'] }}
        </h1>

        <p class="mt-4 text-lg text-gray-300">
            {{ $plan['descripcion'] }}
        </p>

        <p class="mt-6 text-3xl font-bold">
            {{ $plan['precio'] }}
        </p>

        <div class="mt-10">
            <h2 class="text-xl font-semibold mb-4">
                ¿Qué incluye este plan?
            </h2>

            <ul class="space-y-3">
                @foreach($plan['incluye'] as $item)
                    <li class="bg-gray-800 p-3 rounded">
                        ✔ {{ $item }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-10">
            <a href="{{ route('dashboard') }}" 
               class="bg-yellow-500 text-black px-6 py-3 rounded hover:bg-yellow-400">
                ← Volver
            </a>
        </div>

    </div>

</x-app-layout>