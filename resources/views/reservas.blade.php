<x-app-layout>
    <div class="contenedor-reservas">
        <h1 class="titulo-pagina">MIS RESERVAS</h1>

        @if(auth()->user()->id_cuota)
            <div class="grid-columnas-reservas">

                <div class="seccion-reservas">
                    <h2 class="titulo-seccion-reserva">Mis Clases</h2>

                    @if($clases->count() > 0)
                        @foreach($clases as $clase)
                            <div class="tarjeta-reserva">
                                <div class="tarjeta-reserva-header">
                                    <h3>{{ $clase->actividad->nombre }}</h3>
                                    <span class="subtitulo-reserva">{{ $clase->actividad->descripcion }}</span>
                                </div>
                                
                                <div class="tarjeta-reserva-body">
                                    <div class="info-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
                                        <span>{{ ucfirst($clase->dia_semana) }}</span>
                                    </div>
                                    <div class="info-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span>{{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}</span>
                                    </div>
                                    <div class="info-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                        <span>Monitor: {{ $clase->monitor->name ?? 'Por asignar' }}</span>
                                    </div>
                                </div>

                                <div class="tarjeta-reserva-footer">
                                    <form action="{{ route('clases.desapuntarse', $clase->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-cancelar-reserva">Desapuntarse</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="mensaje-vacio">No estás apuntado a ninguna clase.</p>
                    @endif
                </div>

                <div class="seccion-reservas">
                    <h2 class="titulo-seccion-reserva">Mis Pistas</h2>

                    @if(auth()->user()->reservasPistas->count() > 0)
                        @foreach(auth()->user()->reservasPistas as $reserva)
                            <div class="tarjeta-reserva">
                                <div class="tarjeta-reserva-header">
                                    <h3>{{ $reserva->pista->nombre }}</h3>
                                </div>
                                
                                <div class="tarjeta-reserva-body">
                                    <div class="info-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
                                        <span>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="info-item">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span>{{ \Carbon\Carbon::parse($reserva->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($reserva->hora_fin)->format('H:i') }}</span>
                                    </div>
                                </div>

                                <div class="tarjeta-reserva-footer">
                                    <form action="{{ route('pistas.cancelar', $reserva->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-cancelar-reserva">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="mensaje-vacio">No tienes reservas de pistas todavía.</p>
                    @endif
                </div>

            </div>
        @else
            <div class="mensaje-sin-cuota">
                <p class="texto-sin-cuota">Debes tener una cuota activa para ver y gestionar tus reservas.</p>
                <a href="{{ route('planes.todos') }}" class="btn-primario">Ver tarifas</a>
            </div>
        @endif
    </div>
</x-app-layout>