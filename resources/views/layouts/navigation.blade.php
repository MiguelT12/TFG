<nav x-data="{ open: false }" class="nav-imperial border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-sw">
                        Inicio
                    </x-nav-link>
                    
                    <x-nav-link :href="route('actividades')" :active="request()->routeIs('actividades')" class="nav-link-sw">
                        Calendario y Clases
                    </x-nav-link>
                    
                    <x-nav-link href="#" :active="false" class="nav-link-sw">
                        Reserva de Pistas
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
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

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md nav-text-sw hover:text-yellow-300 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black border-t border-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="responsive-link-sw">
                Inicio
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('actividades')" :active="request()->routeIs('actividades')" class="responsive-link-sw">
                Calendario y Clases
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="#" :active="false" class="responsive-link-sw">
                Reserva de Pistas
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-800">
            <div class="px-4">
                <div class="font-medium text-base nav-text-sw" style="color: #cbd5e1;">{{ Auth::user()->name }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="#" class="responsive-link-sw">
                    Cuenta
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="responsive-link-sw" style="color: #ef4444;">
                        Cerrar sesión
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>