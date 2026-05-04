<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/actividades.css') }}">
    @endpush

    <div class="contenedor-actividades">

        <h1 class="titulo-pagina">
            NUESTRAS ACTIVIDADES Y CLASES
        </h1>

        @if(auth()->user()->id_cuota)

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

        <div class="grid-actividades">
            @foreach($actividades as $actividad)
                <div class="tarjeta-actividad" id="actividad-{{ $actividad->id }}">

                    <div class="cabecera-actividad">
                        <h2 class="subtitulo-seccion-pistas">{{ $actividad->nombre }}</h2>
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
            window.eventosCalendario = @json($eventos ?? []);
        </script>
        @else
            <div class="mensaje-sin-cuota">
                <p class="texto-sin-cuota">Debes tener una cuota activa para ver el calendario.</p>
                <a href="{{ route('planes.todos') }}" class="btn-primario">Ver tarifas</a>
            </div>
        @endif
    </div>
</x-app-layout>