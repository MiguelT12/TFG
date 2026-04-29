<x-app-layout>
    <div class="contenedor-plan-detallado">
        @foreach($cuotas as $cuota)
            <div class="tarjeta-plan-unica {{ $loop->even ? 'inversa' : 'normal' }}">
                
                <div class="contenido-texto">
                    <div class="info-principal">
                        <h2 class="plan-nombre">{{ $cuota->nombre }}</h2>
                        
                        <p class="plan-lema">{{ $cuota->lema }}</p>
                        
                        <div class="plan-precio">{{ $cuota->precio }}€ <span>/ mes</span></div>
                        
                        <p class="plan-resumen">
                            {{ $cuota->descripcion }}
                        </p>
                    </div>

                    <div class="plan-detalles-lista">
                        <h3>¿Qué incluye?</h3>
                        <div class="grid-checks">
                            @if(is_array($cuota->caracteristicas) && count($cuota->caracteristicas) > 0)
                                @foreach($cuota->caracteristicas as $caracteristica)
                                    <div class="check-item"><span class="check-icon">✓</span> {{ $caracteristica }}</div>
                                @endforeach
                            @else
                                <div class="check-item"><span class="check-icon">✓</span> No hay características en la base de datos</div>
                            @endif
                        </div>
                    </div>

                    <div class="plan-boton-footer">
                        @if(auth()->user() && auth()->user()->id_cuota)
                            <a href="{{ route('tarifas.confirmar', $cuota->id) }}" class="btn-contratar require-confirmacion">
                                Contratar {{ $cuota->nombre }}
                            </a>
                        @else
                            <a href="{{ route('tarifas.confirmar', $cuota->id) }}" class="btn-contratar">
                                Contratar {{ $cuota->nombre }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="imagen-soldado">
                    <img src="{{ asset('img/soldado' . $loop->iteration . '.png') }}" alt="Soldado">
                </div>

            </div>
        @endforeach
    </div>
</x-app-layout>