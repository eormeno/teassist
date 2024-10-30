<nav x-data="{ open: false }" class="bg-white border-b-4 border-[#0075B2] shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="shrink-0 flex items-center">
                    <img src="{{ asset('images/logoTea.png') }}" class="block h-14 w-auto" alt="Logo" />
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-8 sm:ms-10 items-center">
                    @foreach ([
                        ['route' => 'dashboard', 'label' => 'Inicio'],
                        ['route' => 'roles.index', 'label' => 'Roles'],
                        ['route' => 'users.index', 'label' => 'Usuarios'],
                        ['route' => 'patients.index', 'label' => 'Pacientes'],
                        ['route' => 'activities.index', 'label' => 'Actividades'],
                        ['route' => 'patient-activities.index', 'label' => 'Actividades de Pacientes']
                    ] as $link)
                        <x-nav-link
                            :href="route($link['route'])"
                            :active="request()->routeIs($link['route'])"
                            class="nav-link {{ request()->routeIs($link['route']) ? 'active' : '' }}">
                            {{ __($link['label']) }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none transition">
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button type="button" class="inline-flex items-center px-4 py-4 text-lg font-semibold rounded-md text-[#0075B2] hover:text-[#D6D58E] hover:bg-gray-100 focus:outline-none transition duration-300 ease-in-out">
                                    {{ Auth::user()->name }}
                                    <svg class="ms-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <div class="bg-white text-gray-800">
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    {{ __('Perfil') }}
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger (Mobile Menu) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-[#0075B2] hover:text-[#D6D58E] hover:bg-gray-100 focus:outline-none transition duration-300 ease-in-out">
                    <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden bg-white">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ([
                ['route' => 'dashboard', 'label' => 'Inicio'],
                ['route' => 'activities.index', 'label' => 'Actividades']
            ] as $link)
                <x-responsive-nav-link
                    :href="route($link['route'])"
                    :active="request()->routeIs($link['route'])"
                    class="text-[#0075B2] hover:text-[#D6D58E] hover:bg-gray-100 px-6 py-4 rounded-md block text-lg font-semibold">
                    {{ __($link['label']) }}
                </x-responsive-nav-link>
            @endforeach
        </div>
        <div class="border-t border-gray-200 bg-white">
            <!-- Additional content for mobile dropdown -->
        </div>
    </div>
</nav>
