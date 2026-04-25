<x-app-layout>
    <div class="contenedor-principal">

    @if(!auth()->user()->id_cuota)
        <div class="seccion-planes">
            <h2 class="titulo-planes">NUESTROS PLANES Y CUOTAS</h2>
            
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

        <div class="seccion-sobre-nosotros">
            <div class="sobre-nosotros-contenido">
                <h2 class="subtitulo-seccion">SOBRE NOSOTROS</h2>
                <h3 class="subtitulo-nosotros">EL TEMPLO DE LA FUERZA</h2>
                <p>Bienvenido a la academia donde se forjan los guerreros más implacables de la galaxia. Ya sea que busques la agilidad de un maestro Jedi o la fuerza bruta del lado oscuro, nuestras instalaciones están preparadas para llevar tu resistencia al máximo nivel.</p>
                <p>Equipados con tecnología de última generación y zonas de peso libre imperiales, aquí no hay excusas. Elige tu camino, domina tu cuerpo y que el entrenamiento te acompañe.</p>
            </div>
            <div class="sobre-nosotros-imagen">
                <img src="{{ asset('img/stormtrooperPR.png') }}" alt="Entrenamiento en el Templo">
            </div>
        </div>
        
        <div class="seccion-carrusel">
            <h2 class="subtitulo-seccion">Nuestras Instalaciones</h2>
            
            <div class="carrusel-contenedor">
                <button class="carrusel-btn btn-izq" onclick="document.getElementById('carrusel_fotos').scrollBy({left: -800})">
                    &#10094;
                </button>

                <div id="carrusel_fotos" class="carrusel-imagenes">
                    <img src="{{ asset('img/cardio_espacio.png') }}" alt="Instalación 2: Zona de cardio">
                    <img src="{{ asset('img/pesas_espacio.png') }}" alt="Instalación 3: Zona de pesas libres">
                    <img src="{{ asset('img/maquinas.jpg') }}" alt="Instalación 4: Máquinas de musculación">
                </div>

                <button class="carrusel-btn btn-der" onclick="document.getElementById('carrusel_fotos').scrollBy({left: 800})">
                    &#10095;
                </button>
            </div>
        </div>

        <div class="seccion-destacados">
            <h2 class="subtitulo-seccion">Explora nuestro Gimnasio</h2>
            
            <div class="grid-promociones">

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-spinning"></div>
                    <div class="contenido-promo">
                        <h3>Ciclo Indoor</h3>
                        <p>Pon a prueba tu resistencia sobre la bici con nuestras sesiones de alta intensidad y la mejor música.</p>
                        <a href="{{ route('actividades') }}" class="btn-promo">Apuntarme</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-yoga"></div>
                    <div class="contenido-promo">
                        <h3>Cuerpo y Mente</h3>
                        <p>Encuentra tu equilibrio y mejora tu flexibilidad en nuestras sesiones de Yoga y Pilates.</p>
                        <a href="{{ route('actividades') }}" class="btn-promo">Saber más</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-pesas"></div>
                    <div class="contenido-promo">
                        <h3>Zona de Fuerza</h3>
                        <p>¿Quieres ganar músculo? Entrena con las mejores máquinas y asesoramiento personalizado.</p>
                        <a href="{{ route('planes.todos') }}" class="btn-promo">Ver Planes</a>
                    </div>
                </div>

            </div>
        </div>
    @else

        <div class="seccion-sobre-nosotros">
            <div class="sobre-nosotros-contenido">
                <h2 class="subtitulo-seccion">SOBRE NOSOTROS</h2>
                <h3 class="subtitulo-nosotros">EL TEMPLO DE LA FUERZA</h2>
                <p>Bienvenido a la academia donde se forjan los guerreros más implacables de la galaxia. Ya sea que busques la agilidad de un maestro Jedi o la fuerza bruta del lado oscuro, nuestras instalaciones están preparadas para llevar tu resistencia al máximo nivel.</p>
                <p>Equipados con tecnología de última generación y zonas de peso libre imperiales, aquí no hay excusas. Elige tu camino, domina tu cuerpo y que el entrenamiento te acompañe.</p>
            </div>
            <div class="sobre-nosotros-imagen">
                <img src="{{ asset('img/stormtrooperPR.png') }}" alt="Entrenamiento en el Templo">
            </div>
        </div>
        
        <div class="seccion-carrusel">
            <h2 class="subtitulo-seccion">Nuestras Instalaciones</h2>
            
            <div class="carrusel-contenedor">
                <button class="carrusel-btn btn-izq" onclick="document.getElementById('carrusel_fotos').scrollBy({left: -800})">
                    &#10094;
                </button>

                <div id="carrusel_fotos" class="carrusel-imagenes">
                    <img src="{{ asset('img/cardio_espacio.png') }}" alt="Instalación 2: Zona de cardio">
                    <img src="{{ asset('img/pesas_espacio.png') }}" alt="Instalación 3: Zona de pesas libres">
                    <img src="{{ asset('img/maquinas.jpg') }}" alt="Instalación 4: Máquinas de musculación">
                </div>

                <button class="carrusel-btn btn-der" onclick="document.getElementById('carrusel_fotos').scrollBy({left: 800})">
                    &#10095;
                </button>
            </div>
        </div>

        <div class="seccion-destacados">
            <h2 class="subtitulo-seccion">Explora nuestro Gimnasio</h2>
            
            <div class="grid-promociones">

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-spinning"></div>
                    <div class="contenido-promo">
                        <h3>Ciclo Indoor</h3>
                        <p>Pon a prueba tu resistencia sobre la bici con nuestras sesiones de alta intensidad y la mejor música.</p>
                        <a href="{{ route('actividades') }}" class="btn-promo">Apuntarme</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-yoga"></div>
                    <div class="contenido-promo">
                        <h3>Cuerpo y Mente</h3>
                        <p>Encuentra tu equilibrio y mejora tu flexibilidad en nuestras sesiones de Yoga y Pilates.</p>
                        <a href="{{ route('actividades') }}" class="btn-promo">Saber más</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-pesas"></div>
                    <div class="contenido-promo">
                        <h3>Zona de Fuerza</h3>
                        <p>¿Quieres ganar músculo? Entrena con las mejores máquinas y asesoramiento personalizado.</p>
                        <a href="{{ route('planes.todos') }}" class="btn-promo">Ver Planes</a>
                    </div>
                </div>

            </div>
        </div>
    @endif
    </div>
</x-app-layout>