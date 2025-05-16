<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 sm:p-8 bg-white shadow-lg rounded-xl">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-2">📋 Daftar Kritik dan Saran</h1>
            <p class="text-gray-500 text-md">Lihat semua masukan berharga dari warga di sini.</p>

            @if (session('success'))
                <div class="mt-4 bg-green-100 text-green-800 p-3 rounded-lg shadow text-sm">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm">
                <thead class="bg-gradient-to-r from-orange-400 to-orange-500 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">Kritik/Saran</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-sm font-bold uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kritikSaran as $kritik)
                        <tr class="hover:bg-orange-100 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $kritik->nama ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $kritik->email ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $kritik->isi }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $kritik->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('kritik-saran.destroy', $kritik->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kritik/saran ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded shadow">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-400 text-lg">
                                Tidak ada kritik atau saran saat ini. 🎯
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
