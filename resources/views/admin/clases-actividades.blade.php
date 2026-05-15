<x-app-layout>
    <div class="contenedor-admin">
        
        <div class="acciones-superiores">
            <button id="btn-abrir-actividad" class="btn-admin btn-verde">
                <i class="fas fa-plus-circle"></i> <span data-i18n="admin_gestion.btn_anadir_actividad">Añadir Actividad</span>
            </button>
            
            <button id="btn-abrir-clase" class="btn-admin btn-morado">
                <i class="fas fa-calendar-plus"></i> <span data-i18n="admin_gestion.btn_anadir_clase">Añadir Clase</span>
            </button>
        </div>

        @if(session('success'))
            <div class="reserva-item alerta-exito mb-20">
                {{ session('success') }}
            </div>
        @endif

        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion" data-i18n="admin_gestion.titulo_actividades">Gestión de Actividades</h2>
            
            <div class="tabla-responsive">
                <table class="tabla-usuarios tabla-estilizada">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera col-id">ID</th>
                            <th class="tabla-celda-cabecera col-nombre" data-i18n="admin_gestion.tabla_nombre">NOMBRE</th>
                            <th class="tabla-celda-cabecera col-descripcion" data-i18n="admin_gestion.tabla_descripcion">DESCRIPCIÓN</th>
                            <th class="tabla-celda-cabecera col-acciones" data-i18n="admin_gestion.tabla_acciones">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actividades as $actividad)
                            <tr class="tabla-fila">
                                <td class="tabla-celda text-bold">{{ $actividad->id }}</td>
                                <td class="tabla-celda">{{ $actividad->nombre }}</td>
                                <td class="tabla-celda">{{ $actividad->descripcion }}</td>
                                <td class="tabla-celda acciones-celda">
                                    <a href="{{ route('admin.actividades.edit', $actividad->id) }}" class="btn-accion btn-editar btn-enlace" data-i18n="admin_gestion.btn_editar">Editar</a>
                                    <button type="button" class="btn-accion btn-eliminar btn-abrir-eliminar" data-action="{{ route('admin.actividades.destroy', $actividad->id) }}" data-i18n="admin_gestion.btn_eliminar">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tarjeta-admin seccion-destacados mt-30">
            <h2 class="subtitulo-seccion" data-i18n="admin_gestion.titulo_clases">Gestión de Clases</h2>
            
            <div class="tabla-responsive">
                <table class="tabla-usuarios tabla-estilizada">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera" data-i18n="admin_gestion.tabla_actividad">ACTIVIDAD</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_gestion.tabla_monitor">MONITOR</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_gestion.tabla_dia">DÍA</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_gestion.tabla_hora">HORA</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_gestion.tabla_capacidad">CAPACIDAD</th>
                            <th class="tabla-celda-cabecera col-acciones" data-i18n="admin_gestion.tabla_acciones">ACCIONES</th>
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
                                    <a href="{{ route('admin.clases.edit', $clase->id) }}" class="btn-accion btn-editar btn-enlace" data-i18n="admin_gestion.btn_editar">Editar</a>
                                    <button type="button" class="btn-accion btn-eliminar btn-abrir-eliminar" data-action="{{ route('admin.clases.destroy', $clase->id) }}" data-i18n="admin_gestion.btn_eliminar">Eliminar</button>
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
                <h2 class="subtitulo-nosotros modal-title" data-i18n="admin_gestion.modal_actividad_titulo">Nueva Actividad</h2>
                
                <div class="form-group">
                    <label for="nombre" class="form-label" data-i18n="admin_gestion.label_nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-input" required />
                </div>
                
                <div class="form-group-lg">
                    <label for="descripcion" class="form-label" data-i18n="admin_gestion.label_descripcion">Descripción</label>
                    <textarea name="descripcion" class="form-input" rows="3" required></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" id="btn-cerrar-actividad" class="btn-admin btn-admin btn-cancelar" data-i18n="admin_gestion.btn_cancelar">Cancelar</button>
                    <button type="submit" class="btn-admin btn-verde" data-i18n="admin_gestion.btn_guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-clase" class="modal-overlay">
        <div class="modal-content modal-content-lg">
            <form method="post" action="{{ route('admin.clases.store') }}">
                @csrf
                <h2 class="subtitulo-nosotros modal-title" data-i18n="admin_gestion.modal_clase_titulo">Programar Clase</h2>
                
                <div class="grid-2-cols">
                    <div>
                        <label for="actividad_id" class="form-label" data-i18n="admin_gestion.label_actividad">Actividad</label>
                        <select name="actividad_id" class="form-input" required>
                            @foreach($actividades as $act)
                                <option value="{{ $act->id }}">{{ $act->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="monitor_id" class="form-label" data-i18n="admin_gestion.label_monitor">Monitor</label>
                        <select name="monitor_id" class="form-input" required>
                            @foreach($monitores as $monitor)
                                <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid-3-cols">
                    <div>
                        <label for="dia_semana" class="form-label" data-i18n="admin_gestion.label_dia">Día</label>
                        <select name="dia_semana" class="form-input" required>
                            <option value="lunes" data-i18n="admin_gestion.lunes">Lunes</option>
                            <option value="martes" data-i18n="admin_gestion.martes">Martes</option>
                            <option value="miércoles" data-i18n="admin_gestion.miercoles">Miércoles</option>
                            <option value="jueves" data-i18n="admin_gestion.jueves">Jueves</option>
                            <option value="viernes" data-i18n="admin_gestion.viernes">Viernes</option>
                            <option value="sábado" data-i18n="admin_gestion.sabado">Sábado</option>
                        </select>
                    </div>
                    <div>
                        <label for="hora_inicio" class="form-label" data-i18n="admin_gestion.label_hora_inicio">Hora Inicio</label>
                        <input type="time" name="hora_inicio" class="form-input" required />
                    </div>
                    <div>
                        <label for="capacidad" class="form-label" data-i18n="admin_gestion.label_capacidad">Capacidad</label>
                        <input type="number" name="capacidad" value="20" class="form-input" required />
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" id="btn-cerrar-clase" class="btn-admin btn-admin btn-cancelar" data-i18n="admin_gestion.btn_cancelar">Cancelar</button>
                    <button type="submit" class="btn-admin btn-morado" data-i18n="admin_gestion.btn_programar">Programar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-confirmar-eliminar" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <h2 class="subtitulo-nosotros modal-title">Confirmar Eliminación</h2>
            <p class="mb-20">¿Estás seguro de que deseas eliminar este elemento? Esta acción no se puede deshacer.</p>
            
            <div class="form-actions">
                <button type="button" id="btn-cerrar-eliminar" class="btn-admin btn-cancelar" data-i18n="admin_gestion.btn_cancelar">Cancelar</button>
                <form id="form-delete-confirm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-admin btn-eliminar">Sí, eliminar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>