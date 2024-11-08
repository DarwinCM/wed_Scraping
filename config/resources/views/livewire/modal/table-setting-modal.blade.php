<x-dialog-modal wire:model="isOpen" maxWidth="lg">
    <x-slot name="title">
        <i class="fa-solid fa-{{ $showTableSetting ? 'address-card fa-lg' : ($tableSettingId ? 'user-pen' : 'user-plus') }} mr-2"></i>
        {{ $showTableSetting ? 'Detalle de la Configuración de Fechas' : ($tableSettingId ? 'Actualizar la Configuración' : 'Registrar nueva Configuración') }}
    </x-slot>
    <x-slot name="content">
        <form autocomplete="off">
            <input type="hidden" id="usuario_id" name="tableSetting[usuario_id]" value="{{ auth()->id() }}">
            <div class="flex flex-col gap-3">
                <div class="grid grid-cols-2 gap-3">
                    <x-input-label for="form.nombre" label="Nombre de Configuración" wire:model="form.nombre" type="text" disabled="{{ $showTableSetting }}" />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <x-input-label for="form.descrip" label="descrip de Configuración" wire:model="form.descrip" type="text" disabled="{{ $showTableSetting }}" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <x-input-label for="form.body" label="body de Configuración" wire:model="form.body" type="text" disabled="{{ $showTableSetting }}" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <x-input-label for="form.fecha" label="fecha de Configuración" wire:model="form.fecha" type="text" disabled="{{ $showTableSetting }}" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <x-input-label for="form.image" label="image de Configuración" wire:model="form.image" type="text" disabled="{{ $showTableSetting }}" />
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button data-ripple-dark="true" x-on:click="show = false" wire:click="closeModals" class="px-4 py-2.5 mr-1 font-sans text-xs font-bold text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
            Cancelar
        </button>

        @if (!$showTableSetting)
            <x-button-gradient color="green" wire:click="store()" wire:loading.attr="disabled" wire:target="store">
                <span wire:loading wire:target="store" class="mr-2">
                    <i class="fa fa-spinner fa-spin"></i>
                </span>
                {{ $tableSettingId ? 'Actualizar' : 'Registrar' }}
            </x-button-gradient>
        @endif
    </x-slot>
</x-dialog-modal>
