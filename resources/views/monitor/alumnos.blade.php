<x-app-layout>
    <div class="contenedor-monitor">

        <h1 class="titulo-monitor">
            Alumnos inscritos en {{ $clase->actividad->nombre }}
        </h1>

        <div class="tarjeta-monitor">

            <h2 class="subtitulo-monitor">
                Lista de alumnos
            </h2>

            {{-- Se comprueba si hay alumnos inscritos --}}
            @if($clase->usuarios->count() > 0)

                <div class="tabla-responsive">
                    <table class="tabla-principal">

                        <thead>
                            <tr class="tabla-cabecera">
                                <th class="tabla-celda-cabecera">Nombre</th>
                                <th class="tabla-celda-cabecera">Email</th>
                                <th class="tabla-celda-cabecera centrado">Acción</th>
                            </tr>
                        </thead>

                        <tbody>

                            {{-- Se recorre todos los alumnos inscritos en la clase --}}
                            @foreach($clase->usuarios as $usuario)
                                <tr class="tabla-fila">

                                    {{-- Nombre del alumno --}}
                                    <td class="tabla-celda">{{ $usuario->name }}</td>

                                    {{-- Email del alumno --}}
                                    <td class="tabla-celda">{{ $usuario->email }}</td>

                                    {{-- Botón para eliminar alumno --}}
                                    <td class="tabla-celda centrado">
                                        <button 
                                            type="button" 
                                            class="btn-eliminar-alumno"
                                            onclick="abrirModal({{ $clase->id }}, {{ $usuario->id }}, '{{ $usuario->name }}')"
                                        >
                                            Eliminar
                                        </button>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            {{-- Si no existen alumnos inscritos --}}
            @else
                <p class="celda-vacia centrado">
                    Todavía no hay alumnos inscritos en esta clase.
                </p>
            @endif

        </div>

    </div>

    {{-- Tarjeta de confirmacion para eliminar alumno --}}
    <div id="modalEliminar" class="modal-overlay" style="display: none;">
        <div class="modal-contenido">

            {{-- titulo del modal --}}
            <h2>Eliminar alumno</h2>

            {{-- texto dinamico que se rellena con javascript --}}
            <p id="textoModal"></p>

            <div class="modal-botones">

                {{-- boton cancelar que cierra el modal --}}
                <button onclick="cerrarModal()" class="btn-cancelar">
                    Cancelar
                </button>

                {{-- formulario que enviara la peticion delete --}}
                <form id="formEliminar" method="POST">
                    @csrf
                    @method('DELETE')

                    {{-- boton de confirmacion --}}
                    <button type="submit" class="btn-confirmar">
                        Eliminar
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        // funcion que abre el modal y configura la accion del formulario
        function abrirModal(claseId, usuarioId, nombre) {

            let modal = document.getElementById('modalEliminar');
            let form = document.getElementById('formEliminar');
            let texto = document.getElementById('textoModal');

            // construimos la ruta dinamica para eliminar
            form.action = `/monitor/clase/${claseId}/usuario/${usuarioId}`;

            // mensaje personalizado con el nombre del alumno
            texto.innerText = `¿Eliminar a ${nombre} de la clase?`;

            // mostramos el modal
            modal.style.display = 'flex';
        }

        // funcion para cerrar el modal
        function cerrarModal() {
            document.getElementById('modalEliminar').style.display = 'none';
        }
    </script>
</x-app-layout>