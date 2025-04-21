<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            📝 Pendaftaran Tim - {{ $event->title }}
        </h1>

        <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Nama Kampung -->
            <div>
                <label for="village_name" class="block font-medium text-gray-700 mb-1">Nama Kampung</label>
                <input type="text" id="village_name" name="village_name"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Nama Tim -->
            <div>
                <label for="team_name" class="block font-medium text-gray-700 mb-1">Nama Tim</label>
                <input type="text" id="team_name" name="team_name"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Kontak Person -->
            <div>
                <label for="contact_person" class="block font-medium text-gray-700 mb-1">Kontak Person</label>
                <input type="text" id="contact_person" name="contact_person"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <!-- Anggota Tim -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">👥 Anggota Tim</h3>
                <div id="members" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                            <input type="text" name="members[0][name]"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                                   required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Usia</label>
                            <input type="number" name="members[0][age]"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                                   required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Tambah Anggota -->
            <div>
                <button type="button" onclick="addMember()"
                        class="bg-amber-500 hover:bg-amber-600 text-white font-semibold px-4 py-2 rounded-lg transition">
                    ➕ Tambah Anggota
                </button>
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">
                    ✅ Daftar Tim
                </button>
            </div>
        </form>
    </div>

    <script>
        let memberCount = 1;

        function addMember() {
            const membersDiv = document.getElementById('members');
            const newMember = document.createElement('div');
            newMember.classList.add('grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-4', 'mt-4');
            newMember.innerHTML = `
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                    <input type="text" name="members[${memberCount}][name]"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                           required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Usia</label>
                    <input type="number" name="members[${memberCount}][age]"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                           required>
                </div>
            `;
            membersDiv.appendChild(newMember);
            memberCount++;
        }
    </script>
</x-app-layout>
