<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">📅 Daftar Event Desa</h1>
            @can('role-A')
                <a href="{{ route('events.create') }}"
                   class="bg-sky-500 hover:bg-sky-600 text-white text-sm px-6 py-3 rounded-lg shadow-md transition duration-300">
                    <i class="bi bi-plus-circle"></i> Tambah Event
                </a>
            @endcan
        </div>

        @if ($events->isEmpty())
            <div class="text-center text-gray-500">
                Belum ada event yang tersedia saat ini.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition transform hover:scale-105 p-6 relative">
                        <h2 class="text-xl font-semibold text-gray-800 mb-3">{{ $event->title }}</h2>
                        <p class="text-gray-600 mb-4 text-sm">
                            {{ Str::limit($event->description, 100) }}
                        </p>
                        <p class="text-sm text-gray-500 mb-4">📍 Tanggal: 
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                        </p>
                        <a href="{{ route('events.show', $event->id) }}"
                           class="bg-green-500 hover:bg-green-600 text-white text-sm px-5 py-2 rounded-lg transition duration-300">
                            Selengkapnya....
                        </a>

                        @can('role-A')
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus event ini?')"
                                  class="absolute top-4 right-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 transition"
                                        title="Hapus Event">
                                    <i class="bi bi-trash-fill text-xl"></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
