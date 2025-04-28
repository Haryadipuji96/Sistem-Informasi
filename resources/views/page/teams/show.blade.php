<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-10 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">
            Detail Tim - {{ $regist->team_name }}
        </h1>

        <p class="text-lg text-gray-700 mb-4">
            <strong class="text-gray-800">Nama Kampung:</strong> {{ $regist->village_name }}
        </p>

        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <h2 class="font-semibold text-lg text-gray-800 mb-4">Anggota Tim:</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                @foreach ($teams as $member)
                    <li class="text-sm">
                        {{ $member->name }} ({{ $member->birth_date }})
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
