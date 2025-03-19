<x-app-layout>
    <div class="bg-white min-h-screen">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
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
                    <img src="{{ asset('image/gambar.jpg') }}" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/balong.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/kebun.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
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
    </div>

    {{-- Halaman Berita --}}
    <div class="container-fluid px-4 px-md-5">
        <div class="text-start mb-5">
            <h4 class="display-5 fw-bold">Berita Terkini</h4>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <a href="/halaman-berita-1" class="card-link">
                        <div class="card h-100">
                            <!-- Gambar -->
                            <img src="{{ asset('image/kunjungan.jpg') }}" class="card-img-top img-fluid zoom-effect"
                                alt="...">
                            <!-- Konten teks -->
                            <div class="card-body">
                                <h5 class="card-title  font-bold">Desa Indrajaya mendapat kunjungan dari Bapa Sekretaris
                                    Daerah
                                    Kabupaten Tasikmalaya
                                </h5>
                                <p class="card-text"><small class="text-muted">17 Januari 2025</small></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/halaman-berita-2" class="card-link">
                        <div class="card h-100">
                            <!-- Gambar -->
                            <img src="{{ asset('image/Gerakan.jpg') }}" class="card-img-top img-fluid zoom-effect"
                                alt="...">
                            <!-- Konten teks -->
                            <div class="card-body">
                                <h5 class="card-title  font-bold">Gerakan Jum'at Bersih, Gotong Royong Masyarakat Desa
                                    Indrajaya bersama Muspika Kecamatan sukaratu, pembukaan akses jalan baru yang
                                    menghubungkan Kp. Palasari - Kp. Cicurug sawo</h5>
                                <p class="card-text"><small class="text-muted">30 Agustus 2024</small></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/halaman-berita-3" class="card-link">
                        <div class="card h-100">
                            <!-- Gambar -->
                            <img src="{{ asset('image/Berita.jpg') }}" class="card-img-top img-fluid zoom-effect"
                                alt="...">
                            <!-- Konten teks -->
                            <div class="card-body">
                                <h5 class="card-title font-bold">Kreasi Seni, Karnaval, dan Jampana dalam rangka HUT RI
                                    Ke-79 Desa Indrajaya</h5>

                                <p class="card-text"><small class="text-muted">17 Agustus 2024</small></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="/halaman-berita-4" class="card-link">
                        <div class="card h-100">
                            <!-- Gambar -->
                            <img src="{{ asset('image/Kunjungan2.jpg') }}" class="card-img-top img-fluid zoom-effect"
                                alt="...">
                            <!-- Konten teks -->
                            <div class="card-body">
                                <h5 class="card-title font-bold">Desa Indrajaya mendapat kunjungan dari dinas Parawisata
                                    Kabupaten Tasikmalaya, guna meninjau Assessment Destinasi Wisata Desa Indrajaya</h5>

                                <p class="card-text"><small class="text-muted">26 Juni 2022</small></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Efek Zoom pada Gambar */
        .zoom-effect {
            transition: transform 0.3s ease;
            /* Animasi halus */
            overflow: hidden;
            /* Memastikan gambar tidak melampaui batas kartu */
        }

        .zoom-effect:hover {
            transform: scale(1.1);
            /* Membesarkan gambar sebesar 10% */
        }
    </style>
</x-app-layout>
