<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            📋 Daftar Tim - {{ $event->title }}
        </h1>

        @if ($teams->isEmpty())
            <div class="text-gray-500 text-center">
                Belum ada tim yang mendaftar untuk event ini.
            </div>
        @else
            <table class="w-full table-auto border border-gray-200 rounded-xl shadow">
                <thead>
                    <tr class="bg-blue-50 text-left">
                        <th class="px-4 py-3 text-gray-700 font-semibold">Nama Tim</th>
                        <th class="px-4 py-3 text-gray-700 font-semibold">Nama Kampung</th>
                        <th class="px-4 py-3 text-gray-700 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ $team->team_name }}</td>
                            <td class="px-4 py-3">{{ $team->village_name }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('teams.show', $team->id) }}"
                                   class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                                    🔍 Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
