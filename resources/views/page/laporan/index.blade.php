<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10" id="laporan-area">
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
                    <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>{{ $year }}
                    </option>
                @endforeach
            </select>
        </form>

        {{-- Tombol Aksi --}}
        <div class="mb-6 flex flex-wrap gap-2 justify-between">
            <a href="{{ route('laporan.create') }}"
                class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600 transition">
                ➕ Tambah Laporan Baru
            </a>
            <div class="flex gap-2">
                <button onclick="printLaporan()"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    🖨️ Cetak Laporan
                </button>
                <button onclick="downloadPDF()"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                    📄 Download PDF
                </button>
            </div>
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

    {{-- Script Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Script html2pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        // Chart.js setup
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
                        '#8B5CF6' // Ungu Muda
                    ],
                    borderRadius: 6
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
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

        // Fungsi untuk Cetak Laporan
        function printLaporan() {
            var laporanArea = document.getElementById('laporan-area').cloneNode(true);
            var canvas = document.getElementById('apbdesChart');
            var imgData = canvas.toDataURL("image/png");

            // Ganti canvas dengan gambar
            var newImg = document.createElement("img");
            newImg.src = imgData;
            newImg.className = canvas.className;
            laporanArea.querySelector('canvas').replaceWith(newImg);

            // Buka jendela baru untuk print
            var printWindow = window.open('', '', 'height=1000, width=800');
            printWindow.document.write('<html><head><title>Cetak Laporan</title>');
            printWindow.document.write(
                '<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
            printWindow.document.write('</head><body class="p-6">');
            printWindow.document.write(laporanArea.innerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            setTimeout(() => {
                printWindow.print();
                printWindow.close();
            }, 500); // Tunggu sedikit agar gambar ter-load
        }

        // Fungsi untuk Download PDF
        function downloadPDF() {
            const laporanArea = document.getElementById('laporan-area');

            // Clone seluruh area
            const cloneArea = laporanArea.cloneNode(true);

            // Tangkap canvas chart
            const canvas = laporanArea.querySelector('canvas');
            const imgData = canvas.toDataURL('image/png');

            // Ganti canvas di clone dengan gambar
            const newImg = document.createElement('img');
            newImg.src = imgData;
            newImg.style.width = canvas.style.width;
            newImg.style.height = canvas.style.height;
            newImg.className = canvas.className;

            // Replace canvas with image
            const canvasInClone = cloneArea.querySelector('canvas');
            if (canvasInClone) {
                canvasInClone.parentNode.replaceChild(newImg, canvasInClone);
            }

            // Pastikan semua element di clone lengkap (termasuk tabel)
            var opt = {
                margin: 0.5,
                filename: 'laporan-apbdes.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            html2pdf().set(opt).from(cloneArea).save();
        }
    </script>
</x-app-layout>
