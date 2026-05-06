document.addEventListener('DOMContentLoaded', () => {
    let textos = {};

    async function cargarTraducciones() {
        // Coge el idioma de Laravel, si no existe usa 'es' por defecto
        const idioma = window.idiomaApp || 'es'; 
        
        try {
            const respuesta = await fetch(`/lang/${idioma}.json`);
            if (!respuesta.ok) throw new Error('No se pudo cargar el archivo JSON');
            
            textos = await respuesta.json();
            traducirDOM();
        } catch (error) {
            console.error("Error cargando traducciones:", error);
        }
    }

    function t(ruta) {
        return ruta.split('.').reduce((obj, i) => obj && obj[i], textos) || null;
    }

    function traducirDOM() {
        document.querySelectorAll('[data-i18n]').forEach(elemento => {
            const rutaTraduccion = elemento.getAttribute('data-i18n');
            const textoTraducido = t(rutaTraduccion);
            
            if (textoTraducido) {
                elemento.innerText = textoTraducido;
            }
        });
    }

    cargarTraducciones();
});