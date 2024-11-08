

<div>
    @include('livewire.modal.table-setting-modal')

    @include('livewire.modal.delete')

    <x-card>
        <div class="relative flex flex-col w-full h-full text-gray-700">
            <div class="flex flex-col justify-between gap-8 md:flex-row md:items-center">
                <div class="w-full md:w-72">
                    <x-input-label wire:model.debounce.300ms="search" label="Buscar por Nombre" />
                </div>
                <div class="flex justify-center gap-2">
                    <x-select-menu label="Estado" selected="{{ $tableSettingState === '' ? 'Todos' : '' }}" class="min-w-40"
                        value="{{ isset($tableSettingState) ? ($tableSettingState === 1 ? 'Autorizado' : 'No Autorizado') : 'Todos' }}">
                        <x-slot name="options">
                            <x-select-option wire:click="$set('tableSettingState', null)" value="Todos">
                                {{ __('Todos') }}
                            </x-select-option>
                            <x-select-option wire:click="$set('tableSettingState', 2)" value='2'>
                                Autorizado
                            </x-select-option>
                            <x-select-option wire:click="$set('tableSettingState', 1)" value='1'>
                                No Autorizado
                            </x-select-option>
                        </x-slot>
                    </x-select-menu>

                        <x-button-gradient class="flex items-center gap-2" wire:click="create()">
                            <i class="fa-solid fa-plus"></i>
                            <span class="hidden sm:block">Nuevo</span>
                        </x-button-gradient>

                </div>
            </div>
            <x-table-container>
                <x-loading class="pt-10" for="tableSettingState">Cargando...</x-loading>
                <table class="w-full text-left table-auto min-w-max">
                    <x-table-thead>
                        <tr>

                            <th class="p-3 font-normal text-white">Nombre</th>
                            <th class="p-3 font-normal text-white">descripcion</th>
                            <th class="p-3 font-normal text-white">Body</th>
                            <th class="p-3 font-normal text-white">Imagen</th>
                            <th class="p-3 font-normal text-white">Actualizado</th>
                            <th class="p-3 font-normal text-center text-white">Acciones</th>
                        </tr>
                    </x-table-thead>
                    <tbody class="text-sm divide-y divide-gray-300">
                        @foreach ($tableSettings as $tableSetting)
                            <tr class="hover:bg-gray-100">

                                <td class="p-3">{{ $tableSetting->nombre }}</td>
                                <td class="p-3">{{ $tableSetting->descrip }}</td>
                                <td class="p-3">{{ $tableSetting->body }}</td>
                                <td class="p-3">{{ $tableSetting->image }}</td>
                                <td class="p-3">
                                    <div>
                                        <i class="fa-regular fa-calendar fa-fw"></i>
                                        {{ \Carbon\Carbon::parse($tableSetting->updated_at)->format('d-m-Y') }}
                                    </div>
                                    <div>
                                        <i class="fa-regular fa-clock fa-fw"></i>
                                        {{ \Carbon\Carbon::parse($tableSetting->updated_at)->format('H:i:s') }}
                                    </div>
                                </td>
                                <td class="w-10 p-3">

                                    <div class="relative flex justify-center">
                                        <x-button-tooltip hover="green" content="Editar"
                                            wire:click="edit({{ $tableSetting }})">
                                            <i class="fa-solid fa-pen fa-fw"></i>
                                        </x-button-tooltip>
                                        <x-button-tooltip hover="red" content="Eliminar"
                                            wire:click="deleteItem({{ $tableSetting->id }})">
                                            <i class="fa-solid fa-trash-can fa-fw"></i>
                                        </x-button-tooltip>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if (!$tableSettings->count())
                            <tr>
                                <td colspan="10" class="p-3 text-sm text-center">
                                    No existe ningún registro coincidente con la búsqueda.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </x-table-container>
            @if ($tableSettings->count())
                {{ $tableSettings->links() }}
            @endif
        </div>
    </x-card>

</div>

