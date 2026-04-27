document.addEventListener('DOMContentLoaded', function () {
    const botonesConfirmacion = document.querySelectorAll('.require-confirmacion');

    botonesConfirmacion.forEach(function (boton) {
        boton.addEventListener('click', function (event) {
            const confirmacion = confirm('Ya tienes una tarifa contratada. ¿Quieres contratar otra y sustituir la actual?');
            
            if (!confirmacion) {
                event.preventDefault();
            }
        });
    });
});