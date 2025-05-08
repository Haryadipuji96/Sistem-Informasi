<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tentang Desa') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <!-- Hero Section with Image and Title -->
        <div class="relative h-72 sm:h-96 overflow-hidden rounded-lg shadow-lg" data-aos="fade-up" data-aos-duration="1200">
            <img src="{{ asset('image/kebun.jpg') }}" alt="Desa Indrajaya" class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="text-center">
                    <h2 class="text-white text-3xl sm:text-4xl font-bold px-4">
                        Desa INDRAJAYA
                    </h2>
                    <h2 class="text-white text-2xl sm:text-3xl font-semibold px-4 mt-2 sm:mt-3 ml-4 sm:ml-6">
                        To Be Smart Village
                    </h2>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="mt-10 w-full px-4 ml-4 sm:ml-6" data-aos="fade-up" data-aos-duration="1200">
            <h3 class="text-xl sm:text-2xl font-semibold mb-4 text-start sm:text-left">
                TENTANG DESA INDRAJAYA
            </h3>
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base" style="text-align: justify;">
                Desa Indrajaya yang berada diwilayah kaki Gunung Galunggung dengan luas 326 Ha terdiri
                dari daratan, pesawahan, kolam dan aliran aliran sungai yang memiliki sumber mata air yang
                jernih, Nama Indrajaya diambil dari nama tokoh yang merupakan salah seorang anak Bupati
                Kuningan yang berpindah ke Kabupaten Tasikmalaya yang bernama INDRAJAYA DISASTRA.
                Untuk mengenang tokoh tersebut maka dijadikanlah nama Desa Yaitu INDRAJAYA, Desa
                Indrajaya merupakan sebuah desa pemekaran dari Desa Sukaratu Pada Tahun 1980, Desa
                Indrajaya senantiasa melestarikan adat istiadat tradisi dan budaya leluhur baik dalam
                kehidupan bermasyarakat, bercocok tanam dan sebagainya hal ini dibuktikan dengan masih
                adanya para petani yang menggarap ladang dengan cara-cara tradisional, dan masih terdapat
                perabotan dari bahan alami seperti anyaman bambu.
            </p>
        </div>

        <div class="mt-10 w-full px-4 ml-4 sm:ml-6" data-aos="fade-up" data-aos-duration="1200">
            <h3 class="text-xl sm:text-2xl font-semibold mb-4 text-start sm:text-left">
                KONDISI GEOGRAFIS
            </h3>

            <!-- Paragraf Deskripsi -->
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base mb-6" style="text-align: justify;">
                Desa Indrajaya merupakan salah satu Desa di Kecamatan Sukaratu yang
                mempunyai luas wilayah 326 Ha, yang terdiri dari :
            </p>

            <!-- Daftar Penggunaan Lahan -->
            <div class="mb-6" data-aos="fade-up" data-aos-duration="1200">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Penggunaan Lahan:</h4>
                <ul class="list-disc list-inside text-gray-700 text-sm sm:text-base">
                    <li>Tanah Pemukiman: 95 Ha.</li>
                    <li>Tanah Pesawahan: 205 Ha.</li>
                    <li>Kolam/Empang: 26 Ha.</li>
                </ul>
            </div>

            <!-- Deskripsi Geografis -->
            <div data-aos="fade-up" data-aos-duration="1200">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Dan secara Geografis Desa Indrajaya berada di :</h4>
                <dl class="space-y-2 text-gray-700 text-sm sm:text-base">
                    <div>
                        <dt class="font-medium text-gray-900 inline">Ketinggian dari permukaan laut:</dt>
                        <dd class="inline">330 Mdpl</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 inline">Curah Hujan:</dt>
                        <dd class="inline">1600 Mm</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 inline">Suhu Rata-Rata:</dt>
                        <dd class="inline">32°C</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 inline">Bentuk Wilayah:</dt>
                        <dd class="inline">Datar</dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="mt-10 w-full px-4 ml-4 sm:ml-6" data-aos="fade-up" data-aos-duration="1200">
            <h3 class="text-xl sm:text-2xl font-semibold mb-4 text-start sm:text-left">
                ADMINISTRASI DESA INDRAJAYA
            </h3>

            <!-- Paragraf Deskripsi -->
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base mb-6" style="text-align: justify;">
                Secara administrasi, Desa Indrajaya terdiri dari 3 Kewilayahan, yang meliputi 3 RW dan 21 RT. Berikut
                adalah batas-batas wilayah Desa Indrajaya:
            </p>

            <!-- Daftar Batas Wilayah -->
            <div class="mb-6" data-aos="fade-up" data-aos-duration="1200">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Batas Wilayah:</h4>
                <ul class="list-disc list-inside text-gray-700 text-sm sm:text-base space-y-1">
                    <li><strong>Sebelah Utara:</strong> Desa Cisayong, Kecamatan Cisayong</li>
                    <li><strong>Sebelah Timur:</strong> Desa Sukagalih, Kecamatan Sukaratu</li>
                    <li><strong>Sebelah Selatan:</strong> Desa Sukaratu, Kecamatan Sukaratu</li>
                    <li><strong>Sebelah Barat:</strong> Desa Santanamekar, Kecamatan Cisayong</li>
                </ul>
            </div>

            <!-- Informasi Jarak Tempuh -->
            <div class="mb-6" data-aos="fade-up" data-aos-duration="1200">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">Letak Wilayah:</h4>
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base mb-4" style="text-align: justify;">
                    Letak wilayah Desa Indrajaya dari Ibu Kota Kecamatan berada di sebelah timur laut. Berikut adalah
                    rincian jarak tempuh:
                </p>
                <dl class="space-y-2 text-gray-700 text-sm sm:text-base">
                    <div>
                        <dt class="font-medium text-gray-900 inline">Ke Ibu Kota Kecamatan:</dt>
                        <dd class="inline">1,5 Km (waktu tempuh 15 menit)</dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900 inline">Ke Ibu Kota Kabupaten:</dt>
                        <dd class="inline">10 Km (waktu tempuh 45 menit)</dd>
                    </div>
                </dl>
            </div>

            <!-- Informasi Tambahan -->
            <div data-aos="fade-up" data-aos-duration="1200">
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base" style="text-align: justify;">
                    Untuk informasi lebih lanjut mengenai letak geografis dan luas wilayah Desa Indrajaya, dapat dilihat
                    pada gambar 1 (Peta Administrasi Desa Indrajaya) dan tabel 1.1 (Luas Wilayah serta Jumlah RW dan RT
                    pada setiap Kedusunan di Desa Indrajaya).
                </p>
            </div>
        </div>
    </div>

    {{-- Peta Desa --}}
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-center mb-6" data-aos="fade-up" data-aos-duration="1200">Peta Desa Indrajaya</h1>

        <!-- Container untuk peta -->
        <div id="map" class="w-full sm:max-w-[600px] md:max-w-[800px] h-[300px] sm:h-[400px] mx-auto rounded-lg shadow-md" data-aos="fade-up" data-aos-duration="1200"></div>
    </div>

    <script>
        // Inisialisasi peta
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-7.2625, 108.136389], 13); // Koordinat Desa Indrajaya

            // Tambahkan tile layer (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Tambahkan marker untuk Desa Indrajaya
            var indrajayaMarker = L.marker([-7.2625, 108.136389]).addTo(map);
            indrajayaMarker.bindPopup("<b>Desa Indrajaya</b><br>Koordinat: -7.2625, 108.136389").openPopup();
        });
    </script>
</x-app-layout>
