<x-app-layout>
    <div class="container">
        <h1>Tambah Data UMKM</h1>
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
</x-app-layout>
