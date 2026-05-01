document.addEventListener('DOMContentLoaded', function() {
    // Modal Actividad
    const modalActividad = document.getElementById('modal-actividad');
    const btnAbrirActividad = document.getElementById('btn-abrir-actividad');
    const btnCerrarActividad = document.getElementById('btn-cerrar-actividad');

    if (btnAbrirActividad && modalActividad) {
        btnAbrirActividad.addEventListener('click', function() {
            modalActividad.style.display = 'flex';
        });
    }

    if (btnCerrarActividad && modalActividad) {
        btnCerrarActividad.addEventListener('click', function() {
            modalActividad.style.display = 'none';
        });
    }

    // Modal Clase
    const modalClase = document.getElementById('modal-clase');
    const btnAbrirClase = document.getElementById('btn-abrir-clase');
    const btnCerrarClase = document.getElementById('btn-cerrar-clase');

    if (btnAbrirClase && modalClase) {
        btnAbrirClase.addEventListener('click', function() {
            modalClase.style.display = 'flex';
        });
    }

    if (btnCerrarClase && modalClase) {
        btnCerrarClase.addEventListener('click', function() {
            modalClase.style.display = 'none';
        });
    }
});