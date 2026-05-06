<nav class="nav-imperial border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <span data-i18n="navbar.inicio">Inicio</span>
                </x-nav-link>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('clases-actividades')" :active="request()->routeIs('clases-actividades')">
                            <span data-i18n="navbar.gestion_clases">Gestión de clases</span>
                        </x-nav-link>

                        <x-nav-link :href="route('admin.pistas')" :active="request()->routeIs('admin.pistas*')">
                            <span data-i18n="navbar.gestion_pistas">Gestión de Pistas</span>
                        </x-nav-link>

                        <x-nav-link :href="route('admin.reservas.pistas')" :active="request()->routeIs('admin.reservas.pistas')">
                            <span data-i18n="navbar.reservas_pistas">Reservas Pistas</span>
                        </x-nav-link>
                    @elseif(auth()->user()->role === 'monitor')
                        <x-nav-link :href="route('monitor.calendario')" :active="request()->routeIs('monitor.calendario')">
                            <span data-i18n="navbar.mi_calendario">Mi Calendario</span>
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('planes.todos')" :active="request()->routeIs('planes.todos')">
                            <span data-i18n="navbar.nuestras_tarifas">Nuestras Tarifas</span>
                        </x-nav-link>

                        <x-nav-link :href="route('actividades')" :active="request()->routeIs('actividades')">
                            <span data-i18n="navbar.actividades_clases">Actividades y Clases</span>
                        </x-nav-link>

                        <x-nav-link :href="route('reservas')" :active="request()->routeIs('reservas')">
                            <span data-i18n="navbar.mis_reservas">Mis Reservas</span>
                        </x-nav-link>

                        <x-nav-link :href="route('calendario')" :active="request()->routeIs('calendario')">
                            <span data-i18n="navbar.calendario">Calendario</span>
                        </x-nav-link>

                        <x-nav-link :href="route('pistas.index')" :active="request()->routeIs('pistas.*')">
                            <span data-i18n="navbar.pistas">Pistas</span>
                        </x-nav-link>
                    @endif
                @else
                    <x-nav-link :href="route('planes.todos')" :active="request()->routeIs('planes.todos')">
                        <span data-i18n="navbar.nuestras_tarifas">Nuestras Tarifas</span>
                    </x-nav-link>
                @endauth
            </div>

            <div class="flex items-center">
                <select onchange="window.location.href=this.value" class="select-idioma">
                    <option value="{{ route('lang.switch', 'es') }}" {{ app()->getLocale() === 'es' ? 'selected' : '' }}>🇪🇸 Español</option>
                    <option value="{{ route('lang.switch', 'en') }}" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>🇬🇧 English</option>
                </select>
                @auth
                    <div class="menu-usuario-nav">
                        <button class="boton-nombre">
                            {{ Auth::user()->name }} <span>▼</span>
                        </button>

                        <div class="desplegable-contenido">
                            @if(auth()->user()->role !== 'admin' && auth()->user()->role !== 'monitor')
                                <a href="{{ route('cuenta') }}" class="item-desplegable" data-i18n="navbar.cuenta">
                                    Cuenta
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="item-desplegable texto-rojo" data-i18n="navbar.cerrar_sesion">
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
                
                @guest
                    <div class="contenedor-auth">
                        <a href="{{ route('login') }}" class="btn-login" data-i18n="navbar.iniciar_sesion">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="btn-registro" data-i18n="navbar.crear_cuenta">Crear cuenta</a>
                    </div>
                @endguest
            </div>

        </div>
    </div>
</nav>