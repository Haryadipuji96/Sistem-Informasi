<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">📰 Berita Terkini</h1>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($berita as $b)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 hover:underline mb-2">
                            <a href="{{ route('berita.show', $b->id) }}">
                                {{ $b->title }}
                            </a>
                        </h2>
                        <p class="text-gray-700 text-sm">
                            {{ \Illuminate\Support\Str::limit(strip_tags($b->content), 120) }}
                        </p>
                    </div>
                    <div class="px-6 pb-4 text-sm text-gray-500">
                        <span>Dibuat: {{ $b->created_at ? $b->created_at->format('d M Y') : 'Tanggal tidak tersedia' }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        @if($berita->isEmpty())
            <div class="text-center text-gray-500 mt-12">
                <p>Tidak ada berita untuk ditampilkan.</p>
            </div>
        @endif
    </div>
</x-app-layout>
