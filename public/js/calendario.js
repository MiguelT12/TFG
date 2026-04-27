document.addEventListener('DOMContentLoaded', function () {

    let calendarEl = document.getElementById('calendar');

    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',

        events: window.eventosCalendario, 

        eventClick: function(info) {

            let actividadId = info.event.extendedProps.actividad_id;
            let elemento = document.getElementById('actividad-' + actividadId);

            if (elemento) {
                elemento.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                elemento.classList.add('destacada');

                setTimeout(() => {
                    elemento.classList.remove('destacada');
                }, 2000);
            }
        }
    });

    calendar.render();
});