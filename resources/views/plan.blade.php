<x-app-layout>
    <div class="contenedor-plan-detallado">
        @foreach($cuotas as $cuota)
            <div class="tarjeta-plan-unica {{ $loop->even ? 'inversa' : 'normal' }}">
                
                <div class="contenido-texto">
                    <div class="info-principal">
                        <h2 class="plan-nombre">{{ $cuota->nombre }}</h2>
                        
                        <p class="plan-lema">{{ $cuota->lema }}</p>
                        
                        <div class="plan-precio">{{ $cuota->precio }}€ <span data-i18n="tarifas.mes">/ mes</span></div>
                        
                        <p class="plan-resumen">
                            {{ $cuota->descripcion }}
                        </p>
                    </div>

                    <div class="plan-detalles-lista">
                        <h3 data-i18n="tarifas.que_incluye">¿Qué incluye?</h3>
                        <div class="grid-checks">
                            @if(is_array($cuota->caracteristicas) && count($cuota->caracteristicas) > 0)
                                @foreach($cuota->caracteristicas as $caracteristica)
                                    <div class="check-item"><span class="check-icon">✓</span> {{ $caracteristica }}</div>
                                @endforeach
                            @else
                                <div class="check-item"><span class="check-icon">✓</span>0</div>
                            @endif
                        </div>
                    </div>

                    <div class="plan-boton-footer">
                        @if(auth()->user() && auth()->user()->id_cuota)
                            <a href="{{ route('tarifas.confirmar', $cuota->id) }}" class="btn-contratar require-confirmacion">
                                <span data-i18n="tarifas.contratar">Contratar</span> {{ $cuota->nombre }}
                            </a>
                        @else
                            <a href="{{ route('tarifas.confirmar', $cuota->id) }}" class="btn-contratar">
                                <span data-i18n="tarifas.contratar">Contratar</span> {{ $cuota->nombre }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="imagen-soldado" style="flex-shrink: 0; display: flex; align-items: center; justify-content: center; width: 250px;">
                    <img src="{{ asset('img/soldado' . $loop->iteration . '.png') }}" alt="Soldado" style="height: 350px; width: auto; object-fit: contain;">
                </div>

            </div>
        @endforeach
        
        <div id="modal-confirmacion-tarifa" class="modal-oculto">
            <div class="modal-content">
                <h2 class="modal-titulo" data-i18n="tarifas.modal_titulo">Confirmar tarifa</h2>
                <p class="modal-texto" data-i18n="tarifas.modal_texto">¿Estás seguro de que deseas contratar esta tarifa?</p>
                <div class="modal-botones">
                    <button id="btn-cancelar-tarifa" type="button" class="btn-modal-cancelar" data-i18n="tarifas.cancelar">
                        Cancelar
                    </button>
                    <button id="btn-confirmar-tarifa" type="button" class="btn-modal-aceptar" data-i18n="tarifas.confirmar_btn">
                        Sí, contratar
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>