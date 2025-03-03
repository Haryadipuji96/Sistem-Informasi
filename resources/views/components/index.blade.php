<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manufacture Management') }}
        </h2>
    </x-slot>
    <div x-data="{ open: false }" @open-modal.window="open = true">
        <x-modal title="Add Data Manufacture" action="{{ route('manufacturers.store') }}" :method="'POST'">
            <div class="mt-2">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="detail" :value="__('Description')" />
                <x-text-input id="detail" class="block mt-1 w-full" type="text" name="detail" :value="old('detail')"
                    required autofocus autocomplete="detail" placeholder="Description" />
                <x-input-error :messages="$errors->get('detail')" class="mt-2" />
            </div>

            <div class="mt-4 flex justify-end space-x-2">
                <!-- <button type="button" onclick="closeModal()" class="bg-gray-400 hover:bg-gray-500 text-white text-sm rounded-lg py-2.5 px-4">
        Cancel
    </button> -->
                <!-- <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white text-sm rounded-lg py-2.5 px-4">
        Simpan
    </button> -->
            </div>
        </x-modal>
    </div>
    <div class="container mx-auto p-8">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg" x-data="{
            selected: [],
            allSelected: false,
            updateSelection() {
                this.selected = [];
                document.querySelectorAll('tbody input[type=checkbox]:checked').forEach(cb => {
                    this.selected.push(cb.value);
                });
                this.allSelected = this.selected.length === document.querySelectorAll('tbody input[type=checkbox]').length;
            },
            toggleSelectAll() {
                this.allSelected = !this.allSelected;
                this.selected = [];
                document.querySelectorAll('tbody input[type=checkbox]').forEach(cb => {
                    cb.checked = this.allSelected;
                    if (this.allSelected) {
                        this.selected.push(cb.value);
                    }
                });
            }
        }">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                <div class="md:mt-0 sm:flex sm:space-x-4 w-full">
                    <x-show-entries :route="route('manufacturers.index')" :search="request()->search">
                    </x-show-entries>
                </div>
                <div class="sm:ml-16 sm:mt-0 sm:flex sm:space-x-4 sm:flex-none">
                    <x-search-bar :route="route('manufacturers.index')" :entries="request()->entries">
                    </x-search-bar>
                    <x-add-button-modal />
                    <x-dropdown-actions :clear="route('manufacturers.index')" />
                    <form method="POST" action="{{ route('manufacturers.bulk-delete') }}" x-show="selected.length > 0"
                        @submit.prevent="
                            if (confirm('Are you sure you want to delete the selected items?')) {
                                document.getElementById('ids').value = selected.join(',');
                                $el.submit();
                            }
                        ">
                        @csrf
                        @method('POST')
                        <x-danger-button type="submit" class="inline-flex items-center font-medium rounded-md">
                            <i class="fas fa-trash mr-2"></i> Delete Selected
                        </x-danger-button>
                        <input type="hidden" id="ids" name="ids">
                    </form>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead class="text-sm text-gray-700 uppercase bg-white dark:bg-gray-800">
                        <tr
                            class="bg-white border-t border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3 text-center">
                                <input type="checkbox" @change="toggleSelectAll" :checked="allSelected">
                            </th>
                            <th class="py-3 px-4 border-b text-left">Name</th>
                            <th class="py-3 px-4 border-b text-left">Description</th>
                            <th class="py-3 px-4 border-b text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($manufacture as $data)
                            <div x-data="{ open: false }" @open-modal-{{ $data->id }}.window="open = true">
                                <x-modal :id="$data->id" title="Edit Data"
                                    action="{{ route('manufacturers.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-2">
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                                            name="name" value="{{ old('name', $data->name) }}" required autofocus
                                            autocomplete="name" placeholder="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="detail" :value="__('Description')" />
                                        <x-text-input id="detail" class="block mt-1 w-full" type="text"
                                            name="detail" value="{{ old('detail', $data->detail) }}" required autofocus
                                            autocomplete="detail" placeholder="Description" />
                                        <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                                    </div>
                                </x-modal>
                            </div>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-2 text-center">
                                    <input type="checkbox" :value="{{ $data->id }}" @change="updateSelection()"
                                        :checked="selected.includes('{{ $data->id }}')">
                                </td>
                                <td
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                    {{ $data->name }}
                                </td>
                                <td class="px-6 py-4 text-left">
                                    {{ $data->detail }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('manufacturers.destroy', $data->id) }}" method="POST">
                                        <x-edit-button-modal :id="$data->id" />
                                        @csrf
                                        @method('DELETE')
                                        <x-icon-delete-button />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="bg-gray-500 text-white p-3 rounded shadow-sm mb-3">
                                Data Belum Tersedia!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $manufacture->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
