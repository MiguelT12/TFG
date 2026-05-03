<x-app-layout>
    @php
        $horas = [
            '10:00','12:00','14:00','16:00','18:00','20:00'
        ];
        $acceso = auth()->user()->cuota && in_array(strtolower(auth()->user()->cuota->nombre), ['plata', 'oro']);
    @endphp

    <div class="contenedor-pistas">

        <h1 class="titulo-pagina">Reservar pistas</h1>

        @if($acceso)
            <div class="grid-pistas">

                @foreach($pistas as $pista)
                    <div class="tarjeta-pista">

                        <h2 class="nombre-pista">{{ $pista->nombre }}</h2>

                        <form action="{{ route('pistas.reservar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="pista_id" value="{{ $pista->id }}">

                            <input type="date"
                                   name="fecha"
                                   min="{{ date('Y-m-d') }}"
                                   required
                                   class="input-pista fecha-input">

                            <div class="grid-horas">
                                @foreach($horas as $hora)
                                    <label class="hora-btn">
                                        <input type="radio"
                                               name="hora_inicio"
                                               value="{{ $hora }}"
                                               hidden
                                               disabled
                                               required>
                                        <span>{{ $hora }}</span>
                                    </label>
                                @endforeach
                            </div>

                            <div class="selector-duracion">
                                <label class="opcion-duracion activa">
                                    <input type="radio" name="duracion" value="1" checked hidden disabled>
                                    1h
                                </label>

                                <label class="opcion-duracion">
                                    <input type="radio" name="duracion" value="2" hidden disabled>
                                    2h
                                </label>
                            </div>

                            <button type="submit" class="btn-reservar">
                                Reservar
                            </button>
                        </form>

                    </div>
                @endforeach

            </div>

            @if(session('error'))
                <div class="reserva-item alerta-error">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="reserva-item alerta-exito">
                    {{ session('success') }}
                </div>
            @endif

            <script>
                window.reservasPistas = @json($reservas);
            </script>

        @else
            <div class="mensaje-sin-cuota">
                <p class="texto-sin-cuota">Debes tener la tarifa Plata u Oro para reservar pistas.</p>
                <a href="{{ route('planes.todos') }}" class="btn-primario">Ver Tarifas</a>
            </div>
        @endif

    </div>
</x-app-layout>