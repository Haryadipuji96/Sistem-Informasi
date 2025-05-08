<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visi Misi') }}
        </h2>
    </x-slot>

    {{-- Section Visi Misi --}}
    <section class="container mx-auto mt-10 px-6 py-12">
        <div class="bg-white rounded-lg shadow-xl p-8">
            <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-10" data-aos="fade-up" data-aos-duration="1000">
                🌟 Visi & Misi Desa Indrajaya
            </h1>

            {{-- Visi --}}
            <div class="mb-10" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-2xl font-semibold text-gray-800 mb-3">Visi</h2>
                <p class="text-lg text-gray-700 leading-relaxed italic border-l-4 border-orange-500 pl-4">
                    "INDRAJAYA MENJADI DESA YANG JUJUR, ADIL, BERBUDAYA, BERAKHLAK DAN SEJAHTERA"
                </p>
            </div>

            {{-- Misi --}}
            <div data-aos="fade-left" data-aos-duration="1000">
                <h2 class="text-2xl font-semibold text-gray-800 mb-3">Misi</h2>
                <ul class="list-disc pl-5 space-y-3 text-gray-700 text-lg leading-relaxed">
                    <li>Mewujudkan pemerintahan desa yang jujur dan berwibawa dalam pengambilan keputusan yang cepat dan tepat.</li>
                    <li>Mengedepankan kejujuran dan musyawarah mufakat dalam kehidupan sehari-hari.</li>
                    <li>Meningkatkan profesionalisme perangkat desa dan mengaktifkan seluruh perangkat dalam pelayanan masyarakat.</li>
                    <li>Mewujudkan sarana dan prasarana desa yang memadai.</li>
                    <li>Mewujudkan perekonomian yang maju dan meningkatkan kesejahteraan masyarakat.</li>
                    <li>Memfasilitasi pelayanan kesehatan masyarakat desa secara maksimal.</li>
                    <li>Meningkatkan kehidupan masyarakat desa dalam segi keagamaan dan kebudayaan secara dinamis.</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- AOS Script (jika belum dimasukkan di layout) --}}
    @push('scripts')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    @endpush
</x-app-layout>
