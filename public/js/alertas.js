$(document).ready(function() {
    let formularioActual = null;

    $('.formulario-eliminar').on('submit', function(e) {
        e.preventDefault(); 
        formularioActual = this; 
        
        $('#modal-confirmacion').removeClass('modal-oculto').addClass('modal-activo'); 
    });

    $('#btn-cancelar').on('click', function() {
        formularioActual = null;
        $('#modal-confirmacion').removeClass('modal-activo').addClass('modal-oculto'); 
    });

    $('#btn-confirmar').on('click', function() {
        if (formularioActual) {
            formularioActual.submit(); 
        }
    });
});