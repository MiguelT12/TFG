<x-app-layout>
    <div class="contenedor-admin">
        
        <h1 class="titulo-admin">
            PANEL DE ADMINISTRACIÓN
        </h1>
        
        <div class="tarjeta-admin">
            <h2 class="subtitulo-admin">
                Gestión de Usuarios Registrados
            </h2>

            <div class="tabla-responsive">
                <table class="tabla-usuarios">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera">Nombre</th>
                            <th class="tabla-celda-cabecera">Email</th>
                            <th class="tabla-celda-cabecera">Rol Actual</th>
                            <th class="tabla-celda-cabecera centrado">Acciones</th>
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
                                <td class="tabla-celda centrado">
                                    <button class="btn-cambiar-rol">
                                        Cambiar Rol
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>