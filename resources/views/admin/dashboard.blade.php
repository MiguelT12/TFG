<x-app-layout>
    <div class="contenedor-admin">
        
        <h1 class="titulo-pagina" data-i18n="admin_panel.titulo_pagina">
            PANEL DE ADMINISTRACIÓN
        </h1>
        
        <div class="tarjeta-admin">
            <h2 class="subtitulo-seccion" data-i18n="admin_panel.subtitulo_seccion">
                Gestión de Usuarios
            </h2>

            <div class="tabla-responsive">
                <table class="tabla-usuarios">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera" data-i18n="admin_panel.tabla_nombre">Nombre</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_panel.tabla_email">Email</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_panel.tabla_rol">Rol Actual</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_panel.tabla_acciones">Acciones</th>
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
                                        <button type="submit" class="btn-eliminar" data-i18n="admin_panel.btn_eliminar">
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
                <a href="{{ route('admin.usuarios.nuevo') }}" class="btn-primario" data-i18n="admin_panel.btn_anadir_usuario">AÑADIR USUARIO</a>
            </div>
        </div>

        <div id="modal-confirmacion" class="modal-oculto">
            <div class="modal-contenido">
                <h2 class="modal-titulo" data-i18n="admin_panel.modal_titulo">¿Estás seguro?</h2>
                <p class="modal-texto" data-i18n="admin_panel.modal_texto">Vas a eliminar a este usuario permanentemente.</p>
                <div class="modal-botones">
                    <button id="btn-cancelar" type="button" class="btn-modal-cancelar" data-i18n="admin_panel.btn_cancelar">Cancelar</button>
                    <button id="btn-confirmar" type="button" class="btn-modal-confirmar" data-i18n="admin_panel.btn_confirmar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>