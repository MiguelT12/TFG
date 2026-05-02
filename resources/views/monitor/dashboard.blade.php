<x-app-layout>
    <div class="contenedor-monitor">
        
        <h1 class="titulo-monitor">
            ZONA DE MONITORES
        </h1>
        
        <div class="tarjeta-monitor">

            <h2 class="subtitulo-monitor">
                Mis Clases Asignadas
            </h2>

            <div class="contenedor-buscador">
                <input 
                    type="text" 
                    id="buscador" 
                    placeholder="Buscar actividad, día o hora..." 
                    class="input-buscador"
                >
            </div>

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

                        {{-- Clases --}}
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
                                    {{ $clase->usuarios->count() }} / {{ $clase->capacidad }} alumnos
                                </td>

                                <td class="tabla-celda centrado">
                                    <a href="{{ route('monitor.alumnos', $clase->id) }}" class="btn-ver-alumnos">
                                        Ver Alumnos
                                    </a>
                                </td>

                            </tr>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const buscador = document.getElementById('buscador');

            buscador.addEventListener('keyup', function () {

                let texto = this.value.toLowerCase();
                let filas = document.querySelectorAll('.tabla-fila');

                filas.forEach(fila => {

                    let contenido = fila.innerText.toLowerCase();

                    if (contenido.includes(texto)) {
                        fila.style.display = '';
                    } else {
                        fila.style.display = 'none';
                    }

                });

            });

        });
    </script>

</x-app-layout>