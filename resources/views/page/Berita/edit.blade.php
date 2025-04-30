<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Berita</h1>

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title', $berita->title) }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Isi Berita</label>
            <textarea name="content" class="w-full border rounded p-2" rows="6" required>{{ old('content', $berita->content) }}</textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
    </form>
</div>
</x-app-layout>
