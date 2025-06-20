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

    <div class="bg-white min-h-screen">
        {{-- Carousel --}}
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up"
            data-aos-duration="1200">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('image/Gambar17.jpg') }}" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 data-aos="fade-left" data-aos-duration="1000">Desa Indrajaya</h5>
                        <p data-aos="fade-right" data-aos-duration="1000">Keindahan Alam dan Tradisi yang Menyatu,
                            Tempat Kedamaian dan Kebudayaan yang Tak Tergantikan.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/balong.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 data-aos="fade-left" data-aos-duration="1000">Keindahan Alam Desa</h5>
                        <p data-aos="fade-right" data-aos-duration="1000">Menjelajahi pesawahan yang subur dan aliran
                            sungai yang jernih, serta menikmati udara sejuk khas kaki Gunung Galunggung.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/kebun.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 data-aos="fade-right" data-aos-duration="1000">Tradisi dan Budaya Desa</h5>
                        <p data-aos="fade-left" data-aos-duration="1000">Melestarikan adat istiadat dan tradisi leluhur
                            dalam kehidupan bermasyarakat, dengan peralatan tradisional seperti anyaman bambu dan cara
                            bercocok tanam yang diwariskan turun-temurun.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


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
                    [
                        'label' => 'Perempuan',
                        'value' => $perempuan,
                        'icon' => 'bi-gender-female',
                        'color' => 'danger',
                    ],
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


        {{-- Section Tentang Desa --}}
        <section class="py-20 bg-white" data-aos="fade-up" data-aos-duration="1500">
            <div class="max-w-6xl mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    {{-- Gambar --}}
                    <div class="overflow-hidden rounded-xl shadow-lg">
                        <img src="{{ asset('image/balong.jpg') }}" alt="Tentang Desa"
                            class="w-full h-80 object-cover hover:scale-105 transition-transform duration-300">
                    </div>

                    {{-- Konten --}}
                    <div>
                        <h2 class="text-4xl font-bold text-gray-800 mb-6">Tentang Desa Indrajaya</h2>
                        <p class="text-gray-700 text-lg mb-4 leading-relaxed">
                            Desa Indrajaya terletak di Kecamatan Sukaratu, Kabupaten Tasikmalaya. Desa ini dikenal
                            dengan keindahan alamnya, kekayaan budaya, dan semangat gotong royong warganya.
                        </p>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Berbagai potensi desa seperti pertanian, kerajinan, serta wisata alam terus dikembangkan
                            untuk kesejahteraan masyarakat. Mari bersama-sama membangun Desa Indrajaya menjadi desa yang
                            maju, mandiri, dan berdaya saing.
                        </p>
                        <div class="mt-6">
                            <a href="/TentangDesa"
                                class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-300">
                                ✨ Lihat Profil Desa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Halaman Berita --}}
        <div class="container-fluid px-4 px-md-5 py-10" data-aos="fade-up" data-aos-duration="1800">
            <div class="text-start mb-5">
                <h4 class="display-5 fw-bold text-gray-800">📰 Berita Terkini</h4>

                {{-- Wrapper Scroll Horizontal --}}
                <div class="overflow-x-auto mt-4">
                    <div class="flex gap-4 w-max pb-2">
                        @foreach ($berita as $b)
                            <div class="flex-shrink-0" style="width: 250px;">
                                <a href="{{ route('berita.show', $b->id) }}" class="card-link text-decoration-none">
                                    <div class="card h-100 shadow-md hover:shadow-lg transition duration-300">
                                        {{-- Gambar Berita --}}
                                        @if ($b->image)
                                            <img src="{{ asset('image/' . $b->image) }}"
                                                class="card-img-top img-fluid zoom-effect"
                                                alt="Berita {{ $b->title }}">
                                        @else
                                            <img src="{{ asset('image/default-image.jpg') }}"
                                                class="card-img-top img-fluid zoom-effect" alt="Berita Default">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title font-bold text-dark">{{ $b->title }}</h5>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    @if ($b->tgl_berita)
                                                        {{ date('d-m-Y H:i', strtotime($b->tgl_berita)) }} WIB
                                                    @else
                                                        Tanggal tidak tersedia
                                                    @endif
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
        </div>
    </div>

    {{-- CSS tambahan --}}
    <style>
        /* Efek Zoom pada Gambar */
        .zoom-effect {
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .zoom-effect:hover {
            transform: scale(1.1);
        }
    </style>
</x-app-layout>
