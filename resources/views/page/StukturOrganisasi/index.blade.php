<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('StukturOrganisasi') }}
        </h2>
    </x-slot>

<section class="container mx-auto mt-8 p-6 bg-white shadow-md rounded-md">
    <h2 class="text-2xl font-bold text-center mb-4">Profil Kepala Desa</h2>
    <div class="flex flex-col md:flex-row items-center">
        <img src="{{ asset('image/Foto saya.png') }}" alt="Kepala Desa" class="w-full max-w-lg h-96 object-cover">
        <div class="ml-6 text-center md:text-left">
            <h3 class="text-xl font-semibold">Drs. Puji Haryadi S.kom</h3>
            <p class="text-gray-600">Kepala Desa Indrajaya</p>
            <p class="mt-2">Assalamualaikum Warahmatullahi Wabarakatuh,</p>
               <p> Puji syukur kita panjatkan kehadirat Allah Yang Maha Esa,karena atas Rahmat dan Hidayah Nya saat ini kita telah menghadirkan Website resmi milik Pemerintah Kota Tasikmalaya dengan alamat www.tasikmalayakota.go.id. 
                Dimana dengan diresmikannya Website Kota Tasikmalaya secara otomatis Kota Tasikmalaya telah ikut hadir ke tengah dunia Internasional melalui pemanfaatan sarana Teknologi Informatika.
                Saya menyambut baik adanya Website Kota Tasikmalaya yang berisi mengenai potensi Kota Tasikmalaya dari berbagai bidang. 
                Mulai dari bidang Ekonomi, Pendidikan,Kesehatan, Pariwisata, dll. 
                Semoga dengan adanya Website ini, Kota Tasikmalaya akan terpublikasi ke tengah masyarakat serta dunia Internasional. 
                Selain sebagai promosi daerah kepada pihak luar, melalui website ini masyarakat juga bisa mengakses informasi mengenai Kota Tasikmalaya serta layanan Pemerintah Kota Tasikmalaya yang dibutuhkan masyarakat. Selanjutnya, hadirnya Website ini merupakan salah satu langkah yang ditempuh Pemerintah Kota Tasikmalaya dalam rangka Pengembangan Teknologi Informatika di Kota Tasikmalaya.
                Kami mengharapkan kepada masyarakat dimanapun berada silahkan mengakses Website ini.Saya mengharapkan Website ini akan bermanfaat bagi masyarakat luas serta bagi Pemerintah Kota Tasikmalaya sendiri.</p>
                
               <p> Wabillahi Taufik Walhhidayah</p>
                
               <p> Wassalamualaikum Warahmatulahi Wabarakatuh.</p>
        </div>
    </div>
</section>
</x-app-layout>