<x-app-layout>
    <div class="contenedor-actividades">
        <h1 class="titulo-actividades">
            NUESTRAS ACTIVIDADES Y CLASES
        </h1>

        @if(auth()->user()->id_cuota)
        <div class="contenedor-filtro">
            <form action="{{ route('actividades') }}" method="GET" class="formulario-filtro">
                <label for="actividad_id" class="etiqueta-filtro">Filtrar por actividad:</label>
                <select name="actividad_id" id="actividad_id" onchange="this.form.submit()" class="select-filtro">
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
                                                <button class="btn-inscribirse" style="background-color: #dc2626;">
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
        @else
            <div style="max-width: 900px; margin: 50px auto; text-align: center; color: white;">
                <p style="font-size: 18px; margin-bottom: 20px;">Debes tener una cuota activa para ver el calendario y apuntarte a clases.</p>
                <a href="{{ route('dashboard') }}" style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: bold;">Volver al inicio</a>
            </div>
        @endif
    </div>
</x-app-layout>