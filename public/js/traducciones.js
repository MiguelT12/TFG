document.addEventListener('DOMContentLoaded', () => {
    let textos = {};

    window.t = function(ruta) {
        return ruta.split('.').reduce((obj, i) => obj && obj[i], textos) || ruta;
    };

    async function cargarTraducciones() {
        // Obtenemos el idioma directamente de la etiqueta <html> que Laravel genera
        let idioma = document.documentElement.lang.split('-')[0] || 'es';
        
        // Validación de seguridad
        if (!['es', 'en'].includes(idioma)) {
            idioma = 'es';
        }

        try {
            const respuesta = await fetch(window.location.origin + `/lang/${idioma}.json`);
            if (!respuesta.ok) {
                throw new Error('No se pudo cargar el archivo JSON');
            }
            textos = await respuesta.json();
            traducirDOM();
        } catch (error) {
            console.error("Error cargando traducciones:", error);
        }
    }

    function traducirDOM() {
        document.querySelectorAll('[data-i18n]').forEach(elemento => {
            const rutaTraduccion = elemento.getAttribute('data-i18n');
            const textoTraducido = window.t(rutaTraduccion);
            if (textoTraducido !== rutaTraduccion) {
                elemento.innerText = textoTraducido;
            }
        });

        document.querySelectorAll('[data-i18n-placeholder]').forEach(elemento => {
            const rutaTraduccion = elemento.getAttribute('data-i18n-placeholder');
            const textoTraducido = window.t(rutaTraduccion);
            if (textoTraducido !== rutaTraduccion) {
                elemento.placeholder = textoTraducido;
            }
        });
    }

    cargarTraducciones();

    // Lógica del selector de idioma
    const selectorIdioma = document.getElementById('selector-idioma');
    if (selectorIdioma) {
        // Seleccionamos la opción correcta mirando en el HTML
        selectorIdioma.value = document.documentElement.lang.split('-')[0] || 'es';
        
        selectorIdioma.addEventListener('change', function () {
            const nuevoIdioma = this.value;

            // Actualizamos el idioma en la URL
            fetch('/lang/' + nuevoIdioma)
                .then(() => {
                    // Una vez que Laravel ha guardado el idioma, simplemente recargamos la página actual
                    window.location.reload(); 
                })
                .catch(error => console.error("Error al cambiar de idioma", error));
        });
    }
});