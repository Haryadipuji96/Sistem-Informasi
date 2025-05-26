<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Galeri Desa') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

        @can('role-A')
        {{-- Tombol Tambah Galeri --}}
        <div class="mb-6 text-end">
            <a href="{{ route('galeri.create') }}"
                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded shadow inline-block">
                Tambah Galeri
            </a>
        </div>
        @endcan

        {{-- Judul dan Deskripsi --}}
        <div class="text-center mb-10" data-aos="fade-up">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-100">
                Galeri Desa
            </h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2 text-base sm:text-lg">
                Kumpulan momen indah dari kehidupan desa Indrajaya
            </p>
        </div>

        {{-- Galeri Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($galeris as $index => $galeri)
                <div class="bg-white rounded-lg shadow-md overflow-hidden relative" data-aos="zoom-in-up"
                    data-aos-duration="1500" data-aos-delay="{{ 200 * $index }}">
                    
                    {{-- Gambar --}}
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}"
                        class="w-full h-40 sm:h-48 object-cover transition-transform duration-300 hover:scale-105" />

                    {{-- Konten --}}
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                            {{ $galeri->judul }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ $galeri->deskripsi }}
                        </p>

                        @can("role-A")
                        {{-- Tombol Hapus --}}
                        <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" class="mt-4"
                              onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded shadow">
                                Hapus
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
