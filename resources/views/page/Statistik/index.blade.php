<x-app-layout>
    <div class="container py-5">
        <div class="bg-white rounded shadow-sm p-5">
            <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">📊 Statistik Penduduk Desa Indrajaya</h1>

            {{-- Ringkasan --}}
            <div class="row text-center mb-5 g-4">
                @php
                    $summaryCards = [
                        [
                            'label' => 'Jumlah Penduduk',
                            'value' => $total . ' jiwa',
                            'icon' => 'bi-people-fill',
                            'color' => 'primary',
                        ],
                        ['label' => 'Laki-laki', 'value' => $laki_laki, 'icon' => 'bi-gender-male', 'color' => 'info'],
                        [
                            'label' => 'Perempuan',
                            'value' => $perempuan,
                            'icon' => 'bi-gender-female',
                            'color' => 'danger',
                        ],
                        [
                            'label' => 'Kepala Keluarga',
                            'value' => $kepala_keluarga,
                            'icon' => 'bi-person-badge',
                            'color' => 'success',
                        ],
                    ];
                @endphp

                @foreach ($summaryCards as $card)
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100 summary-hover transition">
                            <div class="card-body">
                                <div class="mb-2 text-{{ $card['color'] }}">
                                    <i class="bi {{ $card['icon'] }} fs-3"></i>
                                </div>
                                <h6 class="text-muted mb-1">{{ $card['label'] }}</h6>
                                <h4 class="text-{{ $card['color'] }} fw-bold">{{ $card['value'] }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{-- Chart --}}
            <div class="text-center mb-5">
                <h5 class="fw-semibold">Diagram Jenis Kelamin Penduduk</h5>
                <canvas id="genderChart" style="max-width: 400px; margin: auto;"></canvas>
            </div>

            {{-- Form Tambah --}}
            <div class="mb-4">
                <h5 class="fw-bold text-secondary">Tambah Data Statistik Bulanan</h5>
                <form action="{{ route('statistik.store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-3">
                        <input type="month" name="bulan" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="jumlah_penduduk" class="form-control" placeholder="Total" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="laki_laki" class="form-control" placeholder="Laki-laki" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="perempuan" class="form-control" placeholder="Perempuan" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="kepala_keluarga" class="form-control" placeholder="Kepala Keluarga"
                            required>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-info w-100">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </button>

                    </div>
                </form>
            </div>

            

            {{-- Tabel --}}
            <div class="table-responsive">
                <table id="statistikTable" class="table table-striped table-hover align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Total</th>
                            <th>Laki-laki</th>
                            <th>Perempuan</th>
                            <th>Kepala Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($statistik as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->jumlah_penduduk }}</td>
                                <td>{{ $item->laki_laki }}</td>
                                <td>{{ $item->perempuan }}</td>
                                <td>{{ $item->kepala_keluarga }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $item->id }}">
                                         <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('statistik.destroy', $item->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('statistik.update', $item->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data - {{ $item->bulan }}</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Bulan</label>
                                                    <input type="month" name="bulan" class="form-control" required>

                                                </div>
                                                <div class="mb-3">
                                                    <label>Total</label>
                                                    <input type="number" name="jumlah_penduduk"
                                                        value="{{ $item->jumlah_penduduk }}" class="form-control"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Laki-laki</label>
                                                    <input type="number" name="laki_laki"
                                                        value="{{ $item->laki_laki }}" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Perempuan</label>
                                                    <input type="number" name="perempuan"
                                                        value="{{ $item->perempuan }}" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Kepala Keluarga</label>
                                                    <input type="number" name="kepala_keluarga"
                                                        value="{{ $item->kepala_keluarga }}" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const genderChart = document.getElementById('genderChart');
        new Chart(genderChart, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $laki_laki }}, {{ $perempuan }}],
                    backgroundColor: ['#3b82f6', '#ef4444'],
                    borderColor: ['#1e40af', '#7f1d1d'],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#statistikTable').DataTable();
        });
    </script>

</x-app-layout>
