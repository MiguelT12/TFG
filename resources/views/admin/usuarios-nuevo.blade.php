<x-app-layout>
    <div class="contenedor-cuenta">
        <h1 class="titulo-pagina">AÑADIR NUEVO USUARIO</h1>

        <form action="{{ route('admin.usuarios.guardar') }}" method="POST" class="tarjeta-perfil">
            @csrf
            
            <div class="grupo-formulario">
                <label>Nombre y Apellidos:</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="input-perfil">
                @error('name') <span class="texto-error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo-formulario">
                <label>Correo Electrónico:</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="input-perfil">
                @error('email') <span class="texto-error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo-formulario">
                <label>Contraseña Temporal:</label>
                <input type="password" name="password" required class="input-perfil" placeholder="Mínimo 8 caracteres">
                @error('password') <span class="texto-error">{{ $message }}</span> @enderror
            </div>

            <div class="grupo-formulario">
                <label>Rol del Sistema:</label>
                <select name="role" required class="input-perfil">
                    <option value="usuario">Usuario / Cliente</option>
                    <option value="monitor">Monitor / Entrenador</option>
                    <option value="admin">Administrador</option>
                </select>
                @error('role') <span class="texto-error">{{ $message }}</span> @enderror
            </div>
            
            <div class="acciones-formulario">
                <button type="submit" class="btn-guardar">Crear Usuario</button>
                <a href="{{ route('dashboard') }}" class="btn-cancelar-perfil">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>