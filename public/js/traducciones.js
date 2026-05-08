document.addEventListener('DOMContentLoaded', () => {
    let textos = {};

    async function cargarTraducciones() {
        const idioma = localStorage.getItem('idioma') || window.idiomaApp || 'es'; 
        
        try {
            const respuesta = await fetch(window.location.origin + `/lang/${idioma}.json`);
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

        document.querySelectorAll('[data-i18n-placeholder]').forEach(elemento => {
            const rutaTraduccion = elemento.getAttribute('data-i18n-placeholder');
            const textoTraducido = t(rutaTraduccion);
            
            if (textoTraducido) {
                elemento.placeholder = textoTraducido;
            }
        });
    }

    cargarTraducciones();
});