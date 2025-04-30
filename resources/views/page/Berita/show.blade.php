<x-app-layout>
<div class="container mx-auto p-4">
    <div class="mb-4">
        <a href="{{ route('berita.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Berita</a>
    </div>

    <h1 class="text-3xl font-bold mb-4">{{ $berita->title }}</h1>

    <div class="text-gray-700 leading-relaxed">
        {!! nl2br(e($berita->content)) !!}
    </div>
</div>
</x-app-layout>
