<x-app-layout>
    <div class="contenedor-admin contenedor-centrado">
        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion">Editar Pista</h2>
            
            <form method="post" action="{{ route('admin.pistas.update', $pista->id) }}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-input" value="{{ $pista->nombre }}" required />
                </div>
                
                <input type="hidden" name="tipo" value="{{ $pista->tipo ?? 'Estándar' }}">
                
                <div class="form-actions">
                    <a href="{{ route('admin.pistas') }}" class="btn-cancelar">Cancelar</a>
                    <button type="submit" class="btn-admin btn-verde">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>