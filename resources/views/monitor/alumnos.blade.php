<x-app-layout>
    <div class="contenedor-monitor">

        <h1 class="titulo-pagina">
            <span data-i18n="monitor_alumnos.titulo">Alumnos inscritos en</span> {{ $clase->actividad->nombre }}
        </h1>

        <div class="tarjeta-monitor">

            <h2 class="subtitulo-seccion" data-i18n="monitor_alumnos.subtitulo">
                Lista de alumnos
            </h2>

            {{-- Se comprueba si hay alumnos inscritos --}}
            @if($clase->usuarios->count() > 0)

                <div class="tabla-responsive">
                    <table class="tabla-principal">

                        <thead>
                            <tr class="tabla-cabecera">
                                <th class="tabla-celda-cabecera" data-i18n="monitor_alumnos.tabla_nombre">Nombre</th>
                                <th class="tabla-celda-cabecera" data-i18n="monitor_alumnos.tabla_email">Email</th>
                                <th class="tabla-celda-cabecera centrado" data-i18n="monitor_alumnos.tabla_accion">Acción</th>
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
                                            data-i18n="monitor_alumnos.btn_eliminar"
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
                <p class="celda-vacia centrado" data-i18n="monitor_alumnos.sin_alumnos">
                    Todavía no hay alumnos inscritos en esta clase.
                </p>
            @endif

        </div>

    </div>

    {{-- Tarjeta de confirmacion para eliminar alumno --}}
    <div id="modalEliminar" class="modal-overlay" style="display: none;">
        <div class="modal-content">

            {{-- titulo del modal --}}
            <h2 data-i18n="monitor_alumnos.modal_titulo" class="modal-titulo">Eliminar alumno</h2>

            {{-- texto dinamico que se rellena con javascript --}}
            <p id="textoModal" class="modal-texto"></p>

            <div class="modal-botones">

                {{-- boton cancelar que cierra el modal --}}
                <button onclick="cerrarModal()" class="btn-cancelar" data-i18n="monitor_alumnos.btn_cancelar">
                    Cancelar
                </button>

                {{-- formulario que enviara la peticion delete --}}
                <form id="formEliminar" method="POST">
                    @csrf
                    @method('DELETE')

                    {{-- boton de confirmacion --}}
                    <button type="submit" class="btn-admin btn-eliminar" data-i18n="monitor_alumnos.btn_confirmar">
                        Eliminar
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>