<x-app-layout>
    <div class="contenedor-cuenta">
        <h1 class="titulo-cuenta">
            MI PERFIL
        </h1>

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
                    <span class="etiqueta-dato">Correo Electrónico:</span>
                    <span class="valor-dato">{{ Auth::user()->email }}</span>
                </div>

                <div class="grupo-dato">
                    <span class="etiqueta-dato">Fecha de Registro:</span>
                    <span class="valor-dato">{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="grupo-dato">
                    <span class="etiqueta-dato">Tarifa Actual:</span>
                    <span class="valor-dato tarifa-destacada">
                        @if(Auth::user()->cuota)
                            {{ Auth::user()->cuota->nombre }}
                        @else
                            Ninguna tarifa contratada
                        @endif
                    </span>
                </div>
            </div>

            <div class="pie-perfil">
                <button class="btn-editar-perfil">Editar Datos</button>
            </div>
        </div>
    </div>
</x-app-layout>