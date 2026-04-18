<x-app-layout>
    <div class="contenedor-actividades">
        <h1 class="titulo-actividades">
            NUESTRAS ACTIVIDADES Y CLASES
        </h1>

        <div class="grid-actividades">
            @foreach($actividades as $actividad)
                <div class="tarjeta-actividad">
                    <div class="cabecera-actividad">
                        <h2 class="nombre-actividad">{{ $actividad->nombre }}</h2>
                        <p class="desc-actividad">{{ $actividad->descripcion }}</p>
                    </div>

                    <div class="cuerpo-actividad">
                        <h3 class="titulo-horarios">Horarios disponibles:</h3>
                        
                        @if($actividad->clases->count() > 0)
                            <div class="lista-horarios">
                                @foreach($actividad->clases as $clase)
                                    <div class="item-horario">
                                        <div class="info-horario">
                                            <p class="dia-hora">
                                                {{ $clase->dia_semana }} - {{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}
                                            </p>
                                            <p class="detalle-horario">
                                                Monitor: {{ $clase->monitor->name ?? 'Por asignar' }} | Capacidad: {{ $clase->capacidad }}
                                            </p>
                                        </div>
                                        <button class="btn-inscribirse">
                                            Inscribirse
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="sin-clases">No hay clases programadas actualmente.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>