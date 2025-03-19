<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PROFILE KEPALA DESA') }}
        </h2>
    </x-slot>

    {{-- BAGIAN PROFILE --}}
    <section class="container mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
        <div class="flex flex-col md:flex-row items-center md:items-start">
            <!-- Foto Kepala Desa -->
            <img src="{{ asset('image/Kades.png') }}" alt="Kepala Desa"
                class="w-30 max-w-lg h-[500px] md:h-[600px] object-cover rounded-lg shadow-lg">

            <!-- Informasi Kepala Desa -->
            <div class="ml-6 flex-1 text-justify">
                <h3 class="text-xl font-semibold text-start md:text-left">Yudi Sutiana</h3>
                <p class="text-black-600 text-start md:text-left font-bold">Kepala Desa Indrajaya</p>
                <p class="mt-2">Assalamualaikum Warahmatullahi Wabarakatuh,</p>
                <p>Puji syukur kita panjatkan kehadirat Allah Yang Maha Esa, karena atas Rahmat dan Hidayah-Nya saat ini
                    kita telah menghadirkan Website resmi milik Pemerintah Desa Indrajaya dengan alamat <a
                        href="https://www.indrajayadesa.go.id"
                        class="text-blue-600 underline">www.indrajayadesa.go.id</a>.
                    Dengan diresmikannya Website Desa Indrajaya, kami berharap Desa Indrajaya dapat lebih dikenal oleh
                    masyarakat luas, baik di tingkat lokal maupun nasional, melalui pemanfaatan sarana Teknologi
                    Informasi.</p>
                <p>Saya menyambut baik adanya Website Desa Indrajaya yang berisi informasi mengenai potensi Desa
                    Indrajaya dari berbagai aspek. Mulai dari bidang pertanian, perikanan, pariwisata, pendidikan,
                    hingga budaya lokal yang menjadi ciri khas Desa Indrajaya.
                    Semoga dengan adanya Website ini, Desa Indrajaya akan semakin terpublikasi kepada masyarakat luas
                    serta menjadi daya tarik bagi wisatawan dan investor.</p>
                <p>Selain sebagai media promosi daerah kepada pihak luar, melalui website ini masyarakat juga dapat
                    mengakses informasi penting mengenai Desa Indrajaya, seperti program pembangunan, layanan
                    administrasi, serta berita terkini seputar kegiatan desa.
                    Hadirnya Website ini merupakan salah satu langkah yang ditempuh Pemerintah Desa Indrajaya dalam
                    rangka meningkatkan transparansi informasi dan mempermudah akses layanan bagi masyarakat.</p>
                <p>Kami mengharapkan kepada seluruh masyarakat Desa Indrajaya dan masyarakat luas dimanapun berada untuk
                    turut mengakses Website ini.
                    Saya berharap Website ini akan bermanfaat bagi masyarakat luas serta menjadi sarana untuk memajukan
                    Desa Indrajaya menuju kemajuan yang lebih baik.</p>
                <p>Wabillahi Taufik Walhidayah</p>
                <p>Wassalamualaikum Warahmatullahi Wabarakatuh.</p>
            </div>
        </div>
    </section>

    {{-- BAGIAN ACCORDION --}}
    <div class="container mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6 space-y-6">
                <!-- Accordion -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none rounded-t-lg transition-all duration-300">
                        <h3 class="font-semibold text-lg text-left">PROFILE</h3>
                        <svg :class="open ? 'transform rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transition-transform duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.500ms
                        class="px-6 py-4 bg-gray-50 border-t border-gray-200 transition-all duration-500">
                        <p>Nama: YUDI SUTIANA</p>
                        <p>Alamat: KP. CIMALA RT. 002 RW. 001 DESA INDRAJAYA, KECAMATAN SUKARATU KABUPATEN TA SIKMALAYA </p>
                        <P>Tempat, tanggal lahir: TASIKMALAYA, 27-04-1961</P>
                        <p>Email: yudisutiana90@gmail.com</p>
                    </div>
                </div>

                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none rounded-t-lg transition-all duration-300">
                        <h3 class="font-semibold text-lg text-left">RIWAYAT PENDIDIKAN</h3>
                        <svg :class="open ? 'transform rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transition-transform duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.500ms
                        class="px-6 py-4 bg-gray-50 border-t border-gray-200 transition-all duration-500">
                        <ul class="list-disc pl-5 space-y-2">
                            <li><strong>SD GANDASOLI , GARUT</strong> (TAHUN 1974)</li>
                            <li><strong>SMP CISOMPET, GARUT</strong> ( TAHUN 1977)</li>
                            <li><strong>SMEA TASIKMALAYA </strong> ( TAHUN 1982)</li>
                        </ul>
                    </div>
                </div>

                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none rounded-t-lg transition-all duration-300">
                        <h3 class="font-semibold text-lg text-left">PENGALAMAN ORGANISASI</h3>
                        <svg :class="open ? 'transform rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transition-transform duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.500ms
                        class="px-6 py-4 bg-gray-50 border-t border-gray-200 transition-all duration-500">
                        <ul class="list-disc pl-5 space-y-2">
                            <li><strong>Ketua OSIS SMA Negeri 1 Jakarta</strong> (2017 - 2018)</li>
                            <li><strong>Anggota Himpunan Mahasiswa Informatika</strong> (2019 - 2021)</li>
                        </ul>
                    </div>
                </div>

                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center px-6 py-4 bg-gray-100 hover:bg-gray-200 focus:outline-none rounded-t-lg transition-all duration-300">
                        <h3 class="font-semibold text-lg text-left">RIWAYAT PEKERJAAN</h3>
                        <svg :class="open ? 'transform rotate-180' : ''"
                            class="w-5 h-5 text-gray-600 transition-transform duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.500ms
                        class="px-6 py-4 bg-gray-50 border-t border-gray-200 transition-all duration-500">
                        <ul class="list-disc pl-5 space-y-2">
                            <li><strong>Ketua BPD periode</strong> ( 2014 - 2019)</li>
                            <li><strong> Pengganti Antar Waktu  (PAW) Kepala Desa Indrajaya periode </strong> (2018-  2019)</li>
                            <li><strong>Kepala Desa  periode</strong> ( 2019 - 2027)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
