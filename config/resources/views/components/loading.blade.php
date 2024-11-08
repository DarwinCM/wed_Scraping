@props(['for' => ''])

<div wire:loading wire:target={{ $for }} {{ $attributes->merge(['class' => 'absolute z-10 w-full h-full']) }} >
    <div class="relative w-full h-full">
        <div class="absolute inset-0 bg-white bg-opacity-50 backdrop-blur-[2px]"></div>
        <div class="absolute inset-0 flex items-center justify-center bg-opacity-0">
            <div>
                <i class="fa fa-spinner fa-spin"></i> {{ $slot }}
            </div>
        </div>
    </div>
</div>
