<x-app-layout>
    <div class="contenedor-admin">
        <div class="acciones-superiores">
            <button onclick="document.getElementById('modal-pista').classList.add('activo')" class="btn-admin btn-verde">
                <i class="fas fa-plus-circle"></i> <span data-i18n="admin_pistas.btn_anadir_pista">Añadir Pista</span>
            </button>
        </div>

        @if(session('success'))
            <div class="reserva-item alerta-exito form-group">
                {{ session('success') }}
            </div>
        @endif

        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion" data-i18n="admin_pistas.titulo">Gestión de Pistas</h2>
            
            <div class="tabla-responsive">
                <table class="tabla-usuarios tabla-estilizada">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera col-id">ID</th>
                            <th class="tabla-celda-cabecera col-nombre" data-i18n="admin_pistas.tabla_nombre">NOMBRE</th>
                            <th class="tabla-celda-cabecera col-acciones" data-i18n="admin_pistas.tabla_acciones">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pistas as $pista)
                            <tr class="tabla-fila">
                                <td class="tabla-celda text-bold">{{ $pista->id }}</td>
                                <td class="tabla-celda">{{ $pista->nombre }}</td>
                                <td class="tabla-celda acciones-celda">
                                    <a href="{{ route('admin.pistas.edit', $pista->id) }}" class="btn-accion btn-editar" data-i18n="admin_pistas.btn_editar">Editar</a>
                                    <form action="{{ route('admin.pistas.destroy', $pista->id) }}" method="POST" onsubmit="return confirm('{{ __('admin_pistas.confirmar_eliminar') }}')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-accion btn-eliminar" data-i18n="admin_pistas.btn_eliminar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modal-pista" class="modal-overlay">
        <div class="modal-content">
            <form method="post" action="{{ route('admin.pistas.store') }}">
                @csrf
                <h2 class="subtitulo-nosotros form-group" data-i18n="admin_pistas.modal_titulo">Nueva Pista</h2>
                
                <div class="form-group">
                    <label for="nombre" class="form-label" data-i18n="admin_pistas.label_nombre">Nombre de la Pista</label>
                    <input id="nombre" name="nombre" type="text" class="form-input" required />
                </div>
                
                <input type="hidden" name="tipo" value="Estándar">
                
                <div class="form-actions">
                    <button type="button" onclick="document.getElementById('modal-pista').classList.remove('activo')" class="btn-cancelar" data-i18n="admin_pistas.btn_cancelar">Cancelar</button>
                    <button type="submit" class="btn-admin btn-verde" data-i18n="admin_pistas.btn_guardar">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>