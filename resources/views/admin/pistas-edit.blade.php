<x-app-layout>
    <div class="contenedor-admin contenedor-centrado">
        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion" data-i18n="admin_pistas_edit.titulo">Editar Pista</h2>
            
            <form method="post" action="{{ route('admin.pistas.update', $pista->id) }}">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre" class="form-label" data-i18n="admin_pistas_edit.nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-input" value="{{ $pista->nombre }}" required />
                </div>
                                                
                <div class="form-actions">
                    <a href="{{ route('admin.pistas') }}" class="btn-cancelar" data-i18n="admin_pistas_edit.cancelar">Cancelar</a>
                    <button type="submit" class="btn-admin btn-verde" data-i18n="admin_pistas_edit.actualizar">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>