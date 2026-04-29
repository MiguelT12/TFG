<x-app-layout>
    <div class="contenedor-admin">
        
        <h1 class="titulo-admin">
            PANEL DE ADMINISTRACIÓN
        </h1>
        
        <div class="tarjeta-admin">
            <h2 class="subtitulo-admin">
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
                                    <form action="{{ route('admin.usuarios.eliminar', $usuario->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar a este usuario permanentemente?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-bottom: 20px;">
                <a href="{{ route('admin.usuarios.nuevo') }}" class="btn-primario" style="text-decoration: none; display: inline-block; padding: 10px 20px;">
                    + AÑADIR USUARIO
                </a>
            </div>
        </div>
    </div>
</x-app-layout>