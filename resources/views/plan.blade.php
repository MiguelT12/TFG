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
                                    <div class="check-item"><span class="check-icon"><i class="fas fa-check"></i></span> {{ $caracteristica }}</div>
                                @endforeach
                            @else
                                <div class="check-item"><span class="check-icon"><i class="fas fa-check"></i></span> Acceso 24/7 a la sala</div>
                                <div class="check-item"><span class="check-icon"><i class="fas fa-check"></i></span> Uso de vestuarios</div>
                            @endif
                        </div>
                    </div>

                    <div class="plan-boton-footer">
                        <form method="POST" action="{{ route('tarifas.contratar', $cuota->id) }}">
                            @csrf
                            <button type="submit" class="btn-primario" style="width: 100%; background-color: #2563eb; color: white; border: none; border-radius: 6px; cursor: pointer; text-transform: uppercase; font-weight: bold;">
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