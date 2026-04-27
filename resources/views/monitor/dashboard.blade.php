<x-app-layout>
    <div class="contenedor-monitor">
        
        <h1 class="titulo-monitor">
            ZONA DE MONITORES
        </h1>
        
        <div class="tarjeta-monitor">
            <h2 class="subtitulo-monitor">
                Mis Clases Asignadas
            </h2>

            <div class="tabla-responsive">
                <table class="tabla-principal">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera">Actividad</th>
                            <th class="tabla-celda-cabecera">Día</th>
                            <th class="tabla-celda-cabecera">Hora de inicio</th>
                            <th class="tabla-celda-cabecera">Capacidad</th>
                            <th class="tabla-celda-cabecera centrado">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Se recorren todas las clases asignadas al monitor --}}
                        @forelse($clases as $clase)
                            <tr class="tabla-fila">

                                {{-- Nombre de la actividad --}}
                                <td class="tabla-celda">
                                    {{ $clase->actividad->nombre ?? 'Actividad' }}
                                </td>

                                {{-- Día de la semana --}}
                                <td class="tabla-celda">
                                    {{ $clase->dia_semana }}
                                </td>

                                {{-- Hora de inicio --}}
                                <td class="tabla-celda">
                                    {{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}
                                </td>

                                {{-- Número de alumnos inscritos de la capacidad total --}}
                                <td class="tabla-celda">
                                    {{ $clase->usuarios->count() }} / {{ $clase->capacidad }} alumnos
                                </td>

                                {{-- Botón para ver los alumnos inscritos en esa clase --}}
                                <td class="tabla-celda centrado">
                                    <a href="{{ route('monitor.alumnos', $clase->id) }}" class="btn-ver-alumnos">
                                        Ver Alumnos
                                    </a>
                                </td>

                            </tr>

                        {{-- Si no existen clases asignadas --}}
                        @empty
                            <tr class="tabla-fila">
                                <td colspan="5" class="tabla-celda centrado celda-vacia">
                                    No tienes clases asignadas por el momento.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>