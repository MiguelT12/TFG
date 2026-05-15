<x-app-layout>
    <div class="contenedor-admin" style="max-width: 800px; margin: 40px auto;">
        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion" data-i18n="admin_clases_edit.titulo">Editar Clase</h2>
            
            <form method="post" action="{{ route('admin.clases.update', $clase->id) }}">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <x-input-label for="actividad_id" value="Actividad" class="text-white" data-i18n="admin_clases_edit.actividad" />
                        <select name="actividad_id" class="mt-1 block w-full rounded-md text-black" required>
                            @foreach($actividades as $act)
                                <option value="{{ $act->id }}" {{ $clase->actividad_id == $act->id ? 'selected' : '' }}>
                                    {{ $act->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-input-label for="monitor_id" value="Monitor" class="text-white" data-i18n="admin_clases_edit.monitor" />
                        <select name="monitor_id" class="mt-1 block w-full rounded-md text-black" required>
                            @foreach($monitores as $monitor)
                                <option value="{{ $monitor->id }}" {{ $clase->monitor_id == $monitor->id ? 'selected' : '' }}>
                                    {{ $monitor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4">
                    <div>
                        <x-input-label for="dia_semana" value="Día" class="text-white" data-i18n="admin_clases_edit.dia" />
                        <select name="dia_semana" class="mt-1 block w-full rounded-md text-black" required>
                            <option value="lunes" {{ $clase->dia_semana == 'lunes' ? 'selected' : '' }} data-i18n="admin_clases_edit.lunes">Lunes</option>
                            <option value="martes" {{ $clase->dia_semana == 'martes' ? 'selected' : '' }} data-i18n="admin_clases_edit.martes">Martes</option>
                            <option value="miércoles" {{ $clase->dia_semana == 'miércoles' ? 'selected' : '' }} data-i18n="admin_clases_edit.miercoles">Miércoles</option>
                            <option value="jueves" {{ $clase->dia_semana == 'jueves' ? 'selected' : '' }} data-i18n="admin_clases_edit.jueves">Jueves</option>
                            <option value="viernes" {{ $clase->dia_semana == 'viernes' ? 'selected' : '' }} data-i18n="admin_clases_edit.viernes">Viernes</option>
                            <option value="sábado" {{ $clase->dia_semana == 'sábado' ? 'selected' : '' }} data-i18n="admin_clases_edit.sabado">Sábado</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="hora_inicio" value="Hora Inicio" class="text-white" data-i18n="admin_clases_edit.hora_inicio" />
                        <x-text-input type="time" name="hora_inicio" value="{{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}" class="mt-1 block w-full text-black" required />
                    </div>
                    <div>
                        <x-input-label for="capacidad" value="Capacidad" class="text-white" data-i18n="admin_clases_edit.capacidad" />
                        <x-text-input type="number" name="capacidad" value="{{ $clase->capacidad }}" class="mt-1 block w-full text-black" required />
                    </div>
                </div>
                
                <div class="flex justify-end gap-4 mt-6">
                    <a href="{{ route('clases-actividades') }}" class="btn-admin btn-cancelar" style="text-decoration: none; padding: 10px 15px; display: inline-block;" data-i18n="admin_clases_edit.cancelar">Cancelar</a>
                    <button type="submit" class="btn-admin btn-morado" data-i18n="admin_clases_edit.actualizar">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>