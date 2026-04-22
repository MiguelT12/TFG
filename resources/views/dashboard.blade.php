<x-app-layout>
    <div class="contenedor-principal">

    @if(!auth()->user()->id_cuota)
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
                            <form action="{{ route('tarifas.contratar', $cuota->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-primario" style="width: 100%;">
                                    CONTRATAR AHORA
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="seccion-carrusel">
            <h2 class="subtitulo">Nuestras Instalaciones</h2>
            
            <div class="carrusel-contenedor">
                <button class="carrusel-btn btn-izq" onclick="document.getElementById('carrusel').scrollBy({left: -320})">
                    &#10094;
                </button>

                <div id="carrusel" class="carrusel-imagenes">
                    <img src="{{ asset('img/stormtrooperPR.png') }}" alt="Instalación 1">
                    <img src="{{ asset('img/cardio.jpg') }}" alt="Instalación 2">
                    <img src="{{ asset('img/pesas.jpg') }}" alt="Instalación 3">
                    <img src="{{ asset('img/maquinas.jpg') }}" alt="Instalación 4">
                </div>

                <button class="carrusel-btn btn-der" onclick="document.getElementById('carrusel').scrollBy({left: 320})">
                    &#10095;
                </button>
            </div>
        </div>    
    @else
        <div class="seccion-carrusel">
            <h2 class="subtitulo">Nuestras Instalaciones</h2>
            
            <div class="carrusel-contenedor">
                <button class="carrusel-btn btn-izq" onclick="document.getElementById('carrusel').scrollBy({left: -320})">
                    &#10094;
                </button>

                <div id="carrusel" class="carrusel-imagenes">
                    <img src="{{ asset('img/stormtrooperPR.png') }}" alt="Instalación 1">
                    <img src="{{ asset('img/cardio.jpg') }}" alt="Instalación 2">
                    <img src="{{ asset('img/pesas.jpg') }}" alt="Instalación 3">
                    <img src="{{ asset('img/maquinas.jpg') }}" alt="Instalación 4">
                </div>

                <button class="carrusel-btn btn-der" onclick="document.getElementById('carrusel').scrollBy({left: 320})">
                    &#10095;
                </button>
            </div>
        </div>
    @endif
    </div>
</x-app-layout>