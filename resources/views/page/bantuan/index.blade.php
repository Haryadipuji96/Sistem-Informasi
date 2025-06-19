<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4 text-black fw-bold">📋 Daftar Bantuan Sosial</h2>

        {{-- ================== BAGIAN ADMIN ================== --}}
        @can('role-A')
            {{-- Filter dan Ekspor --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-3">
                <form method="GET" action="{{ url('/bantuan-sosial') }}" class="d-flex align-items-center gap-2">
                    <label for="jenis" class="mb-0 me-2 fw-semibold">Filter Jenis Bantuan:</label>
                    <select id="jenis" name="jenis" onchange="this.form.submit()" class="form-select">
                        <option value="">-- Semua Jenis Bantuan --</option>
                        @foreach ($jenisBantuan as $item)
                            <option value="{{ $item }}" {{ $item == $jenis ? 'selected' : '' }}>{{ $item }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <form method="GET" action="{{ url('/bantuan-sosial') }}" class="d-flex gap-2">
                    <input type="text" name="search" value="{{ $search }}" class="form-control"
                        placeholder="Cari Nama / NIK...">
                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                </form>

                <a href="{{ route('bantuan-sosial.export.pdf', ['jenis' => $jenis]) }}" class="btn btn-danger fw-semibold">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
            </div>

            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form Tambah --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">Tambah Data Bantuan</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/bantuan-sosial') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-3">
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="jenis_bantuan" class="form-control" placeholder="Jenis Bantuan"
                                    required>
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="tanggal_terima" class="form-control" required>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                <i class="bi bi-plus-circle"></i> Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Tabel Data untuk Admin --}}
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">Data Penerima Bantuan</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0 align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Bantuan</th>
                                    <th>Tanggal Terima</th>
                                    <th style="width: 13%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $i => $item)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td><span class="badge bg-info text-dark">{{ $item->jenis_bantuan }}</span></td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_terima)->translatedFormat('d M Y') }}
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $item->id }}" title="Edit Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <form action="{{ url('/bantuan-sosial/' . $item->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" title="Hapus Data">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ url('/bantuan-sosial/' . $item->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
                                                            Edit Bantuan Sosial</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nama{{ $item->id }}"
                                                                class="form-label">Nama</label>
                                                            <input type="text" id="nama{{ $item->id }}"
                                                                name="nama" value="{{ $item->nama }}"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nik{{ $item->id }}"
                                                                class="form-label">NIK</label>
                                                            <input type="text" id="nik{{ $item->id }}"
                                                                name="nik" value="{{ $item->nik }}"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="alamat{{ $item->id }}"
                                                                class="form-label">Alamat</label>
                                                            <input type="text" id="alamat{{ $item->id }}"
                                                                name="alamat" value="{{ $item->alamat }}"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jenis_bantuan{{ $item->id }}"
                                                                class="form-label">Jenis Bantuan</label>
                                                            <input type="text" id="jenis_bantuan{{ $item->id }}"
                                                                name="jenis_bantuan" value="{{ $item->jenis_bantuan }}"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tanggal_terima{{ $item->id }}"
                                                                class="form-label">Tanggal Terima</label>
                                                            <input type="date" id="tanggal_terima{{ $item->id }}"
                                                                name="tanggal_terima" value="{{ $item->tanggal_terima }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bi bi-save"></i> Simpan
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">Belum ada data bantuan
                                            sosial.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 px-3">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        @endcan

        {{-- ================== BAGIAN USER (NON-ADMIN) ================== --}}
        @cannot('role-A')

            {{-- Form Pencarian --}}
            <form method="GET" action="{{ url('/bantuan-sosial') }}" class="row g-2 mb-4 align-items-center">
                <div class="col-12 col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama Anda..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
                @if (request('search'))
                    <div class="col-auto">
                        <a href="{{ url('/bantuan-sosial') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Tampilkan Semua
                        </a>
                    </div>
                @endif
            </form>



            <script>
                // Setelah submit, kosongkan kolom input pencarian
                document.getElementById('searchForm').addEventListener('submit', function() {
                    setTimeout(() => {
                        document.getElementById('searchInput').value = '';
                    }, 10);
                });
            </script>


            @if ($data->count())
                <div class="row g-4">
                    @foreach ($data as $item)
                        <div class="col-md-6 col-lg-4">
                            <div
                                class="card bantuan-card shadow-sm border-0 h-100 bg-light position-relative transition-hover">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h5 class="card-title text-primary fw-bold mb-0">
                                            <i class="bi bi-box2-heart-fill me-1 text-danger"></i>
                                            {{ $item->jenis_bantuan }}
                                        </h5>
                                        <span class="badge bg-success">
                                            {{ \Carbon\Carbon::parse($item->tanggal_terima)->translatedFormat('d M Y') }}
                                        </span>
                                    </div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-1">
                                            <i class="bi bi-person-fill me-2 text-secondary"></i>
                                            <strong>Nama:</strong> {{ $item->nama }}
                                        </li>
                                        <li class="mb-1">
                                            <i class="bi bi-credit-card-2-front-fill me-2 text-secondary"></i>
                                            <strong>NIK:</strong> {{ $item->nik }}
                                        </li>
                                        <li class="mb-1">
                                            <i class="bi bi-geo-alt-fill me-2 text-secondary"></i>
                                            <strong>Alamat:</strong> {{ $item->alamat }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-white border-0 text-end px-4 pb-3">
                                    <small class="text-muted fst-italic">
                                        Bantuan diterima
                                        {{ \Carbon\Carbon::parse($item->tanggal_terima)->translatedFormat('l, d F Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $data->links() }}
                </div>
            @else
                <div class="alert alert-info mt-3" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Data tidak ditemukan. Coba masukkan nama lain.
                </div>
            @endif

        @endcannot


    </div>
</x-app-layout>
