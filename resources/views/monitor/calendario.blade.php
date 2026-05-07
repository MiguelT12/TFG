<x-app-layout>
    <div class="contenedor-monitor">

        <h1 class="titulo-pagina" data-i18n="monitor_calendario.titulo_pagina">
            CALENDARIO 
        </h1>

        <div class="tarjeta-monitor">

            @php
                $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            @endphp

            <div class="calendario">

                @foreach($dias as $dia)
                    <div class="columna-dia">

                        <div class="dia-header" data-i18n="monitor_calendario.{{ str_replace(['á', 'é'], ['a', 'e'], strtolower($dia)) }}">
                            {{ $dia }}
                        </div>

                        @foreach($clases->where('dia_semana', $dia)->sortBy('hora_inicio') as $clase)

                            <div class="bloque-clase">
                                <p class="nombre-actividad">
                                    {{ $clase->actividad->nombre }}
                                </p>

                                <p class="hora-clase">
                                    {{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}
                                </p>

                                <p class="capacidad-clase">
                                    {{ $clase->usuarios->count() }}/{{ $clase->capacidad }}
                                </p>

                                <a href="{{ route('monitor.alumnos', $clase->id) }}" class="btn-ver-alumnos" data-i18n="monitor_calendario.ver_alumnos">
                                    Ver alumnos
                                </a>
                            </div>

                        @endforeach

                    </div>
                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>