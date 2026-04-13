<x-app-layout>
    <div class="contenedor-plan-detallado">
        
        <a href="{{ route('dashboard') }}" class="enlace-volver">← Volver al Dashboard</a>

        @foreach($planes as $plan)
            <div class="tarjeta-plan-unica">
                <div class="info-principal">
                    <h1 class="plan-nombre">PLAN {{ $plan['nombre'] }}</h1>
                    <p class="plan-lema">{{ $plan['lema'] }}</p>
                    <div class="plan-precio">{{ $plan['precio'] }}€ <span>/ mes</span></div>
                    <p class="plan-resumen">{{ $plan['descripcion'] }}</p>
                </div>

                <div class="plan-detalles-lista">
                    <h3>¿Qué incluye?</h3>
                    <div class="grid-checks">
                        @foreach($plan['caracteristicas'] as $item)
                            <div class="check-item">
                                <span class="check-icon">✔</span>
                                {{ $item }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="plan-boton-footer">
                    <button class="btn-primario">CONTRATAR AHORA</button>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>