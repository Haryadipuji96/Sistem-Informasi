<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 p-8 bg-white rounded-xl shadow-xl">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">
            📅 {{ $events->title }}
        </h1>

        <p class="text-lg text-gray-700 mb-6">
            {{ $events->description }}
        </p>

        <p class="text-sm text-gray-600 mb-6">
            📅 Tanggal Event: <span class="font-semibold">{{ \Carbon\Carbon::parse($events->event_date)->format('d M Y') }}</span>
        </p>

        <div class="space-x-4">
            <a href="{{ route('events.edit', $events->id) }}"
               class="inline-block bg-sky-500 hover:bg-sky-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 hover:shadow-lg">
                📝 Daftar Tim
            </a>
            <a href="{{ route('events.teamsMembers', $events->id) }}"
               class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 mt-4 rounded-lg transition duration-200 hover:shadow-lg">
                📋 Lihat Daftar Tim Terdaftar
            </a>
        </div>
    </div>
</x-app-layout>
