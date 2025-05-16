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

        <form method="POST" action="{{ route('kritik-saran.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama (opsional)</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm py-2 px-4 focus:ring-orange-500 focus:border-orange-500">
                @error('nama')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email (opsional)</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm py-2 px-4 focus:ring-orange-500 focus:border-orange-500">
                @error('email')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kritik atau Saran <span class="text-red-600">*</span></label>
                <textarea name="isi" rows="5" required
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm py-2 px-4 focus:ring-orange-500 focus:border-orange-500">{{ old('isi') }}</textarea>
                @error('isi')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-full transition duration-300">
                    Kirim
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
