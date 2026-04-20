<x-app-layout>
    <div class="p-6">
        <h1 style="color: yellow; font-size: 30px; margin-bottom: 20px;">
            Mi calendario de clases
        </h1>

        <div style="max-width: 900px; margin: 0 auto;">
            <div id="calendar"></div>
        </div>        
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

            events: @json($eventos),
        });

        calendar.render();
    });
    </script>
</x-app-layout>