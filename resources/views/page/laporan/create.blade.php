<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-12 bg-white shadow-lg rounded-xl">
        <h1 class="text-3xl font-bold mb-8 text-indigo-700 text-center flex items-center justify-center gap-2">
            📝 Tambah Laporan APBDES
        </h1>

        {{-- Notifikasi --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('laporan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                <select name="kategori" id="kategori"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Pendapatan">Pendapatan</option>
                    <option value="Belanja">Belanja</option>
                    <option value="Pembiayaan">Pembiayaan</option>
                </select>
            </div>

            <div>
                <label for="uraian" class="block text-sm font-semibold text-gray-700 mb-1">Uraian</label>
                <input type="text" name="uraian" id="uraian" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Contoh: Dana Desa Tahap I">
            </div>

            <div>
                <label for="jumlah" class="block text-sm font-semibold text-gray-700 mb-1">Jumlah (Rp)</label>
                <input type="number" name="jumlah" id="jumlah" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Contoh: 50000000" min="1">
            </div>

            <div>
                <label for="tahun" class="block text-sm font-semibold text-gray-700 mb-1">Tahun</label>
                <input type="number" name="tahun" id="tahun" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Contoh: 2025" min="2000" max="2099" step="1">
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
                    💾 Simpan Laporan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
