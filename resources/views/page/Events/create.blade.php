<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Event</h1>

        <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Judul Event -->
            <div>
                <label for="title" class="block font-medium text-gray-700">Judul Event</label>
                <input type="text" name="title" id="title"
                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="6"
                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Event -->
            <div>
                <label for="event_date" class="block font-medium text-gray-700">Tanggal Event</label>
                <input type="date" name="event_date" id="event_date"
                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                    value="{{ old('event_date') }}" required>
                @error('event_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button Submit -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-200">
                    Simpan Event
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
