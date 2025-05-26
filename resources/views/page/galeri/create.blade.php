<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Foto Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Judul Foto</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('judul')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Upload Gambar</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*" required
                        class="w-full">
                    @error('gambar')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
