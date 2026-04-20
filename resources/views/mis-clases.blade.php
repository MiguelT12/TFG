<x-app-layout>
    <div class="contenedor-actividades">
        <h1 class="titulo-actividades">
            MIS CLASES
        </h1>

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
                                <button class="btn-inscribirse" style="background-color: #dc2626;">
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
</x-app-layout>