<x-app-layout>
    <div class="contenedor-cuenta">
        <h1 class="titulo-pagina" data-i18n="cuenta.titulo">MI PERFIL</h1>

        <div class="tarjeta-perfil">
            <div class="cabecera-perfil">
                <div class="avatar-usuario">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="info-principal-perfil">
                    <h2 class="nombre-perfil">{{ Auth::user()->name }} {{ Auth::user()->apellido1 }}</h2>
                    <p class="rol-perfil">{{ strtoupper(Auth::user()->role) }}</p>
                </div>
            </div>

            <div class="cuerpo-perfil">
                <div class="grupo-dato">
                    <span class="etiqueta-dato" data-i18n="cuenta.correo">Correo Electrónico:</span>
                    <span class="valor-dato">{{ Auth::user()->email }}</span>
                </div>

                <div class="grupo-dato">
                    <span class="etiqueta-dato" data-i18n="cuenta.fecha_registro">Fecha de Registro:</span>
                    <span class="valor-dato">{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="grupo-dato">
                    <span class="etiqueta-dato" data-i18n="cuenta.tarifa_actual">Tarifa Actual:</span>
                    <span class="valor-dato tarifa-destacada">
                        @if(Auth::user()->id_cuota && Auth::user()->cuota)
                            {{ Auth::user()->cuota->nombre }}
                        @else
                            <span data-i18n="cuenta.sin_tarifa">Ninguna tarifa contratada</span>
                        @endif
                    </span>
                </div>
            </div>

            <div class="pie-perfil">
                <a href="{{ route('profile.edit') }}" class="btn-editar-perfil" style="display: inline-block; text-align: center; text-decoration: none;" data-i18n="cuenta.editar_datos">
                    Editar Datos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>