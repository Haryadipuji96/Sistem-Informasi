<x-app-layout>
    <div class="bg-white min-h-screen">
        <div class="container mx-auto p-6">
            <!-- Judul Halaman -->
            <h1 class="text-2xl font-bold mb-6">Tambah Data Pegawai</h1>

            <!-- Form Tambah Data Pegawai -->
            <form action="{{ route('DataPegawai.store') }}" method="POST" class="space-y-4">
                @csrf <!-- Token CSRF untuk keamanan -->

                <!-- Nama Lengkap -->
                <div>
                    <label for="name" class="block font-bold">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="w-full border p-2 rounded"
                        placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Jabatan -->
                <div>
                    <label for="position" class="block font-bold">Jabatan</label>
                    <input type="text" name="position" id="position" class="w-full border p-2 rounded"
                        placeholder="Masukkan jabatan" required>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block font-bold">Alamat</label>
                    <textarea name="address" id="address" rows="3" class="w-full border p-2 rounded"
                        placeholder="Masukkan alamat" required></textarea>
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label for="gender" class="block font-bold">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="w-full border p-2 rounded" required>
                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>

                <!-- Pendidikan -->
                <div>
                    <label for="pendidikan" class="block font-bold">Pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="w-full border p-2 rounded" required>
                        <option value="" disabled selected>-- Pilih Pendidikan --</option>
                        <option value="SLTA">SLTA</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>

                <!-- Tombol Simpan -->
                <div>
                    <button type="submit"
                        class="border border-black text-black font-bold py-2 px-4 rounded hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>