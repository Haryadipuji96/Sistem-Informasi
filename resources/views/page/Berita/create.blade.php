<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Berita Baru</h1>

    <form action="{{ route('berita.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Judul</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Isi Berita</label>
            <textarea name="content" class="w-full border rounded p-2" rows="6" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
</x-app-layout>
