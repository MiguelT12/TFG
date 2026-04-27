<x-app-layout>
    <div class="contenedor-centrado">
        <div class="tarjeta-admin">
            <h2 class="subtitulo-seccion">Confirmar Compra</h2>
            <p>Estás a punto de contratar la tarifa: <strong>{{ $cuota->nombre }}</strong> ({{ $cuota->precio }}€/mes)</p>
            
            <form method="POST" action="{{ route('tarifas.contratar', $cuota->id) }}" style="margin-top: 1.5rem;">
                @csrf
                
                <div class="form-group">
                    <label for="telefono" class="form-label">Teléfono de contacto</label>
                    <input id="telefono" name="telefono" type="text" class="form-input" required />
                </div>

                <div class="form-group">
                    <label for="metodo_pago" class="form-label">Método de pago</label>
                    <select id="metodo_pago" name="metodo_pago" class="form-input" required>
                        <option value="">Selecciona una opción</option>
                        <option value="tarjeta">Tarjeta de crédito/débito</option>
                        <option value="domiciliacion">Domiciliación bancaria</option>
                        <option value="efectivo">Transferencia bancaria</option>
                    </select>
                </div>
                
                <div class="form-actions">
                    <a href="{{ route('planes.todos') }}" class="btn-cancelar">Cancelar</a>
                    <button type="submit" class="btn-admin btn-verde">Confirmar Contratación</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>