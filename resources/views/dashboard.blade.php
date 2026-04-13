<x-app-layout>
    <div class="contenedor-principal text-white">

        <h1 class="titulo-bienvenida text-3xl font-bold text-center mb-8">
            @if(auth()->user()->role === 'admin')
                Bienvenido Admin 
            @elseif(auth()->user()->role === 'monitor')
                Bienvenido Monitor 
            @else
                Bienvenido a tu zona de entrenamiento
            @endif
        </h1>

        <!-- PLANES -->
        <div class="seccion-planes">
            <h2 class="subtitulo text-center text-xl mb-6">
                Nuestros Planes y Cuotas
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- BRONCE -->
                <a href="{{ route('plan.show', 'bronce') }}">
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg hover:scale-105 transition">
                        <h3 class="text-xl font-bold text-yellow-600">Bronce</h3>
                        <p class="mt-2 text-gray-300">Acceso a sala fitness + zona de máquinas</p>
                        <p>&nbsp;</p>
                        <p class="mt-4 text-2xl font-bold">21.99€ <span class="text-sm">/mes</span></p>
                    </div>
                </a>

                <!-- SILVER -->
                <a href="{{ route('plan.show', 'silver') }}">
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg hover:scale-105 transition">
                        <h3 class="text-xl font-bold text-gray-300">Silver</h3>
                        <p class="mt-2 text-gray-300">Acceso a sala fitness + actividades colectivas</p>
                        <p class="mt-4 text-2xl font-bold">29.99€ <span class="text-sm">/mes</span></p>
                    </div>
                </a>

                <!-- GOLD -->
                <a href="{{ route('plan.show', 'gold') }}">
                    <div class="bg-gray-900 p-6 rounded-lg shadow-lg hover:scale-105 transition">
                        <h3 class="text-xl font-bold text-yellow-400">Gold</h3>
                        <p class="mt-2 text-gray-300">Acceso a sala fitness + actividades colectivas + reserva de pistas de pádel</p>
                        <p class="mt-4 text-2xl font-bold">39.99€ <span class="text-sm">/mes</span></p>
                    </div>
                </a>

            </div>
        </div>
        <div class="seccion-carrusel">
    <h2 class="subtitulo">Nuestras Instalaciones</h2>
    
    <div class="carrusel">
        <img src="{{ asset('img/pesas.jpg') }}" alt="Zona de pesas" class="carrusel-img">
        <img src="{{ asset('img/cardio.jpg') }}" alt="Zona cardio" class="carrusel-img">
        <img src="{{ asset('img/maquinas.jpg') }}" alt="Máquinas" class="carrusel-img">
    </div>
</div>

    </div>
</x-app-layout>