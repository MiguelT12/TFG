<x-app-layout>
    <div class="contenedor-admin">
        <div class="tarjeta-admin seccion-destacados" style="margin-top: 2rem;">
            <h2 class="subtitulo-seccion" data-i18n="admin_reservas_pistas.titulo">Reservas de Pistas</h2>
            
            <div class="tabla-responsive">
                <table class="tabla-usuarios tabla-estilizada">
                    <thead>
                        <tr class="tabla-cabecera">
                            <th class="tabla-celda-cabecera" data-i18n="admin_reservas_pistas.tabla_usuario">USUARIO</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_reservas_pistas.tabla_pista">PISTA</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_reservas_pistas.tabla_fecha">FECHA</th>
                            <th class="tabla-celda-cabecera" data-i18n="admin_reservas_pistas.tabla_hora">HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservas as $reserva)
                            <tr class="tabla-fila">
                                <td class="tabla-celda text-bold">
                                    @if($reserva->user)
                                        {{ $reserva->user->name }}
                                    @else
                                        <span data-i18n="admin_reservas_pistas.usuario_eliminado">Usuario eliminado</span>
                                    @endif
                                </td>
                                <td class="tabla-celda">
                                    @if($reserva->pista)
                                        {{ $reserva->pista->nombre }}
                                    @else
                                        <span data-i18n="admin_reservas_pistas.pista_eliminada">Pista eliminada</span>
                                    @endif
                                </td>
                                <td class="tabla-celda">{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                                <td class="tabla-celda">{{ \Carbon\Carbon::parse($reserva->hora_inicio)->format('H:i') }}</td>
                            </tr>
                        @empty
                            <tr class="tabla-fila">
                                <td colspan="4" class="tabla-celda" data-i18n="admin_reservas_pistas.sin_reservas">
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