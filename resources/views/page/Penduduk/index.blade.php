<x-app-layout>
    <div class="bg-white min-h-screen">
        <!-- Container untuk tabel -->
        <div class="container mx-auto p-6">
            <div class="flex items-center justify-between mb-6">
                <div>DATA PENDUDUK</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah Data Penduduk
                </button>
            </div>
            <!-- Tabel Data Penduduk -->
            <div class="flex items-center justify-center mb-5">
                <div class="flex justify-center">
                    <div class="p-12" style="width:100%; overflow-x:auto;">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">No</th>
                                    <th class="py-2 px-4 border-b">Nama</th>
                                    <th class="py-2 px-4 border-b">NIK</th>
                                    <th class="py-2 px-4 border-b">Tanggal Lahir</th>
                                    <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                                    <th class="py-2 px-4 border-b">Alamat</th>
                                    <th class="py-2 px-4 border-b text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penduduk as $index => $item)
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">{{ $index + 1 }}</td>
                                        <td class="py-2 px-4 border-b">{{ $item->nama }}</td>
                                        <td class="py-2 px-4 border-b">{{ $item->nik }}</td>
                                        <td class="py-2 px-4 border-b">{{ $item->tanggal_lahir }}</td>
                                        <td class="py-2 px-4 border-b">{{ $item->jenis_kelamin }}</td>
                                        <td class="py-2 px-4 border-b">{{ $item->alamat }}</td>
                                        <td class="px-6 py-4">
                                            <!-- Tombol Edit -->
                                            <button type="button" data-id="{{ $item->id }}"
                                                data-nama="{{ $item->nama }}" data-modal-target="editModal"
                                                data-nik="{{ $item->nik }}"
                                                data-tanggal_lahir="{{ $item->tanggal_lahir }}"
                                                data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                data-alamat="{{ $item->alamat }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <!-- Tombol Delete -->
                                            <button
                                                onclick="deleteEmployee({{ $item->id }}, '{{ $item->nama }}')"
                                                class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white ml-2">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Create -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Data Penduduk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Penduduk.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="editModal">
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div class="relative w-full md:w-1/3 bg-white rounded-lg shadow mx-5 max-h-[90vh] overflow-y-auto">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Edit Data Penduduk
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="editModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    @method('PUT')
                    <div class="p-4 space-y-6">
                        <div class="p-4 space-y-6">
                            <!-- Nama -->
                            <div class="mb-5">
                                <label for="edit_nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                <input type="text" id="edit_nama" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan nama..." required>
                            </div>
                            <!-- NIK -->
                            <div class="mb-5">
                                <label for="edit_nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                                <input type="text" id="edit_nik" name="nik"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan NIK..." required>
                            </div>
                            <!-- Tanggal Lahir -->
                            <div class="mb-5">
                                <label for="edit_tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                                <input type="date" id="edit_tanggal_lahir" name="tanggal_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <!-- Jenis Kelamin -->
                            <div class="mb-5">
                                <label for="edit_jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                                <select id="edit_jenis_kelamin" name="jenis_kelamin"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <!-- Alamat -->
                            <div class="mb-5">
                                <label for="edit_alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                <textarea id="edit_alamat" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Masukkan alamat..."></textarea>
                            </div>
                        </div>
                        <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                            <button type="submit" id="formSourceButton"
                                class="border border-black text-black font-bold py-2 px-4 rounded hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
                                Simpan
                            </button>
                            <button type="button" data-modal-target="editModal" onclick="sourceModalClose(this)"
                                class="border border-black text-black font-bold py-2 px-4 rounded hover:bg-red-500 hover:text-white transition duration-300 ease-in-out">
                                Batal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- JavaScript -->
        <script>
            // Fungsi untuk membuka modal edit
            const editSourceModal = (button) => {
                const formModal = document.getElementById('formSourceModal');
                const modalTarget = button.dataset.modalTarget;
                const id = button.dataset.id;
                const nama = button.dataset.nama;
                const nik = button.dataset.nik;
                const tanggal_lahir = button.dataset.tanggal_lahir;
                const jenis_kelamin = button.dataset.jenis_kelamin;
                const alamat = button.dataset.alamat;
                let url = "{{ route('Penduduk.update', ':id') }}".replace(':id', id);
                // Isi nilai input modal
                document.getElementById('edit_nama').value = nama;
                document.getElementById('edit_nik').value = nik;
                document.getElementById('edit_tanggal_lahir').value = tanggal_lahir;
                document.getElementById('edit_jenis_kelamin').value = jenis_kelamin;
                document.getElementById('edit_alamat').value = alamat;
                // Set action URL form
                document.getElementById('formSourceModal').setAttribute('action', url);
                // Tampilkan modal
                document.getElementById(modalTarget).classList.toggle('hidden');
            };
            // Fungsi untuk menutup modal
            function sourceModalClose(button) {
                const modalTarget = button.dataset.modalTarget;
                document.getElementById(modalTarget).classList.add('hidden');
            }
            // Fungsi untuk menghapus data penduduk
            const deleteEmployee = async (id, nama) => {
                let tanya = confirm(`Apakah Anda yakin ingin menghapus data penduduk "${nama}"?`);
                if (tanya) {
                    try {
                        const response = await axios.post(`/Penduduk/${id}`, {
                            '_method': 'DELEeeTE',
                            '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        });
                        if (response.status === 200) {
                            alert('Data Penduduk berhasil dihapus');
                            location.reload();
                        } else {
                            alert('Gagal menghapus Data Penduduk. Silakan coba lagi.');
                        }
                    } catch (error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat menghapus Data Penduduk. Silakan cek konsol untuk detail.');
                    }
                }
            };
        </script>
    </div>
</x-app-layout>