<x-app-layout>
    <div class="contenedor-admin contenedor-centrado-form">
        <div class="tarjeta-admin seccion-destacados">
            <h2 class="subtitulo-seccion">Añadir Actividad</h2>
            
            <form method="post" action="{{ route('admin.actividades.store') }}">
                @csrf
                
                <div class="form-group-lg">
                    <x-input-label for="nombre" value="Nombre" class="text-white" />
                    <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full text-black" required />
                </div>
                
                <div class="form-group-lg">
                    <x-input-label for="descripcion" value="Descripción" class="text-white" />
                    <textarea name="descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-black textarea-estilizado" rows="4" required></textarea>
                </div>
                
                <div class="flex justify-end gap-4 mt-6">
                    <a href="{{ route('clases-actividades') }}" class="btn-cancelar btn-enlace-accion">Cancelar</a>
                    <button type="submit" class="btn-admin btn-verde">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>