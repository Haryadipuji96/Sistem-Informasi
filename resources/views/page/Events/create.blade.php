<x-app-layout>
    <div class="max-w-3xl mx-auto mt-12 px-6 py-10 bg-white shadow-xl rounded-2xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center flex items-center justify-center gap-2">
            📅 Tambah Event Desa
        </h1>

        <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Judul Event --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Event</label>
                <input type="text" name="title" id="title" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm"
                    value="{{ old('title') }}" placeholder="Contoh: Lomba Futsal Antar RT">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">⚠️ {{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm"
                    placeholder="Tuliskan detail event seperti lokasi, waktu mulai, dan ketentuan lomba...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">⚠️ {{ $message }}</p>
                @enderror
            </div>

            {{-- Tanggal Event --}}
            <div>
                <label for="event_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Event</label>
                <input type="date" name="event_date" id="event_date" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500 shadow-sm"
                    value="{{ old('event_date') }}">
                @error('event_date')
                    <p class="text-red-500 text-sm mt-1">⚠️ {{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Submit --}}
            <div class="text-right">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition duration-200">
                    💾 Simpan Event
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
