<x-app-layout>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $events->title }}</h1>
        
        <p class="text-gray-700 text-lg mb-4">
            {{ $events->description }}
        </p>
        
        <p class="text-sm text-gray-600 mb-6">
            📅 Tanggal Event: <span class="font-semibold">{{ \Carbon\Carbon::parse($events->event_date)->format('d M Y') }}</span>
        </p>

        <a href="{{ route('events.edit', $events->id) }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-200">
            📝 Daftar Tim
        </a>
        <a href="{{ route('events.teamsMembers', $events->id) }}"
            class="inline-block bg-purple-600 text-white px-4 py-2 mt-4 rounded hover:bg-purple-700 transition">
            📋 Lihat Daftar Tim Terdaftar
         </a>
    </div>
</x-app-layout>
