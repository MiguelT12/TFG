<x-app-layout>
    <div class="contenedor-admin">
        
        <div class="acciones-superiores">
            <button id="btn-abrir-actividad" class="btn-admin btn-verde">
                <i class="fas fa-plus-circle"></i> Añadir Actividad
            </button>
            
            <button id="btn-abrir-clase" class="btn-admin btn-morado">
                <i class="fas fa-calendar-plus"></i> Añadir Clase
            </button>
        </div>

        @if(session('success'))
            <div class="reserva-item alerta-exito mb-20">
                {{ session('success') }}
            </div>
        @endif

        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion">Gestión de Actividades</h2>
            
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
                                    <a href="{{ route('admin.actividades.edit', $actividad->id) }}" class="btn-accion btn-editar btn-enlace">Editar</a>
                                    <form action="{{ route('admin.actividades.destroy', $actividad->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta actividad?')">
                                        @csrf @method('DELETE')
                                        <button class="btn-accion btn-eliminar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tarjeta-admin seccion-destacados mt-30">
            <h2 class="subtitulo-seccion">Gestión de Clases</h2>
            
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
                                <td class="tabla-celda">{{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}</td>
                                <td class="tabla-celda text-center">{{ $clase->capacidad }}</td>
                                <td class="tabla-celda acciones-celda">
                                    <a href="{{ route('admin.clases.edit', $clase->id) }}" class="btn-accion btn-editar btn-enlace">Editar</a>
                                    <form action="{{ route('admin.clases.destroy', $clase->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta clase?')">
                                        @csrf @method('DELETE')
                                        <button class="btn-accion btn-eliminar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal-actividad" class="modal-overlay">
        <div class="modal-content">
            <form method="post" action="{{ route('admin.actividades.store') }}">
                @csrf
                <h2 class="subtitulo-nosotros modal-title">Nueva Actividad</h2>
                
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-input" required />
                </div>
                
                <div class="form-group-lg">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-input" rows="3" required></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" id="btn-cerrar-actividad" class="btn-cancelar">Cancelar</button>
                    <button type="submit" class="btn-admin btn-verde">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-clase" class="modal-overlay">
        <div class="modal-content modal-content-lg">
            <form method="post" action="{{ route('admin.clases.store') }}">
                @csrf
                <h2 class="subtitulo-nosotros modal-title">Programar Clase</h2>
                
                <div class="grid-2-cols">
                    <div>
                        <label for="actividad_id" class="form-label">Actividad</label>
                        <select name="actividad_id" class="form-input" required>
                            @foreach($actividades as $act)
                                <option value="{{ $act->id }}">{{ $act->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="monitor_id" class="form-label">Monitor</label>
                        <select name="monitor_id" class="form-input" required>
                            @foreach($monitores as $monitor)
                                <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-3-cols">
                    <div>
                        <label for="dia_semana" class="form-label">Día</label>
                        <select name="dia_semana" class="form-input" required>
                            <option value="lunes">Lunes</option>
                            <option value="martes">Martes</option>
                            <option value="miércoles">Miércoles</option>
                            <option value="jueves">Jueves</option>
                            <option value="viernes">Viernes</option>
                            <option value="sábado">Sábado</option>
                        </select>
                    </div>
                    <div>
                        <label for="hora_inicio" class="form-label">Hora Inicio</label>
                        <input type="time" name="hora_inicio" class="form-input" required />
                    </div>
                    <div>
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="number" name="capacidad" value="20" class="form-input" required />
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" id="btn-cerrar-clase" class="btn-cancelar">Cancelar</button>
                    <button type="submit" class="btn-admin btn-morado">Programar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>