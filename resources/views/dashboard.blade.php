<x-app-layout>
    <div class="contenedor-principal">

    @if(!auth()->user()?->id_cuota)
        <h1 class="titulo-galactico" data-i18n="dashboard.titulo_principal">GIMNASIO GALÁCTICO</h1>
        <div class="seccion-planes">
            <h2 class="titulo-planes" data-i18n="dashboard.titulo_planes">NUESTROS PLANES Y CUOTAS</h2>
            
            <div class="grid-tarifas">
                @foreach($cuotas as $cuota)
                    <div class="tarjeta-tarifa">
                        <h3 class="tarjeta-titulo">{{ $cuota->nombre }}</h3>
                        
                        <p class="tarjeta-precio">
                            {{ $cuota->precio }}€ <span data-i18n="dashboard.mes">/mes</span>
                        </p>
                        
                        <div class="tarjeta-footer">
                            <a href="{{ route('planes.todos') }}" class="btn-primario btn-block" data-i18n="dashboard.btn_mas_info">
                                MÁS INFORMACIÓN
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="seccion-sobre-nosotros">
            <div class="sobre-nosotros-contenido">
                <h2 class="subtitulo-seccion" data-i18n="dashboard.sobre_nosotros_titulo">SOBRE NOSOTROS</h2>
                <h3 class="subtitulo-nosotros" data-i18n="dashboard.sobre_nosotros_subtitulo">EL TEMPLO DE LA FUERZA</h3>
                <p data-i18n="dashboard.sobre_nosotros_p1">Bienvenido a la academia donde se forjan los guerreros más implacables de la galaxia. Ya sea que busques la agilidad de un maestro Jedi o la fuerza bruta del lado oscuro, nuestras instalaciones están preparadas para llevar tu resistencia al máximo nivel.</p>
                <p data-i18n="dashboard.sobre_nosotros_p2">Equipados con tecnología de última generación y zonas de peso libre imperiales, aquí no hay excusas. Elige tu camino, domina tu cuerpo y que el entrenamiento te acompañe.</p>
            </div>
            <div class="sobre-nosotros-imagen">
                <img src="{{ asset('img/stormtrooperPR.png') }}" alt="Entrenamiento en el Templo">
            </div>
        </div>
        
        <div class="seccion-carrusel">
            <h2 class="subtitulo-seccion" data-i18n="dashboard.titulo_instalaciones">Nuestras Instalaciones</h2>
            
            <div class="carrusel-contenedor">
                <button class="carrusel-btn btn-izq" onclick="document.getElementById('carrusel_fotos').scrollBy({left: -800})">
                    &#10094;
                </button>

                <div id="carrusel_fotos" class="carrusel-imagenes">
                    <img src="{{ asset('img/cardio_espacio.png') }}" alt="Instalación 2: Zona de cardio">
                    <img src="{{ asset('img/pesas_espacio.png') }}" alt="Instalación 3: Zona de pesas libres">
                    <img src="{{ asset('img/fuerza_espacio.png') }}" alt="Instalación 4: Zona de fuerza">
                </div>

                <button class="carrusel-btn btn-der" onclick="document.getElementById('carrusel_fotos').scrollBy({left: 800})">
                    &#10095;
                </button>
            </div>
        </div>

        <div class="seccion-destacados">
            <h2 class="subtitulo-seccion" data-i18n="dashboard.titulo_explora">Explora nuestro Gimnasio</h2>
            
            <div class="grid-promociones">

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-spinning"></div>
                    <div class="contenido-promo">
                        <h3 data-i18n="dashboard.promo_ciclo_titulo">Ciclo Indoor</h3>
                        <p data-i18n="dashboard.promo_ciclo_desc">Pon a prueba tu resistencia sobre la bici con nuestras sesiones de alta intensidad y la mejor música.</p>
                        <a href="{{ route('actividades') }}" class="btn-primario" data-i18n="dashboard.btn_apuntarme">Apuntarme</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-yoga"></div>
                    <div class="contenido-promo">
                        <h3 data-i18n="dashboard.promo_yoga_titulo">Cuerpo y Mente</h3>
                        <p data-i18n="dashboard.promo_yoga_desc">Encuentra tu equilibrio y mejora tu flexibilidad en nuestras sesiones de Yoga y Pilates.</p>
                        <a href="{{ route('actividades') }}" class="btn-primario" data-i18n="dashboard.btn_saber_mas">Saber más</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-pesas"></div>
                    <div class="contenido-promo">
                        <h3 data-i18n="dashboard.promo_fuerza_titulo">Zona de Fuerza</h3>
                        <p data-i18n="dashboard.promo_fuerza_desc">¿Quieres ganar músculo? Entrena con las mejores máquinas y asesoramiento personalizado.</p>
                        <a href="{{ route('planes.todos') }}" class="btn-primario" data-i18n="dashboard.btn_ver_planes">Ver Planes</a>
                    </div>
                </div>

            </div>
        </div>
    @else
        <h1 class="titulo-galactico" data-i18n="dashboard.titulo_principal">GIMNASIO GALÁCTICO</h1>
        <div class="seccion-sobre-nosotros">
            <div class="sobre-nosotros-contenido">
                <h2 class="subtitulo-seccion" data-i18n="dashboard.sobre_nosotros_titulo">SOBRE NOSOTROS</h2>
                <h3 class="subtitulo-nosotros" data-i18n="dashboard.sobre_nosotros_subtitulo">EL TEMPLO DE LA FUERZA</h3>
                <p data-i18n="dashboard.sobre_nosotros_p1">Bienvenido a la academia donde se forjan los guerreros más implacables de la galaxia. Ya sea que busques la agilidad de un maestro Jedi o la fuerza bruta del lado oscuro, nuestras instalaciones están preparadas para llevar tu resistencia al máximo nivel.</p>
                <p data-i18n="dashboard.sobre_nosotros_p2">Equipados con tecnología de última generación y zonas de peso libre imperiales, aquí no hay excusas. Elige tu camino, domina tu cuerpo y que el entrenamiento te acompañe.</p>
            </div>
            <div class="sobre-nosotros-imagen">
                <img src="{{ asset('img/stormtrooperPR.png') }}" alt="Entrenamiento en el Templo">
            </div>
        </div>
        
        <div class="seccion-carrusel">
            <h2 class="subtitulo-seccion" data-i18n="dashboard.titulo_instalaciones">Nuestras Instalaciones</h2>
            
            <div class="carrusel-contenedor">
                <button class="carrusel-btn btn-izq" onclick="document.getElementById('carrusel_fotos').scrollBy({left: -800})">
                    &#10094;
                </button>

                <div id="carrusel_fotos" class="carrusel-imagenes">
                    <img src="{{ asset('img/cardio_espacio.png') }}" alt="Instalación 2: Zona de cardio">
                    <img src="{{ asset('img/pesas_espacio.png') }}" alt="Instalación 3: Zona de pesas libres">
                    <img src="{{ asset('img/fuerza_espacio.png') }}" alt="Instalación 4: Zona de fuerza">
                </div>

                <button class="carrusel-btn btn-der" onclick="document.getElementById('carrusel_fotos').scrollBy({left: 800})">
                    &#10095;
                </button>
            </div>
        </div>

        <div class="seccion-destacados">
            <h2 class="subtitulo-seccion" data-i18n="dashboard.titulo_explora">Explora nuestro Gimnasio</h2>
            
            <div class="grid-promociones">

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-spinning"></div>
                    <div class="contenido-promo">
                        <h3 data-i18n="dashboard.promo_ciclo_titulo">Ciclo Indoor</h3>
                        <p data-i18n="dashboard.promo_ciclo_desc">Pon a prueba tu resistencia sobre la bici con nuestras sesiones de alta intensidad y la mejor música.</p>
                        <a href="{{ route('actividades') }}" class="btn-primario" data-i18n="dashboard.btn_apuntarme">Apuntarme</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-yoga"></div>
                    <div class="contenido-promo">
                        <h3 data-i18n="dashboard.promo_yoga_titulo">Cuerpo y Mente</h3>
                        <p data-i18n="dashboard.promo_yoga_desc">Encuentra tu equilibrio y mejora tu flexibilidad en nuestras sesiones de Yoga y Pilates.</p>
                        <a href="{{ route('actividades') }}" class="btn-primario" data-i18n="dashboard.btn_saber_mas">Saber más</a>
                    </div>
                </div>

                <div class="tarjeta-promocion">
                    <div class="imagen-promo promo-pesas"></div>
                    <div class="contenido-promo">
                        <h3 data-i18n="dashboard.promo_fuerza_titulo">Zona de Fuerza</h3>
                        <p data-i18n="dashboard.promo_fuerza_desc">¿Quieres ganar músculo? Entrena con las mejores máquinas y asesoramiento personalizado.</p>
                        <a href="{{ route('planes.todos') }}" class="btn-primario" data-i18n="dashboard.btn_ver_planes">Ver Planes</a>
                    </div>
                </div>

            </div>
        </div>
    @endif
    </div>
</x-app-layout>