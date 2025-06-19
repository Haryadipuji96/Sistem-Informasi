<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-4xl font-extrabold text-black text-center mb-6 flex items-center justify-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black animate-pulse" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                    d="M6 2a1 1 0 00-1 1v1H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-.001V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zM5 8h10v8H5V8z" />
            </svg>
            Agenda Desa
        </h1>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @can('role-A')
            <div class="mb-6 text-right">
                <a href="{{ route('agendas.create') }}"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    <i class="bi bi-plus-circle"></i> Tambah Agenda Baru
                </a>
            </div>
        @endcan

        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Judul</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Deskripsi</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agendas as $agenda)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $agenda->title }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($agenda->event_date)->format('d M Y') }}</td>
                            <td class="px-4 py-2">{{ $agenda->description }}</td>
                            <td class="px-4 py-2">{{ ucfirst($agenda->status) }}</td>
                            <td class="px-4 py-2">
                                @can('role-A')
                                    <button
                                        onclick="openEditModal({{ $agenda->id }}, '{{ addslashes($agenda->title) }}', '{{ $agenda->event_date }}', '{{ $agenda->status }}', `{{ addslashes($agenda->description) }}`)"
                                        class="text-sm bg-yellow-500 text-black px-3 py-1 rounded hover:bg-yellow-600"> <i
                                            class="bi bi-pencil-square"></i></button>

                                    <form action="{{ route('agendas.destroy', $agenda->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-sm bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"> <i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada agenda yang
                                ditambahkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg max-w-md w-full">
            <h2 class="text-lg font-semibold mb-4">Edit Agenda</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_id">

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Judul</label>
                    <input type="text" id="edit_title" name="title" class="w-full border px-3 py-2 rounded"
                        required>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Tanggal</label>
                    <input type="date" id="edit_event_date" name="event_date" class="w-full border px-3 py-2 rounded"
                        required>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Deskripsi</label>
                    <textarea id="edit_description" name="description" rows="3" class="w-full border px-3 py-2 rounded" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium mb-1">Status</label>
                    <select id="edit_status" name="status" class="w-full border px-3 py-2 rounded">
                        <option value="upcoming">Aktif</option>
                        <option value="completed">Selesai</option>
                    </select>
                </div>

                <div class="text-right">
                    <button type="button" onclick="closeEditModal()"
                        class="mr-2 px-4 py-2 border rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, title, date, status, description) {
            const statusMap = {
                'aktif': 'upcoming',
                'selesai': 'completed',
                'Aktif': 'upcoming',
                'Selesai': 'completed',
                'upcoming': 'upcoming',
                'completed': 'completed'
            };
            const mappedStatus = statusMap[status] ?? 'upcoming';

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_event_date').value = date;
            document.getElementById('edit_status').value = mappedStatus;
            document.getElementById('edit_description').value = description;

            const form = document.getElementById('editForm');
            form.action = '/agendas/' + id;

            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }
    </script>
</x-app-layout>
