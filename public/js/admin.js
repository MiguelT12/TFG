document.addEventListener('DOMContentLoaded', function() {
    // Lógica Modales Actividad y Clase (Igual que ya tenías)
    const modalActividad = document.getElementById('modal-actividad');
    const btnAbrirActividad = document.getElementById('btn-abrir-actividad');
    const btnCerrarActividad = document.getElementById('btn-cerrar-actividad');

    if (btnAbrirActividad && modalActividad) {
        btnAbrirActividad.addEventListener('click', () => modalActividad.style.display = 'flex');
    }
    if (btnCerrarActividad && modalActividad) {
        btnCerrarActividad.addEventListener('click', () => modalActividad.style.display = 'none');
    }

    const modalClase = document.getElementById('modal-clase');
    const btnAbrirClase = document.getElementById('btn-abrir-clase');
    const btnCerrarClase = document.getElementById('btn-cerrar-clase');

    if (btnAbrirClase && modalClase) {
        btnAbrirClase.addEventListener('click', () => modalClase.style.display = 'flex');
    }
    if (btnCerrarClase && modalClase) {
        btnCerrarClase.addEventListener('click', () => modalClase.style.display = 'none');
    }

    // NUEVO: Lógica Modal de Eliminación Personalizado
    const modalEliminar = document.getElementById('modal-confirmar-eliminar');
    const btnCerrarEliminar = document.getElementById('btn-cerrar-eliminar');
    const formDeleteConfirm = document.getElementById('form-delete-confirm');
    const botonesEliminar = document.querySelectorAll('.btn-abrir-eliminar');

    // Al hacer clic en cualquier botón "Eliminar" (clase o actividad)
    botonesEliminar.forEach(btn => {
        btn.addEventListener('click', function() {
            // Cogemos la ruta del controlador que guardamos en data-action=""
            const urlAccion = this.getAttribute('data-action');
            // Se la ponemos al formulario del modal
            formDeleteConfirm.setAttribute('action', urlAccion);
            // Mostramos el modal
            modalEliminar.style.display = 'flex';
        });
    });

    // Cerrar el modal de eliminar
    if (btnCerrarEliminar && modalEliminar) {
        btnCerrarEliminar.addEventListener('click', () => {
            modalEliminar.style.display = 'none';
        });
    }
});