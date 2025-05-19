<nav x-data="{ open: false }" class="bg-orange-500 border-b border-gray-200">
    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left Side -->
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto text-white" />
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex sm:items-center sm:space-x-8 ms-10">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <!-- Pemerintahan Dropdown -->
                    <x-dropdown align="left">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white">
                                Pemerintahan
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @cannot('role-A')
                                <x-dropdown-link :href="route('ProfileKepalaDesa.index')">Profile Kepala Desa</x-dropdown-link>
                                <x-dropdown-link :href="route('VisiMisi.index')">Visi Misi</x-dropdown-link>
                            @endcannot
                            @can('role-A')
                                <x-dropdown-link :href="route('DataPegawai.index')">Data Pegawai</x-dropdown-link>
                                <x-dropdown-link :href="route('Penduduk.index')">Data Penduduk</x-dropdown-link>
                                <x-dropdown-link :href="route('apbdes.index')">APBDES</x-dropdown-link>
                            @endcan
                        </x-slot>
                    </x-dropdown>

                    <!-- Fitur Utama Dropdown -->
                    <x-dropdown align="left">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-white">
                                Fitur Utama
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('TentangDesa.index')">Tentang Desa</x-dropdown-link>

                            <x-dropdown-link :href="route('berita.index')">Berita Desa</x-dropdown-link>
                            <x-dropdown-link :href="route('events.index')">Event</x-dropdown-link>
                            @can('role-A')
                                <x-dropdown-link :href="route('Umkm.index')">UMKM</x-dropdown-link>
                                <x-dropdown-link :href="route('agendas.index')">Agenda Desa</x-dropdown-link>
                            @endcan
                            <x-dropdown-link :href="route('GaleriDesa.index')">Galeri Desa</x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <x-nav-link :href="route('laporan.index')" class="text-white">
                        {{ __('LAPORAN') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side (User) -->
            @can('role-A')
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-white">
                                {{ Auth::user()->name }}
                                <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endcan

            <!-- Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="p-2 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-white">
                    <svg :class="{ 'hidden': open, 'block': !open }" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg :class="{ 'hidden': !open, 'block': open }" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-orange-400">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('ProfileKepalaDesa.index')">Profile Kepala Desa</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('DataPegawai.index')">Data Pegawai</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('Penduduk.index')">Data Penduduk</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('apbdes.index')">APBDES</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('VisiMisi.index')">Visi Misi</x-responsive-nav-link>

            <x-responsive-nav-link :href="route('TentangDesa.index')">Tentang Desa</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('berita.index')">Berita Desa</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('events.index')">Event</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('Umkm.index')">UMKM</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('agendas.index')">Agenda Desa</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('GaleriDesa.index')">Galeri Desa</x-responsive-nav-link>

            <x-responsive-nav-link :href="route('laporan.index')">Laporan</x-responsive-nav-link>
        </div>

        <!-- Mobile User -->
        @can('role-A')
            <div class="pt-4 pb-1 border-t border-white">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profile
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endcan
    </div>
</nav>
