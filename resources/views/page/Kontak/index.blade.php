<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kontak') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Kontak Desa Indrajaya</h1>

        <!-- Informasi Kontak -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Informasi Kontak</h2>
                <ul class="space-y-2">
                    <li><i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>Alamat: Jl. Raya Indrajaya No. 123,
                        Kabupaten Indrajaya</li>
                    <li><i class="fas fa-phone-alt text-blue-500 mr-2"></i>Telepon: (021) 123-4567</li>
                    <li><i class="fas fa-envelope text-blue-500 mr-2"></i>Email: info@desaindrajaya.com</li>
                </ul>
            </div>

            <!-- Formulir Hubungi Kami -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Hubungi Kami</h2>
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                        <textarea name="message" id="message" rows="4"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
