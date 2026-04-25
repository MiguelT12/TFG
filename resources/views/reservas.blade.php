<x-app-layout>
    <div class="contenedor-actividades">
        <h1 class="titulo-actividades">MIS RESERVAS</h1>

        @if(auth()->user()->id_cuota)
            <div class="grid-mis-reservas">

                <div class="seccion-reservas">
                    <h2 class="subtitulo">Mis Clases</h2>

                    @if($clases->count() > 0)
                        <div class="grid-actividades">
                            @foreach($clases as $clase)
                                <div class="tarjeta-actividad">
                                    <div class="cabecera-actividad">
                                        <h2 class="nombre-actividad">
                                            {{ $clase->actividad->nombre }}
                                        </h2>
                                        <p class="desc-actividad">
                                            {{ $clase->actividad->descripcion }}
                                        </p>
                                    </div>

                                    <div class="cuerpo-actividad">
                                        <p class="dia-hora">
                                            {{ $clase->dia_semana }} - {{ \Carbon\Carbon::parse($clase->hora_inicio)->format('H:i') }}
                                        </p>

                                        <p class="detalle-horario">
                                            Monitor: {{ $clase->monitor->name ?? 'Por asignar' }}
                                        </p>

                                        <form action="{{ route('clases.desapuntarse', $clase->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-cancelar-reserva">
                                                Desapuntarse
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="sin-clases">
                            No estás apuntado a ninguna clase.
                        </p>
                    @endif
                </div>

                <div class="seccion-reservas">
                    <h2 class="subtitulo">Mis Pistas</h2>

                    @if(auth()->user()->reservasPistas->count() > 0)
                        <div class="grid-actividades">
                            @foreach(auth()->user()->reservasPistas as $reserva)
                                <div class="tarjeta-actividad">
                                    <div class="cuerpo-actividad">
                                        <h2 class="nombre-actividad" style="margin-bottom: 10px;">
                                            {{ $reserva->pista->nombre }}
                                        </h2>
                                        <p class="dia-hora">
                                            {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}
                                        </p>
                                        <p class="detalle-horario">
                                            {{ \Carbon\Carbon::parse($reserva->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($reserva->hora_fin)->format('H:i') }}
                                        </p>

                                        <form action="{{ route('pistas.cancelar', $reserva->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-cancelar-reserva">
                                                Cancelar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="sin-clases">
                            No tienes reservas de pistas todavía.
                        </p>
                    @endif
                </div>

            </div>
        @else
            <div class="mensaje-sin-cuota">
                <p class="texto-sin-cuota">Debes tener una cuota activa para ver y gestionar tus reservas.</p>
                <a href="{{ route('dashboard') }}" class="btn-primario">Volver al inicio</a>
            </div>
        @endif
    </div>
</x-app-layout>