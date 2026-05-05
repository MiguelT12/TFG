$(document).ready(function() {
    let enlaceTarifaActual = null;

    $('.require-confirmacion').on('click', function(e) {
        e.preventDefault(); 
        enlaceTarifaActual = $(this).attr('href');
        
        $('#modal-confirmacion-tarifa').removeClass('modal-oculto').addClass('modal-activo'); 
    });

    $('#btn-cancelar-tarifa').on('click', function() {
        enlaceTarifaActual = null;
        $('#modal-confirmacion-tarifa').removeClass('modal-activo').addClass('modal-oculto'); 
    });

    $('#btn-confirmar-tarifa').on('click', function() {
        if (enlaceTarifaActual) {
            window.location.href = enlaceTarifaActual; 
        }
    });
});