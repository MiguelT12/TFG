<x-app-layout>
    <div class="contenedor-admin" style="max-width: 800px; margin: 40px auto;">
        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion">Editar Clase</h2>
            
            <form method="post" action="{{ route('admin.clases.update', $clase->id) }}">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <x-input-label for="actividad_id" value="Actividad" class="text-white" />
                        <select name="actividad_id" class="mt-1 block w-full rounded-md text-black" required>
                            @foreach($actividades as $act)
                                <option value="{{ $act->id }}" {{ $clase->actividad_id == $act->id ? 'selected' : '' }}>
                                    {{ $act->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-input-label for="monitor_id" value="Monitor" class="text-white" />
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
                        <x-input-label for="dia_semana" value="Día" class="text-white" />
                        <select name="dia_semana" class="mt-1 block w-full rounded-md text-black" required>
                            <option value="lunes" {{ $clase->dia_semana == 'lunes' ? 'selected' : '' }}>Lunes</option>
                            <option value="martes" {{ $clase->dia_semana == 'martes' ? 'selected' : '' }}>Martes</option>
                            <option value="miércoles" {{ $clase->dia_semana == 'miércoles' ? 'selected' : '' }}>Miércoles</option>
                            <option value="jueves" {{ $clase->dia_semana == 'jueves' ? 'selected' : '' }}>Jueves</option>
                            <option value="viernes" {{ $clase->dia_semana == 'viernes' ? 'selected' : '' }}>Viernes</option>
                            <option value="sábado" {{ $clase->dia_semana == 'sábado' ? 'selected' : '' }}>Sábado</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="hora_inicio" value="Hora Inicio" class="text-white" />
                        <x-text-input type="time" name="hora_inicio" value="{{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}" class="mt-1 block w-full text-black" required />
                    </div>
                    <div>
                        <x-input-label for="capacidad" value="Capacidad" class="text-white" />
                        <x-text-input type="number" name="capacidad" value="{{ $clase->capacidad }}" class="mt-1 block w-full text-black" required />
                    </div>
                </div>
                
                <div class="flex justify-end gap-4 mt-6">
                    <a href="{{ route('clases-actividades') }}" class="btn-cancelar" style="text-decoration: none; padding: 10px 15px; display: inline-block;">Cancelar</a>
                    <button type="submit" class="btn-admin btn-morado">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>