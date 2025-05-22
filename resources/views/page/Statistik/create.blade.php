{{-- <x-app-layout>
    <div class="container py-5">
        <div class="bg-white shadow rounded p-5">
            <h2 class="mb-4 text-center text-orange-500">Tambah Data Statistik Penduduk</h2>

            <form action="{{ route('statistik.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="text" name="bulan" class="form-control" placeholder="Contoh: Januari 2025" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk</label>
                    <input type="number" name="jumlah_penduduk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="laki_laki" class="form-label">Jumlah Laki-laki</label>
                    <input type="number" name="laki_laki" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="perempuan" class="form-label">Jumlah Perempuan</label>
                    <input type="number" name="perempuan" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="kepala_keluarga" class="form-label">Jumlah Kepala Keluarga</label>
                    <input type="number" name="kepala_keluarga" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('statistik.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layout> --}}
