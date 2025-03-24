<x-app-layout>
    <div class="bg-white min-h-screen">
        <!-- Container untuk tabel -->
        <div class="container mx-auto p-6">
            <div class="flex items-center justify-between mb-6">
                <div>DATA NAMA PEGAWAI</div>
            </div>
            <!-- Form Pencarian -->
            <div class="mb-6">
                <form action="{{ route('DataPegawai.index') }}" method="GET" class="flex items-center space-x-2">
                    <!-- Input Pencarian -->
                    <div class="relative w-full max-w-md ">
                        <input type="text" name="search" placeholder="Cari Nama Pegawai..."
                            value="{{ request('search') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <!-- Tombol Cari -->
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-md text-xs text-white">
                        Cari
                    </button>
                    <div>
                        <a href="{{ route('DataPegawai.create') }}" onclick="return functionAdd()"
                            class="bg-sky-600 p-2 hover:bg-sky-400 text-white rounded-xl py-2">Add</a>
                    </div>
                </form>
            </div>
            <!-- Tabel Data Pegawai -->
            <div class="flex items-center justify-center mb-5">
                <div class="flex justify-center">
                    <div class="p-12" style="width:100%; overflow-x:auto;">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">No</th>
                                    <th class="py-2 px-4 border-b">Nama Lengkap</th>
                                    <th class="py-2 px-4 border-b">Jabatan</th>
                                    <th class="py-2 px-4 border-b">Alamat</th>
                                    <th class="py-2 px-4 border-b">Gender</th>
                                    <th class="py-2 px-4 border-b">Pendidikan</th>
                                    <th class="py-2 px-4 border-b text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DataPegawai as $index => $employee)
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">{{ $index + 1 }}</td>
                                        <td class="py-2 px-4 border-b">{{ $employee->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $employee->position }}</td>
                                        <td class="py-2 px-4 border-b">{{ $employee->address }}</td>
                                        <td class="py-2 px-4 border-b">{{ $employee->gender }}</td>
                                        <td class="py-2 px-4 border-b">{{ $employee->pendidikan }}</td>
                                        <td class="px-6 py-4">
                                            @can('role-ADMIN')
                                            <!-- Tombol Edit -->
                                            <button type="button" data-id="{{ $employee->id }}"
                                                data-name="{{ $employee->name }}" data-modal-target="sourceModal"
                                                data-position="{{ $employee->position }}"
                                                data-address="{{ $employee->address }}"
                                                data-gender="{{ $employee->gender }}"
                                                data-pendidikan="{{ $employee->pendidikan }}"
                                                onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <!-- Tombol Delete -->
                                            <button
                                                onclick="deleteEmployee({{ $employee->id }}, '{{ $employee->name }}')"
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
            <!-- Pagination -->
            <div class="flex justify-center mt-6">
                {{ $DataPegawai->appends(request()->query())->links() }}
            </div>
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold" id="chartTitle">Diagram Aktivitas</h3>
                <!-- Tombol Hamburger -->
                <div class="dropdown relative">
                    <button id="hamburgerBtn"
                        class="border border-black text-black py-2 px-4 rounded hover:bg-orange-300 transition duration-300 ease-in-out">
                        ☰ Menu
                    </button>
                    <div id="dropdownMenu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg">
                        <ul class="py-2">
                            <li>
                                <a id="downloadBtn" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Download
                                    Gambar</a>
                            </li>
                            <li>
                                <a id="printBtn" class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Cetak</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div
                class="lg:h-[500px] h-[300px] w-[300px] lg:w-[500px] flex items-center justify-center content-center lg:ml-80 lg:mt-12 mt-6">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative w-full md:w-1/3 bg-white rounded-lg shadow mx-5 max-h-[90vh] overflow-y-auto">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                    Edit Data Pegawai
                </h3>
                <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form method="POST" id="formSourceModal">
                @csrf
                <div class="p-4 space-y-6">
                    <div class="p-4 space-y-6">
                        <!-- Nama Lengkap -->
                        <div class="mb-5">
                            <label for="edit_name" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Lengkap</label>
                            <input type="text" id="edit_name" name="edit_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan nama lengkap..." required>
                        </div>
                        <!-- Jabatan -->
                        <div class="mb-5">
                            <label for="edit_position"
                                class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                            <input type="text" id="edit_position" name="edit_position"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan jabatan..." required>
                        </div>
                        <!-- Alamat -->
                        <div class="mb-5">
                            <label for="edit_address"
                                class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                            <input type="text" id="edit_address" name="edit_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan alamat..." required>
                        </div>
                        <!-- Jenis Kelamin -->
                        <div class="mb-5">
                            <label for="edit_gender" class="block font-bold">Jenis Kelamin</label>
                            <select name="edit_gender" id="edit_gender"
                                class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                                required>
                                <option value="" disabled selected>Pilih jenis kelamin</option>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <!-- Pendidikan -->
                        <div class="mb-5">
                            <label for="edit_pendidikan" class="block font-bold">Pendidikan</label>
                            <select name="edit_pendidikan" id="edit_pendidikan"
                                class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                                required>
                                <option value="" disabled selected>Pilih pendidikan</option>
                                <option value="SLTA">SLTA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="border border-black text-black font-bold py-2 px-4 rounded hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
                            Simpan
                        </button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="border border-black text-black font-bold py-2 px-4 rounded hover:bg-red-500 hover:text-white transition duration-300 ease-in-out">
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fungsi untuk membuka modal edit
        const editSourceModal = (button) => {
            const formModal = document.getElementById('formSourceModal');
            const modalTarget = button.dataset.modalTarget;
            const id = button.dataset.id;
            const name = button.dataset.name;
            const position = button.dataset.position;
            const address = button.dataset.address;
            const gender = button.dataset.gender;
            const pendidikan = button.dataset.pendidikan;
            let url = "{{ route('DataPegawai.update', ':id') }}".replace(':id', id);
            // Isi nilai input modal
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_position').value = position;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_gender').value = gender;
            document.getElementById('edit_pendidikan').value = pendidikan;
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
        const deleteEmployee = async (id, name) => {
            let tanya = confirm(`Apakah Anda yakin ingin menghapus data pegawai "${name}"?`);
            if (tanya) {
                try {
                    const response = await axios.post(`/DataPegawai/${id}`, {
                        '_method': 'DELETE',
                        '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    });
                    if (response.status === 200) {
                        alert('Data Pegawai berhasil dihapus');
                        location.reload();
                    } else {
                        alert('Gagal menghapus Data Pegawai. Silakan coba lagi.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat menghapus Data Pegawai. Silakan cek konsol untuk detail.');
                }
            }
        };

        // Chart.js Initialization
        const employees = {!! json_encode($DataPegawai) !!};
        let myChart;

        function createChart(type, labels, data, title) {
            const ctx = document.getElementById('myChart').getContext('2d');
            if (myChart) {
                myChart.destroy(); // Hancurkan chart sebelumnya jika ada
            }
            myChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: title,
                        data: data,
                        backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                        borderColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000,
                        easing: 'easeInOutQuad'
                    }
                }
            });
        }

        // Tampilkan chart default saat halaman dimuat
        window.addEventListener('DOMContentLoaded', function() {
            if (employees.length === 0) {
                // Jika database kosong, tampilkan pesan
                document.getElementById('chartTitle').innerText = 'Tidak Ada Data Pegawai';
                const ctx = document.getElementById('myChart').getContext('2d');
                if (myChart) {
                    myChart.destroy();
                }
                myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [],
                        datasets: [{
                            label: 'Tidak Ada Data',
                            data: [],
                            backgroundColor: []
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            } else {
                // Jika database ada isi, tampilkan chart default
                const genderData = {};
                employees.forEach(employee => {
                    if (!genderData[employee.gender]) {
                        genderData[employee.gender] = 0;
                    }
                    genderData[employee.gender]++;
                });
                const labels = Object.keys(genderData);
                const data = Object.values(genderData);
                createChart('pie', labels, data, 'Data Pegawai Berdasarkan Jenis Kelamin');
            }
        });

        // Dropdown menu toggle
        document.getElementById('hamburgerBtn').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        });

        // Download chart as image
        document.getElementById('downloadBtn').addEventListener('click', function() {
            const canvas = document.getElementById('myChart');
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'chart.png';
            link.click();
        });

        // Print chart
        document.getElementById('printBtn').addEventListener('click', function() {
            window.print();
        });
    </script>
</x-app-layout>
