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
// funcion que abre el modal y configura la accion del formulario
function abrirModal(claseId, usuarioId, nombre) {

    let modal = document.getElementById('modalEliminar');
    let form = document.getElementById('formEliminar');
    let texto = document.getElementById('textoModal');

    // construimos la ruta dinamica para eliminar
    form.action = `/monitor/clase/${claseId}/usuario/${usuarioId}`;

    // mensaje personalizado con el nombre del alumno
    texto.innerText = `¿Eliminar a ${nombre} de la clase?`;

    // mostramos el modal
    modal.style.display = 'flex';
}

// funcion para cerrar el modal
function cerrarModal() {
    document.getElementById('modalEliminar').style.display = 'none';
}