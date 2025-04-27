<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">📊 Laporan Keuangan APBDES</h1>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        {{-- Filter Tahun --}}
        <form method="GET" action="{{ route('laporan.index') }}" class="mb-6 flex items-center justify-end space-x-2">
            <label for="tahun" class="text-sm text-gray-700">Filter Tahun: </label>
            <select name="tahun" id="tahun" onchange="this.form.submit()" class="border rounded px-3 py-1 text-sm">
                <option value="">Semua</option>
                @foreach ($allYears as $year)
                    <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </form>

        {{-- Tombol Aksi --}}
        <div class="mb-6 flex justify-between">
            <a href="{{ route('laporan.create') }}" class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600 transition">
                ➕ Tambah Laporan Baru
            </a>
            <button onclick="window.print()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                🖨️ Cetak Laporan
            </button>
        </div>

        {{-- Grafik --}}
        <div class="bg-white p-6 rounded-lg shadow mb-10">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Visualisasi APBDES</h2>
            <canvas id="apbdesChart" height="100"></canvas>
        </div>

        {{-- Tabel Laporan --}}
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full table-auto text-sm text-gray-700">
                <thead class="bg-orange-50 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Uraian</th>
                        <th class="px-4 py-2 text-right">Jumlah (Rp)</th>
                        <th class="px-4 py-2 text-center">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $report->kategori }}</td>
                            <td class="px-4 py-2">{{ $report->uraian }}</td>
                            <td class="px-4 py-2 text-right">{{ number_format($report->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-center">{{ $report->tahun }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('apbdesChart').getContext('2d');
        const apbdesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Jumlah (Rp)',
                    data: {!! json_encode($chartData) !!},
                    backgroundColor: [
                        '#1D4ED8', // Biru Laut
                        '#10B981', // Hijau Cerah
                        '#F59E0B', // Kuning Terang
                        '#EC4899', // Merah Jambu
                        '#F97316', // Oranye Terang
                        '#8B5CF6'  // Ungu Muda
                    ],
                    borderRadius: 6
                }]
            },
            options: {
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: context => 'Rp ' + context.formattedValue
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            callback: value => 'Rp ' + value.toLocaleString('id-ID')
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
