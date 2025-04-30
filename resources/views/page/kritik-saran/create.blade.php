<x-app-layout>
    <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-lg">
        <div class="text-center mb-6">
            <div class="text-6xl mb-4">💬</div>
            <h1 class="text-3xl font-semibold text-gray-800">Kritik dan Saran</h1>
            <p class="text-gray-500 text-sm">Kami menghargai setiap masukan Anda untuk perbaikan desa</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-6 rounded text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('kritik-saran.store') }}" class="space-y-6" x-data="{ loading: false }"
            @submit.prevent="loading = true; $el.submit();">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama (Masukkan Nama Anda)</label>
                <input type="text" name="nama"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-4"
                    value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email (Masukkan Email Anda)</label>
                <input type="email" name="email"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-4"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kritik atau Saran</label>
                <textarea name="isi" rows="6"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 py-2 px-4"
                    required>{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" :disabled="loading"
                    class="bg-orange-500 hover:bg-orange-600 disabled:bg-orange-300 text-white font-semibold py-3 px-8 rounded-full transition duration-300 flex items-center justify-center mx-auto space-x-3">
                    <template x-if="loading">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                    </template>
                    <span x-text="loading ? 'Mengirim...' : 'Kirim'"></span>
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
