<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">
            📋 Daftar Tim - {{ $event->title }}
        </h1>

        @if ($teams->isEmpty())
            <div class="text-gray-500 text-center">
                Belum ada tim yang mendaftar untuk event ini.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-200 rounded-lg shadow-lg">
                    <thead class="bg-white text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-gray-700 font-semibold">Nama Tim</th>
                            <th class="px-6 py-4 text-left text-gray-700 font-semibold">Nama Kampung</th>
                            <th class="px-6 py-4 text-left text-gray-700 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr class="border-t hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $team->team_name }}</td>
                                <td class="px-6 py-4">{{ $team->village_name }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('teams.show', $team->id) }}"
                                       class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                                        🔍 Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
