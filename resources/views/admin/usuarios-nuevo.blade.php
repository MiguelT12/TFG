<x-app-layout>
    <div class="contenedor-cuenta">
        <h1 class="titulo-pagina" data-i18n="admin_usuarios_nuevo.titulo">AÑADIR NUEVO USUARIO</h1>

        <form action="{{ route('admin.usuarios.guardar') }}" method="POST" class="tarjeta-perfil">
            @csrf
            
            <div class="grupo-formulario">
                <label data-i18n="admin_usuarios_nuevo.nombre">Nombre y Apellidos:</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="input-perfil">
                @error('name') <span class="texto-error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo-formulario">
                <label data-i18n="admin_usuarios_nuevo.correo">Correo Electrónico:</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="input-perfil">
                @error('email') <span class="texto-error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo-formulario">
                <label data-i18n="admin_usuarios_nuevo.contrasena">Contraseña Temporal:</label>
                <input type="password" name="password" required class="input-perfil" placeholder="Mínimo 8 caracteres" data-i18n="[placeholder]admin_usuarios_nuevo.placeholder_contrasena">
                @error('password') <span class="texto-error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo-formulario">
                <label data-i18n="admin_usuarios_nuevo.rol">Rol del Sistema:</label>
                <select name="role" required class="input-perfil">
                    <option value="usuario" data-i18n="admin_usuarios_nuevo.rol_cliente">Cliente</option>
                    <option value="monitor" data-i18n="admin_usuarios_nuevo.rol_monitor">Monitor</option>
                    <option value="admin" data-i18n="admin_usuarios_nuevo.rol_admin">Administrador</option>
                </select>
                @error('role') <span class="texto-error">{{ $message }}</span> @enderror
            </div>
            
            <div class="acciones-formulario">
                <button type="submit" class="btn-guardar" data-i18n="admin_usuarios_nuevo.btn_crear">Crear Usuario</button>
                <a href="{{ route('dashboard') }}" class="btn-cancelar-perfil" data-i18n="admin_usuarios_nuevo.btn_cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>