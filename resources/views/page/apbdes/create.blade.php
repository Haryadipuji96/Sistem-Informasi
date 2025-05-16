<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">➕ Tambah Data APBDES</h1>

        @if($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('apbdes.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="tahun" class="block text-gray-700 font-medium">Tahun Anggaran</label>
                <input type="number" name="tahun" id="tahun" required
                       class="w-full mt-1 border-gray-300 rounded-md shadow-sm"
                       value="{{ old('tahun') }}">
            </div>

            <!-- Hapus input jenis -->

            <div>
                <label for="kategori" class="block text-gray-700 font-medium">Kategori</label>
                <input type="text" name="kategori" id="kategori" required
                       class="w-full mt-1 border-gray-300 rounded-md shadow-sm"
                       value="{{ old('kategori') }}">
            </div>

            <div>
                <label for="jumlah" class="block text-gray-700 font-medium">Jumlah (Rp)</label>
                <input type="number" name="jumlah" id="jumlah" required
                       class="w-full mt-1 border-gray-300 rounded-md shadow-sm"
                       value="{{ old('jumlah') }}">
            </div>

            <div>
                <label for="keterangan" class="block text-gray-700 font-medium">Keterangan (Opsional)</label>
                <textarea name="keterangan" id="keterangan"
                          class="w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('keterangan') }}</textarea>
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
