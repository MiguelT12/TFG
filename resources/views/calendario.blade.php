<x-app-layout>
    <div class="p-6">
        <h1 class="titulo-pagina">
            MI CALENDARIO DE CLASES
        </h1>

        @if(auth()->user()->id_cuota)
            <div style="max-width: 900px; margin: 0 auto;">
                <div id="calendar"></div>
            </div>        

            {{-- Calendario con libreria FullCalendar --}}
            <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.global.min.js"></script>

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                let calendarEl = document.getElementById('calendar');

                let calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',

                    buttonText: {
                        today: 'Hoy'
                    },

                    events: @json($eventos ?? []),
                });

                calendar.render();
            });
            </script>
        @else
            <div class="mensaje-sin-cuota">
                <p class="texto-sin-cuota">Debes tener una cuota activa para ver el calendario y apuntarte a clases.</p>
                <a href="{{ route('planes.todos') }}"class="btn-primario">Ver tarifas</a>
            </div>
        @endif
    </div>
</x-app-layout>