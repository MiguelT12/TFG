<x-app-layout>
    <div class="contenedor-admin">
        <div class="tarjeta-admin seccion-destacados" style="margin-top: 2rem;">
            <h2 class="subtitulo-seccion">Reservas de Pistas</h2>
            
            <div class="tabla-responsive">
                <table class="tabla-usuarios tabla-estilizada">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera">USUARIO</th>
                            <th class="tabla-celda-cabecera">PISTA</th>
                            <th class="tabla-celda-cabecera">FECHA</th>
                            <th class="tabla-celda-cabecera">HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservas as $reserva)
                            <tr class="tabla-fila">
                                <td class="tabla-celda text-bold">{{ $reserva->user->name ?? 'Usuario eliminado' }}</td>
                                <td class="tabla-celda">{{ $reserva->pista->nombre ?? 'Pista eliminada' }}</td>
                                <td class="tabla-celda">{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                                <td class="tabla-celda">{{ \Carbon\Carbon::parse($reserva->hora_inicio)->format('H:i') }}</td>
                            </tr>
                        @empty
                            <tr class="tabla-fila">
                                <td colspan="4" class="tabla-celda" style="text-align: center; color: #9ca3af; font-style: italic;">
                                    No hay reservas de pistas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>