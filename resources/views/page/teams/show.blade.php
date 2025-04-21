<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Detail Tim - {{ $regist->team_name }}</h1>

        <p class="mb-2"><strong>Nama Kampung:</strong> {{ $regist->village_name }}</p>

        <h2 class="font-semibold mt-6 mb-2">Anggota Tim:</h2>
        <ul class="list-disc pl-6 text-gray-700">
            @foreach ($teams as $member)
                <li>{{ $member->name }} ({{ $member->age }} tahun)</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
