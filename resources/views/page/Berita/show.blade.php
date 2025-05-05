
<x-app-layout>
    <div class="bg-white shadow p-6 rounded-lg">
        <h1 class="text-2xl font-bold mb-4">{{ $berita->title }}</h1>
        {{-- <p class="text-gray-500 text-sm mb-4">{{ $berita->created_at->format('d F Y') }}</p> --}}
        <div class="prose max-w-none">
            {!! nl2br(e($berita->content)) !!}
        </div>
    </div>
    </x-app-layout>
    
