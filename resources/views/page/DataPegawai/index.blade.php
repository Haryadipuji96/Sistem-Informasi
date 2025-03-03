<x-app-layout>
    <div class="bg-white min-h-screen">
        <!-- Container untuk tombol -->
        <div class="container mx-auto p-6">
            <div class="flex space-x-4 justify-center mb-6">
                <!-- Tombol untuk menampilkan data pegawai berdasarkan jenis kelamin -->
                <button id="btnGender"
                    class="border border-black text-black font-bold py-2 px-4 rounded hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
                    Berdasarkan Jenis Kelamin
                </button>
                <!-- Tombol untuk menampilkan data pegawai per bulan -->
                <button id="btnMonthly"
                    class="border border-black text-black font-bold py-2 px-4 rounded hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
                    Data Pegawai Per Bulan
                </button>
            </div>
            <!-- Container untuk chart -->
            <div id="chartContainer"
                class="bg-white w-full dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg mt-6 p-12">
                <div class="p-4 flex items-center justify-between">
                    <div>DATA PEGAWAI</div>
                    <div>
                        <a href="#" onclick="return functionAdd()"
                            class="bg-sky-600 p-2 hover:bg-sky-400 text-white rounded-xl">Add</a>
                    </div>
                </div>
                <div class="flex items-center justify-center mb-5">
                    <div class="flex justify-center">
                        <div class="p-12" style="width:100%;  overflow-x:auto;">
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">No</th>
                                        <th class="py-2 px-4 border-b">Nama Lengkap</th>
                                        <th class="py-2 px-4 border-b">Jabatan</th>
                                        <th class="py-2 px-4 border-b">Alamat</th>
                                        <th class="py-2 px-4 border-b">Gender</th>
                                        <th class="py-2 px-4 border-b">Pendidikan</th>

                                        <th>Action</th>
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
                                            <button type="button" data-id="{{ $k->id }}"
                                                data-modal-target="sourceModalEdit" DataPegawai="{{ $k->DataPegawai }}"
                                                data-status="{{ $k->status }}" onclick="editSourceModal(this)"
                                                class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                Edit
                                            </button>
                                            <button onclick="return DataPegawaiDelete('{{$k->id}}','{{$k->DataPegawai}}')" class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                    <a id="downloadBtn"
                                        class="block px-4 py-2 hover:bg-gray-100 cursor-pointer">Download Gambar</a>
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
                    <canvas id="myChart" width="20" height="20"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Data pegawai dari database (dikirim dari controller)
        const employees = {!! json_encode($DataPegawai) !!};

        // Inisialisasi Chart.js
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
                        backgroundColor: type === 'pie' ? ['rgb(255, 99, 132)', 'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                        ] : [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: type === 'pie' ?
                            null : [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
                            ],
                        borderWidth: type === 'pie' ? 0 : 1
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000, // Animasi selama 1 detik
                        easing: 'easeInOutQuad'
                    },
                    scales: type === 'bar' ? {
                        y: {
                            beginAtZero: true
                        }
                    } : null
                }
            });
        }



        // Event listener untuk tombol "Data Pegawai Berdasarkan Jenis Kelamin"
        document.getElementById('btnGender').addEventListener('click', function() {
            const genderData = {};
            employees.forEach(employee => {
                if (!genderData[employee.gender]) {
                    genderData[employee.gender] = 0;
                }
                genderData[employee.gender]++;
            });

            const labels = Object.keys(genderData);
            const data = Object.values(genderData);

            showChart('pie', labels, data, 'Data Pegawai Berdasarkan Jenis Kelamin');
        });

        // Event listener untuk tombol "Data Pegawai Per Bulan"
        document.getElementById('btnMonthly').addEventListener('click', function() {
            const monthlyData = {};
            employees.forEach(employee => {
                const date = new Date(employee.pendidikan);
                const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
                if (!monthlyData[monthYear]) {
                    monthlyData[monthYear] = 0;
                }
                monthlyData[monthYear]++;
            });

            const labels = Object.keys(monthlyData);
            const data = Object.values(monthlyData);

            showChart('bar', labels, data, 'Data Pegawai Per Bulan');
        });

        // Fungsi untuk menampilkan chart
        function showChart(type, labels, data, title) {
            document.getElementById('chartTitle').innerText = title;
            createChart(type, labels, data, title);
        }

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

                showChart('pie', labels, data, 'Data Pegawai Berdasarkan Jenis Kelamin');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#pegawai-datatable').DataTable(); // Inisialisasi sederhana
        });
    </script>
</x-app-layout>
