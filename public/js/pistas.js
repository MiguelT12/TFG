document.addEventListener('DOMContentLoaded', function() {
    
    const reservas = window.reservasPistas || [];

    document.querySelectorAll('.tarjeta-pista').forEach(tarjeta => {

        const fechaInput = tarjeta.querySelector('.fecha-input');
        const pistaId = tarjeta.querySelector('input[name="pista_id"]').value;

        fechaInput.addEventListener('change', function () {

            let fecha = this.value;

            tarjeta.querySelectorAll('input[name="hora_inicio"]').forEach(input => {
                input.disabled = false;
                input.checked = false;
            });

            tarjeta.querySelectorAll('input[name="duracion"]').forEach(input => {
                input.disabled = false;
            });

            tarjeta.querySelectorAll('.hora-btn').forEach(btn => {
                btn.classList.remove('hora-ocupada', 'seleccionada');
            });

            let reservasFiltradas = reservas.filter(r =>
                r.pista_id == pistaId && r.fecha === fecha
            );

            tarjeta.querySelectorAll('.hora-btn').forEach(label => {

                let input = label.querySelector('input');
                let hora = input.value;

                let ocupada = false;

                reservasFiltradas.forEach(reserva => {

                    let inicio = reserva.hora_inicio.substring(0,5);
                    let fin = reserva.hora_fin.substring(0,5);

                    if (hora >= inicio && hora < fin) {
                        ocupada = true;
                    }

                });

                if (ocupada) {
                    input.disabled = true;
                    label.classList.add('hora-ocupada');
                }
            });

        });

        tarjeta.querySelectorAll('.hora-btn').forEach(boton => {
            boton.addEventListener('click', (e) => {
                if (!fechaInput.value) {
                    e.preventDefault();
                    alert('Primero debes seleccionar una fecha');
                }
            });
        });

        tarjeta.querySelectorAll('.opcion-duracion').forEach(boton => {
            boton.addEventListener('click', (e) => {
                if (!fechaInput.value) {
                    e.preventDefault();
                    alert('Primero debes seleccionar una fecha');
                }
            });
        });

    });

    document.querySelectorAll('.hora-btn input').forEach(input => {
        input.addEventListener('change', () => {
            let grupo = input.closest('.grid-horas');
            grupo.querySelectorAll('.hora-btn').forEach(l => l.classList.remove('seleccionada'));
            input.closest('.hora-btn').classList.add('seleccionada');
        });
    });

    document.querySelectorAll('.opcion-duracion input').forEach(input => {
        input.addEventListener('change', () => {
            let grupo = input.closest('.selector-duracion');
            grupo.querySelectorAll('.opcion-duracion').forEach(l => l.classList.remove('activa'));
            input.closest('.opcion-duracion').classList.add('activa');
        });
    });

});