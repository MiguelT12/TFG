<x-app-layout>
    <div class="contenedor-principal">

        <div class="seccion-planes">
            <h2 class="subtitulo">Nuestros Planes y Cuotas</h2>
            
            <div class="grid-tarifas">
                @foreach($cuotas as $cuota)
                    <div class="tarjeta-tarifa">
                        <h3 class="tarjeta-titulo">{{ $cuota->nombre }}</h3>
                        <p class="tarjeta-precio">
                            {{ $cuota->precio }}€ <span>/mes</span>
                        </p>
                        <div style="margin-top: auto; padding-top: 2rem;">
                            <a href="{{ route('planes.todos') }}" class="btn-primario">
                                Más información
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="seccion-carrusel">
            <h2 class="subtitulo">Nuestras Instalaciones</h2>
            
            <div class="carrusel">
                <img src="{{ asset('img/stormtrooperPR.png') }}" alt="Zona de pesas" class="carrusel-img">
                <img src="{{ asset('img/cardio.jpg') }}" alt="Zona cardio" class="carrusel-img">
                <img src="{{ asset('img/pesas.jpg') }}" alt="Máquinas" class="carrusel-img">
            </div>
        </div>
    </div>
</x-app-layout>