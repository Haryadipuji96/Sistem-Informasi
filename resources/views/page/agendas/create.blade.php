<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Tambah Agenda Baru</h1>

        <form action="{{ route('agendas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Agenda</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="event_date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="event_date" id="event_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>

            <button type="submit" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
