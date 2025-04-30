<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 sm:p-8 bg-white shadow-md rounded-lg">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Daftar Kritik dan Saran</h1>
            <p class="text-gray-500 text-sm">Halaman ini menampilkan semua kritik dan saran yang telah dikirimkan oleh warga.</p>
        </div>

        <!-- Menampilkan Kritik dan Saran -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Kritik/Saran</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kritikSaran as $kritik)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $kritik->nama }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $kritik->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $kritik->isi }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $kritik->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
