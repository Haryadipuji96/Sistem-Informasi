<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">📰 Berita Terkini</h1>

        {{-- Form Tambah Berita (khusus Admin) --}}
        @can('role-A')
            <div class="bg-white rounded-lg shadow-md p-6 mb-10">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">📝 Tambah Berita Baru</h2>
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                            <input type="text" name="title" required
                                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Gambar (opsional)</label>
                            <input type="file" name="image"
                                   class="w-full border border-gray-300 rounded-md px-3 py-2" />
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konten</label>
                        <textarea name="content" rows="5" required
                                  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200"></textarea>
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-sm">
                            <i class="bi bi-plus-circle"></i> Tambah Berita
                        </button>
                    </div>
                </form>
            </div>
        @endcan

        {{-- Daftar Berita --}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($berita as $b)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    @if ($b->image)
                        <img src="{{ asset('image/' . $b->image) }}" alt="Gambar Berita"
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <h2 class="text-xl font-semibold text-gray-800 hover:underline mb-2">
                            <a href="{{ route('berita.show', $b->id) }}">
                                {{ $b->title }}
                            </a>
                        </h2>
                        <p class="text-gray-700 text-sm mb-3">
                            {{ \Illuminate\Support\Str::limit(strip_tags($b->content), 120) }}
                        </p>
                        <p class="text-sm text-gray-500">
                            📅 {{ $b->created_at ? $b->created_at->format('d M Y') : 'Tanggal tidak tersedia' }}
                        </p>

                        {{-- Tombol Aksi --}}
                        @can('role-A')
                            <div class="flex mt-4 gap-2">
                                <a href="{{ route('berita.edit', $b->id) }}"
                                   class="bg-amber-500 hover:bg-amber-600 text-white text-sm px-3 py-1 rounded-md">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('berita.destroy', $b->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded-md">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        @endcan
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
