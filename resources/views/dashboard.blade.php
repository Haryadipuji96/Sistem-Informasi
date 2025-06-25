<x-app-layout>
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="fixed top-8 right-8 transform transition-all duration-500 ease-in-out 
            bg-green-600 text-white px-8 py-4 rounded-lg shadow-xl z-50 
            ring-2 ring-green-400 ring-opacity-50">
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-lg font-semibold">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <section class="relative bg-cover bg-center h-[450px] text-white flex items-center"
        style="background-image: url('{{ asset('image/kebun.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-25"></div>
        <div class="relative z-10 w-full">
            <div class="max-w-6xl mx-auto px-6">
                <div class="md:w-1/2" data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-4">
                        Selamat Datang di <br> Website Desa Indrajaya
                    </h1>
                    <p class="text-lg md:text-xl mb-6">
                        Tempat untuk mendapatkan informasi, layanan, dan potensi terbaik dari desa kita tercinta.
                    </p>
                    <a href="/TentangDesa"
                        class="inline-block border-2 border-white hover:bg-orange-500 hover:text-white font-semibold py-3 px-6 rounded-lg transition duration-300">
                        Profil Desa
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Tentang Desa --}}
    <section class="py-20 bg-[#fffdf8]" data-aos="fade-up" data-aos-duration="1500">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Konten Sambutan --}}
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Sambutan Kepala Desa</h2>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Kami menyambut Anda dengan hangat di Website Resmi Desa Indrajaya.
                        Situs ini dibuat sebagai sarana untuk menyampaikan informasi secara cepat dan transparan
                        kepada masyarakat. Semoga keberadaan website ini dapat memberikan manfaat serta mendekatkan
                        pelayanan publik.
                    </p>
                </div>

                {{-- Gambar Kepala Desa --}}
                <div class="overflow-hidden rounded-xl shadow-lg">
                    <img src="{{ asset('image/balong.jpg') }}" alt="Kepala Desa"
                        class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
                </div>
            </div>
        </div>
    </section>

    {{-- Ringkasan Statistik --}}
    <div class="row text-center mb-5 mt-5">
        @php
            $summaryCards = [
                [
                    'label' => 'Jumlah Penduduk',
                    'value' => $total . ' jiwa',
                    'icon' => 'bi-people-fill',
                    'color' => 'primary',
                ],
                ['label' => 'Laki-laki', 'value' => $laki_laki, 'icon' => 'bi-gender-male', 'color' => 'info'],
                ['label' => 'Perempuan', 'value' => $perempuan, 'icon' => 'bi-gender-female', 'color' => 'danger'],
                [
                    'label' => 'Kepala Keluarga',
                    'value' => $kepala_keluarga,
                    'icon' => 'bi-person-badge',
                    'color' => 'success',
                ],
            ];
        @endphp

        @foreach ($summaryCards as $card)
            <div class="col-md-8 col-lg-3">
                <div class="card border-0 shadow-sm h-100 summary-hover transition">
                    <div class="card-body py-4">
                        <div class="mb-2 text-{{ $card['color'] }}">
                            <i class="bi {{ $card['icon'] }} fs-3"></i>
                        </div>
                        <h6 class="text-muted mb-1">{{ $card['label'] }}</h6>
                        <h4 class="text-{{ $card['color'] }} fw-bold">{{ $card['value'] }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Card Chart Statistik --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white text-center">
                    <h5 class="mb-0">
                        Statistik Penduduk Bulan
                        {{ \Carbon\Carbon::parse($statistik?->created_at)->translatedFormat('F Y') ?? '-' }}
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="pendudukChart" style="max-height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Load Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('pendudukChart').getContext('2d');
            const pendudukChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan', 'Kepala Keluarga'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [
                            {{ $laki_laki }},
                            {{ $perempuan }},
                            {{ $kepala_keluarga ?? 0 }}
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(255, 206, 86, 0.7)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: {
                                    size: 14
                                }
                            }
                        },
                        title: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        });
    </script>

    {{-- Halaman Berita --}}
    <section class="py-20 bg-white" data-aos="fade-up" data-aos-duration="1800">
        <div class="max-w-6xl mx-auto px-6">
            {{-- Judul --}}
            <h2 class="text-3xl font-bold text-gray-800 mb-8">📰 Berita Terkini</h2>

            {{-- Wrapper scroll horizontal --}}
            <div class="overflow-x-auto">
                <div id="beritaScroller" class="flex gap-6 w-max pb-2">
                    @foreach ($berita as $b)
                        <div class="flex-shrink-0 w-[270px]">
                            <a href="{{ route('berita.show', $b->id) }}" class="block">
                                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                                    {{-- Gambar --}}
                                    @if ($b->image)
                                        <img src="{{ asset('image/' . $b->image) }}" alt="Berita {{ $b->title }}"
                                            class="w-full h-44 object-cover rounded-t-xl zoom-effect">
                                    @else
                                        <img src="{{ asset('image/default-image.jpg') }}" alt="Default Image"
                                            class="w-full h-44 object-cover rounded-t-xl zoom-effect">
                                    @endif

                                    {{-- Konten --}}
                                    <div class="p-4">
                                        <h5 class="text-gray-800 font-semibold text-base leading-tight">
                                            {{ $b->title }}
                                        </h5>
                                        <p class="text-sm text-gray-500 mt-2">
                                            <small>
                                                {{ $b->tgl_berita ? date('d-m-Y H:i', strtotime($b->tgl_berita)) . ' WIB' : 'Tanggal tidak tersedia' }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Auto Scroll Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scroller = document.getElementById('beritaScroller');
            let scrollAmount = 0;

            function autoScroll() {
                if (!scroller) return;

                scrollAmount += 0.4; // Ubah ke 0.6 jika ingin lebih cepat
                scroller.scrollLeft = scrollAmount;

                if (scrollAmount >= scroller.scrollWidth - scroller.clientWidth) {
                    scrollAmount = 0;
                }

                requestAnimationFrame(autoScroll);
            }

            autoScroll();
        });
    </script>

    {{-- CSS tambahan --}}
    <style>
        .zoom-effect {
            transition: transform 0.3s ease;
        }

        .zoom-effect:hover {
            transform: scale(1.05);
        }

        #beritaScroller {
            scroll-behavior: smooth;
        }
    </style>

</x-app-layout>
