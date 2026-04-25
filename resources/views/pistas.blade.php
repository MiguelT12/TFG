<x-app-layout>
    @php
        $horas = [
            '10:00','11:00','12:00','13:00',
            '14:00','15:00','16:00','17:00',
            '18:00','19:00','20:00'
        ];
    @endphp

    <div class="contenedor-pistas">

        <h1 class="titulo-pistas">Reservar pistas</h1>

        <div class="grid-pistas">

            @foreach($pistas as $pista)
                <div class="tarjeta-pista">

                    <h2 class="nombre-pista">{{ $pista->nombre }}</h2>

                    <form action="{{ route('pistas.reservar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pista_id" value="{{ $pista->id }}">

                        <input type="date"
                               name="fecha"
                               min="{{ date('Y-m-d') }}"
                               required
                               class="input-pista fecha-input">

                        <div class="grid-horas">
                            @foreach($horas as $hora)
                                <label class="hora-btn">
                                    <input type="radio"
                                           name="hora_inicio"
                                           value="{{ $hora }}"
                                           hidden
                                           disabled
                                           required>
                                    <span>{{ $hora }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="selector-duracion">
                            <label class="opcion-duracion activa">
                                <input type="radio" name="duracion" value="1" checked hidden disabled>
                                1h
                            </label>

                            <label class="opcion-duracion">
                                <input type="radio" name="duracion" value="2" hidden disabled>
                                2h
                            </label>
                        </div>

                        <button type="submit" class="btn-reservar">
                            Reservar
                        </button>
                    </form>

                </div>
            @endforeach

        </div>

        @if(session('error'))
            <div class="reserva-item alerta-error">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="reserva-item alerta-exito">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script>
        const reservas = @json($reservas);
    </script>

    <script>
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
    </script>

</x-app-layout>