<x-app-layout>
    <div class="contenedor-cuenta">
        <h1 class="titulo-pagina">
            EDITAR PERFIL
        </h1>

        <div style="display: flex; flex-direction: column; gap: 20px;">
            <div class="tarjeta-perfil" style="padding: 20px; background: rgba(255,255,255,0.05); border-radius: 10px;">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="tarjeta-perfil" style="padding: 20px; background: rgba(255,255,255,0.05); border-radius: 10px;">
                @include('profile.partials.update-password-form')
            </div>

            <div class="tarjeta-perfil" style="padding: 20px; background: rgba(255,255,255,0.05); border-radius: 10px;">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>