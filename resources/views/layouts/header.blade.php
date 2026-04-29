<nav class="nav-imperial border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>

                @if(auth()->user()->role === 'admin')
                    <x-nav-link :href="url('admin/clases-actividades')" :active="request()->is('admin/clases-actividades*')">
                        Gestión de clases
                    </x-nav-link>

                    <x-nav-link :href="url('admin/gestion-pistas')" :active="request()->is('admin/pistas*')">
                        Gestión de Pistas
                    </x-nav-link>

                @elseif(auth()->user()->role === 'monitor')
                    <x-nav-link href="#">
                        Mi Calendario
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('planes.todos')" :active="request()->routeIs('planes.todos')">
                        Nuestras Tarifas
                    </x-nav-link>

                    <x-nav-link :href="route('actividades')" :active="request()->routeIs('actividades')">
                        Actividades y Clases
                    </x-nav-link>

                    <x-nav-link :href="route('reservas')" :active="request()->routeIs('reservas')">
                        Mis Reservas
                    </x-nav-link>

                    <x-nav-link :href="route('calendario')" :active="request()->routeIs('calendario')">
                        Calendario
                    </x-nav-link>

                    <x-nav-link :href="route('pistas.index')" :active="request()->routeIs('pistas.*')">
                        Pistas
                    </x-nav-link>
                @endif
            </div>

            <div class="flex items-center">
                <div class="menu-usuario-nav">
                    <button class="boton-nombre">
                        {{ Auth::user()->name }} <span>▼</span>
                    </button>

                    <div class="desplegable-contenido">
                        @if(auth()->user()->role !== 'admin' && auth()->user()->role !== 'monitor')
                            <a href="{{ route('cuenta') }}" class="item-desplegable">
                                Cuenta
                            </a>
                        @endif

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