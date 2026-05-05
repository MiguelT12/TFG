<x-app-layout>
    <div class="contenedor-admin">
        
        <h1 class="titulo-pagina">
            PANEL DE ADMINISTRACIÓN
        </h1>
        
        <div class="tarjeta-admin">
            <h2 class="subtitulo-seccion">
                Gestión de Usuarios
            </h2>

            <div class="tabla-responsive">
                <table class="tabla-usuarios">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera">Nombre</th>
                            <th class="tabla-celda-cabecera">Email</th>
                            <th class="tabla-celda-cabecera">Rol Actual</th>
                            <th class="tabla-celda-cabecera">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr class="tabla-fila">
                                <td class="tabla-celda">{{ $usuario->name }}</td>
                                <td class="tabla-celda">{{ $usuario->email }}</td>
                                <td class="tabla-celda">
                                    <span class="etiqueta-rol etiqueta-{{ $usuario->role }}">
                                        {{ strtoupper($usuario->role) }}
                                    </span>
                                </td>
                                <td class="tabla-celda">
                                    <form action="{{ route('admin.usuarios.eliminar', $usuario->id) }}" method="POST" class="formulario-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-eliminar">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <a href="{{ route('admin.usuarios.nuevo') }}" class="btn-primario">AÑADIR USUARIO</a>
            </div>
        </div>

        <div id="modal-confirmacion" class="modal-oculto">
            <div class="modal-contenido">
                <h2 class="modal-titulo">¿Estás seguro?</h2>
                <p class="modal-texto">Vas a eliminar a este usuario permanentemente.</p>
                <div class="modal-botones">
                    <button id="btn-cancelar" type="button" class="btn-modal-cancelar">Cancelar</button>
                    <button id="btn-confirmar" type="button" class="btn-modal-confirmar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>