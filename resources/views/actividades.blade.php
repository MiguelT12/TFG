<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/actividades.css') }}">
    @endpush

    <div class="contenedor-actividades">

        <h1 class="titulo-actividades">
            NUESTRAS ACTIVIDADES Y CLASES
        </h1>

        @if(auth()->user()->id_cuota)

        {{-- Calendario --}}
        <div class="contenedor-calendario">
            <div id="calendar"></div>
        </div>

        {{-- FullCalendar --}}
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.global.min.js"></script>

        {{-- Filtro de actividades --}}
        <div class="contenedor-filtro">
            <form action="{{ route('actividades') }}" method="GET" class="formulario-filtro">
                <label class="etiqueta-filtro">Filtrar por actividad:</label>

                <select name="actividad_id" onchange="this.form.submit()" class="select-filtro">
                    <option value="">Todas las actividades</option>
                    @foreach($todasLasActividades as $actividadFiltro)
                        <option value="{{ $actividadFiltro->id }}" 
                            {{ request('actividad_id') == $actividadFiltro->id ? 'selected' : '' }}>
                            {{ $actividadFiltro->nombre }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- Tarjetas --}}
        <div class="grid-actividades">
            @foreach($actividades as $actividad)
                <div class="tarjeta-actividad" id="actividad-{{ $actividad->id }}">

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
                                                {{ $clase->dia_semana }} - 
                                                {{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}
                                            </p>
                                            <p class="detalle-horario">
                                                Monitor: {{ $clase->monitor->name ?? 'Por asignar' }} |
                                                Plazas: {{ $clase->usuarios->count() }} / {{ $clase->capacidad }}
                                            </p>
                                        </div>

                                        @php
                                            $yaApuntado = auth()->user()->clases()->where('clase_id', $clase->id)->exists();
                                            $estaLlena = $clase->usuarios->count() >= $clase->capacidad;
                                        @endphp

                                        @if($yaApuntado)
                                            <form action="{{ route('clases.desapuntarse', $clase->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-inscribirse btn-rojo">
                                                    Desapuntarse
                                                </button>
                                            </form>

                                        @elseif($estaLlena)
                                            <button class="btn-inscribirse" disabled>
                                                Completo
                                            </button>

                                        @else
                                            <form action="{{ route('clases.apuntarse', $clase->id) }}" method="POST">
                                                @csrf
                                                <button class="btn-inscribirse">
                                                    Inscribirse
                                                </button>
                                            </form>
                                        @endif

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

        <script>
        document.addEventListener('DOMContentLoaded', function () {

            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',

                events: @json($eventos ?? []),

                eventClick: function(info) {

                    let actividadId = info.event.extendedProps.actividad_id;

                    let elemento = document.getElementById('actividad-' + actividadId);

                    if (elemento) {
                        elemento.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        elemento.classList.add('destacada');

                        setTimeout(() => {
                            elemento.classList.remove('destacada');
                        }, 2000);
                    }
                }
            });

            calendar.render();
        });
        </script>

        @else
            <div class="mensaje-sin-cuota">
                <p class="texto-sin-cuota">
                    Debes tener una cuota activa para ver el calendario.
                </p>
                <a href="{{ route('dashboard') }}" class="btn-primario">
                    Volver
                </a>
            </div>
        @endif

    </div>
</x-app-layout>