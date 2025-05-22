<x-app-layout>
    <div class="container py-5">
        <div class="bg-white rounded shadow-sm p-5">
            <h2 class="text-center mb-5 fw-bold" style="color: #F97316;">
                📊 Statistik Penduduk Desa Indrajaya
            </h2>

            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted">Total Penduduk</h5>
                            <h1 class="display-4 fw-bold text-primary">{{ $total }} jiwa</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted">Laki-laki</h5>
                            <h1 class="display-4 fw-bold text-info">{{ $laki }} jiwa</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted">Perempuan</h5>
                            <h1 class="display-4 fw-bold text-danger">{{ $perempuan }} jiwa</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <h4 class="mb-4 fw-semibold">Visualisasi Jenis Kelamin Penduduk</h4>
                <canvas id="pendudukChart" style="max-width: 400px; margin: auto;"></canvas>
            </div>
        </div>

        {{-- CRUD Section --}}
        <div class="mt-5 bg-white rounded shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold" style="color: #F97316;">Daftar Penduduk</h3>
                <a href="{{ route('penduduk.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> Tambah Penduduk
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penduduk as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $p->jenis_kelamin }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $p->id }}">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <form action="{{ route('penduduk.destroy', $p->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $p->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('penduduk.update', $p->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $p->id }}">
                                                            Edit Data Penduduk</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label>Nama</label>
                                                            <input type="text" name="nama"
                                                                value="{{ $p->nama }}" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>NIK</label>
                                                            <input type="text" name="nik"
                                                                value="{{ $p->nik }}" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" name="tanggal_lahir"
                                                                value="{{ $p->tanggal_lahir }}" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Jenis Kelamin</label>
                                                            <select name="jenis_kelamin" class="form-control" required>
                                                                <option value="Laki-laki"
                                                                    {{ $p->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option value="Perempuan"
                                                                    {{ $p->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                    Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Alamat</label>
                                                            <textarea name="alamat" class="form-control">{{ $p->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                        @if ($penduduk->count() == 0)
                            <tr>
                                <td colspan="7" class="text-center text-muted">Data penduduk belum tersedia.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pendudukChart');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [{{ $laki }}, {{ $perempuan }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 99, 132, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
