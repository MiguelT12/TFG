<x-app-layout>
    <div class="contenedor-centrado">
        <div class="tarjeta-admin">
            <h2 class="subtitulo-seccion" data-i18n="contratar.titulo">Confirmar Compra</h2>
            <p>
                <span data-i18n="contratar.mensaje_confirmacion">Estás a punto de contratar la tarifa:</span> 
                <strong>{{ $cuota->nombre }}</strong> ({{ $cuota->precio }}€<span data-i18n="contratar.mes">/mes</span>)
            </p>
            
            <form method="POST" action="{{ route('tarifas.contratar', $cuota->id) }}" style="margin-top: 1.5rem;">
                @csrf
                
                <div class="form-group">
                    <label for="telefono" class="form-label" data-i18n="contratar.telefono">Teléfono de contacto</label>
                    <input id="telefono" name="telefono" type="text" class="form-input" required />
                </div>

                <div class="form-group">
                    <label for="metodo_pago" class="form-label" data-i18n="contratar.metodo_pago">Método de pago</label>
                    <select id="metodo_pago" name="metodo_pago" class="form-input" required>
                        <option value="" data-i18n="contratar.selecciona_opcion">Selecciona una opción</option>
                        <option value="tarjeta" data-i18n="contratar.tarjeta">Tarjeta de crédito/débito</option>
                        <option value="domiciliacion" data-i18n="contratar.domiciliacion">Domiciliación bancaria</option>
                        <option value="efectivo" data-i18n="contratar.transferencia">Transferencia bancaria</option>
                    </select>
                </div>
                
                <div class="form-actions">
                    <a href="{{ route('planes.todos') }}" class="btn-cancelar" data-i18n="contratar.cancelar">Cancelar</a>
                    <button type="submit" class="btn-admin btn-verde" data-i18n="contratar.confirmar">Confirmar Contratación</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>