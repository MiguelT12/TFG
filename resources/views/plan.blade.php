<x-app-layout>
    <div class="contenedor-plan-detallado">
        @foreach($cuotas as $cuota)
            <div class="tarjeta-plan-unica {{ $loop->even ? 'inversa' : 'normal' }}">
                
                <div class="contenido-texto">
                    <div class="info-principal">
                        <h2 class="plan-nombre">{{ $cuota->nombre }}</h2>
                        <p class="plan-lema">{{ $cuota->lema ?? 'Ideal para empezar tu transformación' }}</p>
                        <div class="plan-precio">{{ $cuota->precio }}€ <span>/ mes</span></div>
                        <p class="plan-resumen">
                            {{ $cuota->descripcion ?? 'Este plan está diseñado para aquellos que buscan libertad y equipamiento de alta gama sin complicaciones.' }}
                        </p>
                    </div>

                    <div class="plan-detalles-lista">
                        <h3>¿Qué incluye?</h3>
                        <div class="grid-checks">
                            @if(is_array($cuota->caracteristicas))
                                @foreach($cuota->caracteristicas as $caracteristica)
                                    <div class="check-item"><span class="check-icon">✓</span> {{ $caracteristica }}</div>
                                @endforeach
                            @else
                                <div class="check-item"><span class="check-icon">✓</span> Acceso 24/7 a la sala</div>
                                <div class="check-item"><span class="check-icon">✓</span> Uso de vestuarios</div>
                            @endif
                        </div>
                    </div>

                    <div class="plan-boton-footer">
                        <form action="{{ route('tarifas.contratar', $cuota->id) }}" method="POST" class="plan-boton-footer">
                            @csrf
                            <button type="submit" style="width: 100%; background-color: #3b82f6; color: white; padding: 12px 24px; border-radius: 6px; border: none; font-weight: bold; cursor: pointer;">
                                CONTRATAR AHORA
                            </button>
                        </form>
                    </div>
                </div>

                <div class="imagen-soldado">
                    <img src="{{ asset('img/soldado' . $loop->iteration . '.png') }}" alt="Soldado">
                </div>

            </div>
        @endforeach
    </div>
</x-app-layout>