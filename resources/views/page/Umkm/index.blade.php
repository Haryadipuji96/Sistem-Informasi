<x-app-layout>
    <div class="bg-white min-h-screen">
        <!-- Container untuk tabel -->
        <div class="container mx-auto p-6">
            <div class="flex items-center justify-between mb-6">
                <div>DATA UMKM</div>
                @can('role-A')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Tambah UMKM
                </button>
                @endcan
            </div>

            <!-- Tabel Data UMKM -->
            <div class="flex items-center justify-center mb-5">
                <div class="flex justify-center">
                    <div class="p-12" style="width:100%; overflow-x:auto;">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">No</th>
                                    <th class="py-2 px-4 border-b">Nama UMKM</th>
                                    <th class="py-2 px-4 border-b">Pemilik</th>
                                    <th class="py-2 px-4 border-b">Alamat</th>
                                    <th class="py-2 px-4 border-b">Jenis Usaha</th>
                                    <th class="py-2 px-4 border-b">Jumlah Karyawan</th>
                                    <th class="py-2 px-4 border-b">Modal Usaha (Rp)</th>
                                    <th class="py-2 px-4 border-b text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($umkms as $index => $umkm)
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">{{ $index + 1 }}</td>
                                        <td class="py-2 px-4 border-b">{{ $umkm->nama_umkm }}</td>
                                        <td class="py-2 px-4 border-b">{{ $umkm->pemilik }}</td>
                                        <td class="py-2 px-4 border-b">{{ $umkm->alamat }}</td>
                                        <td class="py-2 px-4 border-b">{{ $umkm->jenis_usaha }}</td>
                                        <td class="py-2 px-4 border-b">{{ $umkm->jumlah_karyawan ?? '0' }}</td>
                                        <td class="py-2 px-4 border-b">Rp {{ number_format($umkm->modal, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4">
                                            @can('role-A')
                                            <!-- Tombol Edit -->
                                            <button type="button" data-id="{{ $umkm->id }}"
                                                data-nama_umkm="{{ $umkm->nama_umkm }}" data-modal-target="editModal"
                                                data-pemilik="{{ $umkm->pemilik }}"
                                                data-alamat="{{ $umkm->alamat }}"
                                                data-jenis_usaha="{{ $umkm->jenis_usaha }}"
                                                data-jumlah_karyawan="{{ $umkm->jumlah_karyawan }}"
                                                data-modal="{{ $umkm->modal }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <!-- Tombol Delete -->
                                            <button
                                                onclick="deleteEmployee({{ $umkm->id }}, '{{ $umkm->nama_umkm }}')"
                                                class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded-md text-xs text-white ml-2">
                                                Delete
                                            </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Umkm.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_umkm" class="form-label">Nama UMKM</label>
                            <input type="text" name="nama_umkm" id="nama_umkm" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="pemilik" class="form-label">Pemilik</label>
                            <input type="text" name="pemilik" id="pemilik" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                            <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan</label>
                            <input type="number" name="jumlah_karyawan" id="jumlah_karyawan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="modal" class="form-label">Modal (Rp)</label>
                            <input type="number" name="modal" id="modal" class="form-control">
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
                    Edit Data UMKM
                </h3>
                <button type="button" onclick="sourceModalClose(this)" data-modal-target="editModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form method="POST" id="formSourceModal">
                @csrf
                <div class="p-4 space-y-6">
                    <div class="p-4 space-y-6">
                        <!-- Nama UMKM -->
                        <div class="mb-5">
                            <label for="edit_nama_umkm" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                UMKM</label>
                            <input type="text" id="edit_nama_umkm" name="edit_nama_umkm"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan nama UMKM..." required>
                        </div>
                        <!-- Pemilik -->
                        <div class="mb-5">
                            <label for="edit_pemilik" class="block mb-2 text-sm font-medium text-gray-900">Pemilik</label>
                            <input type="text" id="edit_pemilik" name="edit_pemilik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan pemilik..." required>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-5">
                            <label for="edit_alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                            <input type="text" id="edit_alamat" name="edit_alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan alamat..." required>
                        </div>
                        <!-- Jenis Usaha -->
                        <div class="mb-5">
                            <label for="edit_jenis_usaha" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                Usaha</label>
                            <input type="text" id="edit_jenis_usaha" name="edit_jenis_usaha"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan jenis usaha..." required>
                        </div>
                        <!-- Jumlah Karyawan -->
                        <div class="mb-5">
                            <label for="edit_jumlah_karyawan" class="block mb-2 text-sm font-medium text-gray-900">Jumlah
                                Karyawan</label>
                            <input type="number" id="edit_jumlah_karyawan" name="edit_jumlah_karyawan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah karyawan...">
                        </div>
                        <!-- Modal Usaha -->
                        <div class="mb-5">
                            <label for="edit_modal" class="block mb-2 text-sm font-medium text-gray-900">Modal
                                Usaha</label>
                            <input type="number" id="edit_modal" name="edit_modal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan modal usaha...">
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
            const nama_umkm = button.dataset.nama_umkm;
            const pemilik = button.dataset.pemilik;
            const alamat = button.dataset.alamat;
            const jenis_usaha = button.dataset.jenis_usaha;
            const jumlah_karyawan = button.dataset.jumlah_karyawan;
            const modal = button.dataset.modal;
            let url = "{{ route('Umkm.update', ':id') }}".replace(':id', id);

            // Isi nilai input modal
            document.getElementById('edit_nama_umkm').value = nama_umkm;
            document.getElementById('edit_pemilik').value = pemilik;
            document.getElementById('edit_alamat').value = alamat;
            document.getElementById('edit_jenis_usaha').value = jenis_usaha;
            document.getElementById('edit_jumlah_karyawan').value = jumlah_karyawan;
            document.getElementById('edit_modal').value = modal;

            // Set action URL form
            document.getElementById('formSourceModal').setAttribute('action', url);

            // Tambahkan token CSRF dan method PATCH
            let csrfToken = document.createElement('input');
            csrfToken.setAttribute('type', 'hidden');
            csrfToken.setAttribute('name', '_token');
            csrfToken.setAttribute('value', '{{ csrf_token() }}');
            formModal.appendChild(csrfToken);

            let methodInput = document.createElement('input');
            methodInput.setAttribute('type', 'hidden');
            methodInput.setAttribute('name', '_method');
            methodInput.setAttribute('value', 'PATCH');
            formModal.appendChild(methodInput);

            // Tampilkan modal
            document.getElementById(modalTarget).classList.toggle('hidden');
        };

        // Fungsi untuk menutup modal
        function sourceModalClose(button) {
            const modalTarget = button.dataset.modalTarget;
            document.getElementById(modalTarget).classList.add('hidden');
        }

        // Fungsi untuk menghapus data pegawai
        const deleteEmployee = async (id, nama_umkm) => {
            let tanya = confirm(`Apakah Anda yakin ingin menghapus data UMKM "${nama_umkm}"?`);
            if (tanya) {
                try {
                    const response = await axios.post(`/Umkm/${id}`, {
                        '_method': 'DELETE',
                        '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    });
                    if (response.status === 200) {
                        alert('Data UMKM berhasil dihapus');
                        location.reload();
                    } else {
                        alert('Gagal menghapus Data UMKM. Silakan coba lagi.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat menghapus Data UMKM. Silakan cek konsol untuk detail.');
                }
            }
        };
    </script>
</x-app-layout>