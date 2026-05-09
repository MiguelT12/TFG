<script>
    const idiomaLaravel = "{{ session('idioma', app()->getLocale()) }}";
    localStorage.setItem('idioma', idiomaLaravel);
    window.idiomaApp = idiomaLaravel;
    window.baseUrl = "{{ url('/') }}";
</script>
<script src="{{ asset('js/traducciones.js') }}?v={{ time() }}"></script>