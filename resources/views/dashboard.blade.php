<x-app-layout>
    <div class="contenedor-principal">

        <h1 class="titulo-bienvenida">
            @if(auth()->user()->role === 'admin')
                Bienvenido Admin 
            @elseif(auth()->user()->role === 'monitor')
                Bienvenido Monitor 
            @else
                Bienvenido a tu zona de entrenamiento
            @endif
        </h1>

        <div class="seccion-planes">
            <h2 class="subtitulo">Nuestros Planes y Cuotas</h2>
            
            <div class="grid-tarifas">
                @foreach($cuotas as $cuota)
                    <div class="tarjeta-tarifa">
                        <h3 class="tarjeta-titulo">{{ $cuota->nombre }}</h3>
                        <p class="tarjeta-precio">
                            {{ $cuota->precio }}€ <span>/mes</span>
                        </p>
                        <button class="btn-primario">
                            Elegir Plan
                        </button>
                    </div>
                @endforeach
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