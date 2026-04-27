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
            <div style="max-width: 900px; margin: 50px auto; text-align: center; color: white;">
                <p style="font-size: 18px; margin-bottom: 20px;">Debes tener una cuota activa para ver el calendario y apuntarte a clases.</p>
                <a href="{{ route('dashboard') }}" style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: bold;">Volver al inicio</a>
            </div>
        @endif
    </div>
</x-app-layout>