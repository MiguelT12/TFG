document.addEventListener('DOMContentLoaded', function() {

    const reservas = window.reservasPistas || [];
    const fechaGlobal = document.getElementById('fecha-global');

    if (!fechaGlobal) return;

    const hoyObj = new Date();
    const hoy =
        hoyObj.getFullYear() + '-' +
        String(hoyObj.getMonth() + 1).padStart(2, '0') + '-' +
        String(hoyObj.getDate()).padStart(2, '0');

    fechaGlobal.value = hoy;
    fechaGlobal.min = hoy;

    function actualizarPistas() {

        let fecha = fechaGlobal.value;

        let ahora = new Date();
        let horaActual = ahora.getHours();

        document.querySelectorAll('.tarjeta-pista').forEach(tarjeta => {

            const pistaId = tarjeta.querySelector('input[name="pista_id"]').value;

            tarjeta.querySelector('.fecha-hidden').value = fecha;

            tarjeta.querySelectorAll('.hora-btn').forEach(btn => {
                btn.classList.remove('hora-ocupada', 'seleccionada');
            });

            tarjeta.querySelectorAll('input[name="hora_inicio"]').forEach(input => {
                input.disabled = false;
                input.checked = false;
            });

            let reservasFiltradas = reservas.filter(r =>
                r.pista_id == pistaId && r.fecha === fecha
            );

            tarjeta.querySelectorAll('.hora-btn').forEach(label => {

                let input = label.querySelector('input');
                let hora = input.value;
                let horaNumero = parseInt(hora.split(':')[0]);

                let ocupada = false;

                if (fecha === hoy && horaNumero <= horaActual) {
                    ocupada = true;
                }

                reservasFiltradas.forEach(reserva => {

                    let inicio = reserva.hora_inicio.substring(0,5);
                    let fin = reserva.hora_fin.substring(0,5);

                    if (hora >= inicio && hora < fin) {
                        ocupada = true;
                    }

                    let siguienteHora = sumarHora(hora, 2);

                    if (siguienteHora > fin && hora < fin) {
                        ocupada = true;
                    }

                });

                if (ocupada) {
                    input.disabled = true;
                    label.classList.add('hora-ocupada');
                }

            });

        });
    }

    function sumarHora(hora, horasSumar) {
        let [h, m] = hora.split(':');
        let fecha = new Date();
        fecha.setHours(parseInt(h) + horasSumar);
        fecha.setMinutes(m);
        return fecha.toTimeString().substring(0,5);
    }

    fechaGlobal.addEventListener('change', actualizarPistas);

    actualizarPistas();

    document.querySelectorAll('.hora-btn').forEach(label => {
        label.addEventListener('click', function () {

            let input = this.querySelector('input');
            if (input.disabled) return;

            let grupo = this.closest('.grid-horas');
            grupo.querySelectorAll('.hora-btn').forEach(l => l.classList.remove('seleccionada'));

            input.checked = true;
            this.classList.add('seleccionada');
        });
    });

    document.querySelectorAll('.opcion-duracion').forEach(label => {
        label.addEventListener('click', function () {

            let input = this.querySelector('input');

            let grupo = this.closest('.selector-duracion');
            grupo.querySelectorAll('.opcion-duracion').forEach(l => l.classList.remove('activa'));

            input.checked = true;
            this.classList.add('activa');
        });
    });

});