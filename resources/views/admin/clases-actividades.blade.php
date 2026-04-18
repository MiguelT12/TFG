<x-app-layout>
    <div class="contenedor-admin">
        
        {{-- SECCIÓN DE BOTONES SUPERIORES --}}
        <div class="acciones-superiores">
            <button class="btn-admin btn-verde">
                <i class="fas fa-plus-circle"></i> Añadir Actividad
            </button>
            <button class="btn-admin btn-morado">
                <i class="fas fa-calendar-plus"></i> Añadir Clase
            </button>
        </div>

        {{-- TABLA DE GESTIÓN DE ACTIVIDADES --}}
        <div class="tarjeta-admin">
            <h2 class="titulo-seccion-admin">Gestión de Actividades</h2>
            
            <div class="tabla-responsive">
                <table class="tabla-usuarios tabla-estilizada">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera col-id">ID</th>
                            <th class="tabla-celda-cabecera col-nombre">NOMBRE</th>
                            <th class="tabla-celda-cabecera col-descripcion">DESCRIPCIÓN</th>
                            <th class="tabla-celda-cabecera col-acciones">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actividades as $actividad)
                            <tr class="tabla-fila">
                                <td class="tabla-celda text-bold">{{ $actividad->id }}</td>
                                <td class="tabla-celda">{{ $actividad->nombre }}</td>
                                <td class="tabla-celda">{{ $actividad->descripcion }}</td>
                                <td class="tabla-celda acciones-celda">
                                    <button class="btn-accion btn-editar" title="Editar Actividad">
                                        Editar
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn-accion btn-eliminar" title="Eliminar Actividad">
                                        Eliminar
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- TABLA DE GESTIÓN DE CLASES --}}
        <div class="tarjeta-admin" style="margin-top: 30px;">
            <h2 class="titulo-seccion-admin">Gestión de Clases</h2>
            
            <div class="tabla-responsive">
                <table class="tabla-usuarios tabla-estilizada">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera">ACTIVIDAD</th>
                            <th class="tabla-celda-cabecera">MONITOR</th>
                            <th class="tabla-celda-cabecera">DÍA</th>
                            <th class="tabla-celda-cabecera">HORA</th>
                            <th class="tabla-celda-cabecera">CAPACIDAD</th>
                            <th class="tabla-celda-cabecera col-acciones">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clases as $clase)
                            <tr class="tabla-fila">
                                <td class="tabla-celda text-bold">{{ $clase->actividad->nombre }}</td>
                                <td class="tabla-celda">{{ $clase->monitor->name }}</td>
                                <td class="tabla-celda text-capital">{{ $clase->dia_semana }}</td>
                                <td class="tabla-celda">{{ $clase->hora_inicio }}</td>
                                <td class="tabla-celda text-center">{{ $clase->capacidad }}</td>
                                <td class="tabla-celda acciones-celda">
                                    <button class="btn-accion btn-editar" title="Editar Clase">
                                        Editar
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button class="btn-accion btn-eliminar" title="Eliminar Clase">
                                        Eliminars
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>