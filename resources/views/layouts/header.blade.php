<nav class="nav-imperial border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex">
                <div class="space-x-8 sm:-my-px sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-sw">
                        Inicio
                    </x-nav-link>
                    
                    <x-nav-link :href="route('planes.todos')" :active="request()->routeIs('planes.todos')" class="nav-link-sw">
                        Planes
                    </x-nav-link>

                    <x-nav-link :href="route('actividades')" :active="request()->routeIs('actividades')" class="nav-link-sw">
                        Calendario y Clases
                    </x-nav-link>
                    
                    <x-nav-link href="#" :active="false" class="nav-link-sw">
                        Reserva de Pistas
                    </x-nav-link>
                </div>
            </div>

            <div class="flex items-center">
                <div class="menu-usuario-nav">
                    <button class="boton-nombre">
                        {{ Auth::user()->name }} <span>▼</span>
                    </button>

                    <div class="desplegable-contenido">
                        <a href="#" class="item-desplegable">Cuenta</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="item-desplegable texto-rojo">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>