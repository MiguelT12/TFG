<x-app-layout>
    <div class="contenedor-cuenta">
        <h1 class="titulo-cuenta">EDITAR MIS DATOS</h1>

        <form action="{{ route('perfil.actualizar') }}" method="POST" class="tarjeta-perfil" style="padding: 30px;">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: white; margin-bottom: 5px;">Nombre:</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: none; color: black;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; color: white; margin-bottom: 5px;">Primer Apellido:</label>
                <input type="text" name="apellido1" value="{{ Auth::user()->apellido1 }}" style="width: 100%; padding: 10px; border-radius: 5px; border: none; color: black;">
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; color: white; margin-bottom: 5px;">Correo Electrónico:</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: none; color: black;">
            </div>
            
            <div style="display: flex; gap: 15px;">
                <button type="submit" class="btn-editar-perfil" style="flex: 1;">Guardar Cambios</button>
                <a href="{{ route('dashboard') }}" style="flex: 1; text-align: center; padding: 10px; background-color: #4b5563; color: white; text-decoration: none; border-radius: 5px;">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>