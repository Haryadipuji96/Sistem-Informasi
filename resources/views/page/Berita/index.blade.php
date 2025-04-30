<x-app-layout>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Berita Terkini</h1>

    @foreach($berita as $item)
        <div class="mb-6 border-b pb-4">
            <h2 class="text-xl font-semibold">
                <a href="{{ route('berita.show', $item->slug) }}" class="text-blue-600 hover:underline">
                    {{ $item->title }}
                </a>                
            </h2>
            <p class="text-gray-600 mt-2">
                {{ \Illuminate\Support\Str::limit($item->content, 150) }}
            </p>
        </div>
    @endforeach
</div>
</x-app-layout>
