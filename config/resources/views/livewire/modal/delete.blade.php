<x-dialog-modal wire:model="isOpenDelete" maxWidth="md">
    <x-slot name="title">
        <i class="fa-solid fa-triangle-exclamation mr-2"></i>
        Alerta de confirmación
    </x-slot>
    <x-slot name="content">
        <div class="flex flex-col justify-center items-center px-6 text-center">
            <div
                class="flex items-center justify-center h-20 w-20 rounded-full border-4 border-red-400 text-red-400 text-5xl mb-2">
                <i class="fa-solid fa-exclamation"></i>
            </div>
            <span class="text-lg">¿Estas seguro de que deseas eliminar este elemento?</span>
            <span>No podrás revertir esta acción</span>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="flex-1 flex justify-center">
            <button data-ripple-dark="true" x-on:click="show = false" wire:click="closeModals"
                class="px-4 py-2.5 mr-1 font-sans text-xs font-bold text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                No, cancelar
            </button>

            <x-button-gradient color="green" wire:click="delete()" wire:loading.attr="disabled" wire:target="delete">
                <span wire:loading wire:target="delete" class="mr-2">
                    <i class="fa fa-spinner fa-spin"></i>
                </span>
                Sí, eliminar
            </x-button-gradient>
        </div>
    </x-slot>
</x-dialog-modal>
