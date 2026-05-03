document.addEventListener('DOMContentLoaded', function () {

    const buscador = document.getElementById('buscador');

    buscador.addEventListener('keyup', function () {

        let texto = this.value.toLowerCase();
        let filas = document.querySelectorAll('.tabla-fila');

        filas.forEach(fila => {

            let contenido = fila.innerText.toLowerCase();

            if (contenido.includes(texto)) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }

        });

    });

});