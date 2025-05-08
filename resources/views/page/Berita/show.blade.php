<x-app-layout>
    <div class="bg-white shadow-md rounded-xl overflow-hidden max-w-4xl mx-auto my-10 p-6">
        {{-- Judul Berita --}}
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2 leading-tight">
            {{ $berita->title }}
        </h1>

        {{-- Tanggal Publikasi --}}
        @if ($berita->created_at)
            <p class="text-sm text-gray-500 mb-6 flex items-center gap-1">
                <span>🗓️</span> Dipublikasikan pada {{ $berita->created_at->format('d F Y') }}
            </p>
        @endif

        {{-- Gambar Berita --}}
        @if ($berita->image)
            <div class="mb-6">
                <img src="{{ asset('image/' . $berita->image) }}" alt="Gambar Berita"
                    class="w-full max-h-[400px] object-cover rounded-lg shadow-md">
            </div>
        @endif

        {{-- Isi Berita --}}
        <div class="prose prose-lg prose-slate max-w-none text-gray-800 leading-relaxed">
            {!! nl2br(e($berita->content)) !!}
        </div>
    </div>
</x-app-layout>
