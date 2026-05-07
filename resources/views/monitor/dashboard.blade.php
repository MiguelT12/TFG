<x-app-layout>
    <div class="contenedor-monitor">
        
        <h1 class="titulo-pagina" data-i18n="monitor.titulo_pagina">
            ZONA DE MONITORES
        </h1>
        
        <div class="tarjeta-monitor">

            <h2 class="subtitulo-seccion" data-i18n="monitor.subtitulo">
                Mis Clases Asignadas
            </h2>

            <div class="contenedor-buscador-wrapper">
                <div class="input-icono-contenedor">
                    <svg class="icono-buscador" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>   

                    <input type="text" id="buscador" class="input-buscador-estilizado" placeholder="Buscar actividad" data-i18n-placeholder="monitor.placeholder_buscar">
                </div>
            </div>

            <div class="tabla-responsive">
                <table class="tabla-principal">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera" data-i18n="monitor.tabla_actividad">Actividad</th>
                            <th class="tabla-celda-cabecera" data-i18n="monitor.tabla_dia">Día</th>
                            <th class="tabla-celda-cabecera" data-i18n="monitor.tabla_hora">Hora de inicio</th>
                            <th class="tabla-celda-cabecera" data-i18n="monitor.tabla_capacidad">Capacidad</th>
                            <th class="tabla-celda-cabecera centrado" data-i18n="monitor.tabla_acciones">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($clases as $clase)
                            <tr class="tabla-fila">

                                <td class="tabla-celda">
                                    {{ $clase->actividad->nombre ?? 'Actividad' }}
                                </td>

                                <td class="tabla-celda">
                                    {{ $clase->dia_semana }}
                                </td>

                                <td class="tabla-celda">
                                    {{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}
                                </td>

                                <td class="tabla-celda">
                                    {{ $clase->usuarios->count() }} / {{ $clase->capacidad }} <span data-i18n="monitor.alumnos">alumnos</span>
                                </td>

                                <td class="tabla-celda centrado">
                                    <a href="{{ route('monitor.alumnos', $clase->id) }}" class="btn-ver-alumnos" data-i18n="monitor.btn_ver_alumnos">
                                        Ver Alumnos
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr class="tabla-fila">
                                <td colspan="5" class="tabla-celda centrado celda-vacia" data-i18n="monitor.sin_clases">
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