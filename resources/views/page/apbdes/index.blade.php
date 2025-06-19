<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">📊 Data APBDES</h1>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @can('role-A')
        <div class="mb-6 text-right">
            <a href="{{ route('apbdes.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>
        @endcan

        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Tahun</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                        <th class="px-4 py-2 text-left">Keterangan</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $row)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $row->tahun }}</td>
                            <td class="px-4 py-2">{{ $row->kategori }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($row->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $row->keterangan ?? '-' }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                @can('role-A')
                                <button 
                                    class="text-sm bg-yellow-500 text-black px-3 py-1 rounded hover:bg-yellow-600"
                                    onclick="openModal({{ $row->id }})">
                                     <i class="bi bi-pencil-square"></i>
                                </button>

                                <form action="{{ route('apbdes.destroy', $row->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div id="modal-{{ $row->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                            <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                                <h2 class="text-xl font-semibold mb-4">Edit Data APBDES</h2>

                                <form action="{{ route('apbdes.update', $row->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-4">
                                        <label class="block mb-1 font-medium">Tahun</label>
                                        <input type="number" name="tahun" value="{{ $row->tahun }}"
                                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block mb-1 font-medium">Kategori</label>
                                        <input type="text" name="kategori" value="{{ $row->kategori }}"
                                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block mb-1 font-medium">Jumlah</label>
                                        <input type="number" name="jumlah" value="{{ $row->jumlah }}"
                                            class="w-full border border-gray-300 rounded px-3 py-2" required>
                                    </div>

                                    <div class="mb-4">
                                        <label class="block mb-1 font-medium">Keterangan</label>
                                        <textarea name="keterangan" rows="3"
                                            class="w-full border border-gray-300 rounded px-3 py-2">{{ $row->keterangan }}</textarea>
                                    </div>

                                    <div class="flex justify-end space-x-2">
                                        <button type="button"
                                            onclick="closeModal({{ $row->id }})"
                                            class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada data APBDES.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript untuk membuka dan menutup modal -->
    <script>
        function openModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
            document.getElementById(`modal-${id}`).classList.add('flex');
        }

        function closeModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('flex');
            document.getElementById(`modal-${id}`).classList.add('hidden');
        }
    </script>
</x-app-layout>
