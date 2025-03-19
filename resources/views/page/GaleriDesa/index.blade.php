<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Galeri Desa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <!-- Judul Galeri -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800">Galeri Desa</h1>
                <p class="mt-2 text-lg text-gray-600">Kumpulan momen indah dari kehidupan desa kami.</p>
            </div>

            <!-- Grid Galeri -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 justify-items-center">
                <!-- Item Gambar 1 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar1.jpg') }}" alt="Gambar Desa 1" class="w-full h-48 object-cover" >
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 1</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 2 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar2.jpg') }}" alt="Gambar Desa 2" class="w-full h-48 object-cover" >
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 2</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 3 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar3.jpg') }}" alt="Gambar Desa 3" class="w-full h-48 object-cover" >
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 3</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 4 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar4.jpg') }}"alt="Gambar Desa 4" class="w-full h-48 object-cover" >
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 4</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Tambahkan lebih banyak item jika diperlukan -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar5.jpg') }}" alt="Gambar Desa 5" class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000" >
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 1</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 5 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar6.jpg') }}" alt="Gambar Desa 6" class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000" >
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 2</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 6 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar7.jpg') }}" alt="Gambar Desa 7" class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000" >
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 3</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 7 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar8.jpg') }}" alt="Gambar Desa 8" class="w-full h-48 object-cover"  data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 4</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                {{-- Item Gambar 8 --}}
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar9.jpg') }}" alt="Gambar Desa 9" class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 1</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 9 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar10.jpg') }}" alt="Gambar Desa 10"
                        class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 2</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 10 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar11.jpg') }}" alt="Gambar Desa 11"
                        class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 3</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 11 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar12.jpg') }}" alt="Gambar Desa 12"
                        class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 4</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                {{-- Item Gambar 12 --}}
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar13.jpg') }}" alt="Gambar Desa 13"
                        class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 1</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 13 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar14.jpg') }}" alt="Gambar Desa 14"
                        class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 2</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 14 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar15.jpg') }}" alt="Gambar Desa 15"
                        class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 3</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>

                <!-- Item Gambar 15 -->
                <div class="w-full max-w-sm overflow-hidden rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('image/Gambar16.jpg') }}" alt="Gambar Desa 16"
                        class="w-full h-48 object-cover" data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Judul Gambar 4</h3>
                        <p class="mt-2 text-sm text-gray-600">Deskripsi singkat tentang gambar ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
