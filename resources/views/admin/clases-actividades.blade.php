<x-app-layout>
    <div class="contenedor-admin">
        
        {{-- SECCIÓN DE BOTONES SUPERIORES --}}
        <div class="acciones-superiores">
            <button onclick="document.getElementById('modal-actividad').style.display='flex'" class="btn-admin btn-verde">
                <i class="fas fa-plus-circle"></i> Añadir Actividad
            </button>
            
            <button onclick="document.getElementById('modal-clase').style.display='flex'" class="btn-admin btn-morado">
                <i class="fas fa-calendar-plus"></i> Añadir Clase
            </button>
        </div>

        {{-- MENSAJES DE ÉXITO --}}
        @if(session('success'))
            <div class="reserva-item alerta-exito" style="margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABLA DE GESTIÓN DE ACTIVIDADES --}}
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
                                    <a href="{{ route('admin.actividades.edit', $actividad->id) }}" class="btn-accion btn-editar" style="text-decoration: none; display: inline-block; text-align: center;">Editar</a>
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

        {{-- TABLA DE GESTIÓN DE CLASES --}}
        <div class="tarjeta-admin seccion-destacados" style="margin-top: 30px;">
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
                                    <a href="{{ route('admin.clases.edit', $clase->id) }}" class="btn-accion btn-editar" style="text-decoration: none; display: inline-block; text-align: center;">Editar</a>
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

    {{-- MODAL AÑADIR ACTIVIDAD (SIN ALPINE) --}}
    <div id="modal-actividad" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.7); z-index: 100; justify-content: center; align-items: center;">
        <div style="background-color: #1e293b; padding: 24px; border-radius: 8px; width: 100%; max-width: 500px; border: 1px solid #334155;">
            <form method="post" action="{{ route('admin.actividades.store') }}">
                @csrf
                <h2 class="subtitulo-nosotros" style="font-size: 1.5rem; color: white; margin-bottom: 20px;">Nueva Actividad</h2>
                
                <div style="margin-bottom: 15px;">
                    <label for="nombre" style="color: white; display: block; margin-bottom: 5px;">Nombre</label>
                    <input id="nombre" name="nombre" type="text" style="width: 100%; border-radius: 6px; padding: 8px; color: black;" required />
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label for="descripcion" style="color: white; display: block; margin-bottom: 5px;">Descripción</label>
                    <textarea name="descripcion" style="width: 100%; border-radius: 6px; padding: 8px; color: black;" rows="3" required></textarea>
                </div>
                
                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" onclick="document.getElementById('modal-actividad').style.display='none'" class="btn-cancelar" style="padding: 10px 15px;">Cancelar</button>
                    <button type="submit" class="btn-admin btn-verde">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL AÑADIR CLASE (SIN ALPINE) --}}
    <div id="modal-clase" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.7); z-index: 100; justify-content: center; align-items: center;">
        <div style="background-color: #1e293b; padding: 24px; border-radius: 8px; width: 100%; max-width: 600px; border: 1px solid #334155;">
            <form method="post" action="{{ route('admin.clases.store') }}">
                @csrf
                <h2 class="subtitulo-nosotros" style="font-size: 1.5rem; color: white; margin-bottom: 20px;">Programar Clase</h2>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label for="actividad_id" style="color: white; display: block; margin-bottom: 5px;">Actividad</label>
                        <select name="actividad_id" style="width: 100%; border-radius: 6px; padding: 8px; color: black;" required>
                            @foreach($actividades as $act)
                                <option value="{{ $act->id }}">{{ $act->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="monitor_id" style="color: white; display: block; margin-bottom: 5px;">Monitor</label>
                        <select name="monitor_id" style="width: 100%; border-radius: 6px; padding: 8px; color: black;" required>
                            @foreach($monitores as $monitor)
                                <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                    <div>
                        <label for="dia_semana" style="color: white; display: block; margin-bottom: 5px;">Día</label>
                        <select name="dia_semana" style="width: 100%; border-radius: 6px; padding: 8px; color: black;" required>
                            <option value="lunes">Lunes</option>
                            <option value="martes">Martes</option>
                            <option value="miércoles">Miércoles</option>
                            <option value="jueves">Jueves</option>
                            <option value="viernes">Viernes</option>
                            <option value="sábado">Sábado</option>
                        </select>
                    </div>
                    <div>
                        <label for="hora_inicio" style="color: white; display: block; margin-bottom: 5px;">Hora Inicio</label>
                        <input type="time" name="hora_inicio" style="width: 100%; border-radius: 6px; padding: 8px; color: black;" required />
                    </div>
                    <div>
                        <label for="capacidad" style="color: white; display: block; margin-bottom: 5px;">Capacidad</label>
                        <input type="number" name="capacidad" value="20" style="width: 100%; border-radius: 6px; padding: 8px; color: black;" required />
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" onclick="document.getElementById('modal-clase').style.display='none'" class="btn-cancelar" style="padding: 10px 15px;">Cancelar</button>
                    <button type="submit" class="btn-admin btn-morado">Programar</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>