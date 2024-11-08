@props(['isSelected' => null, 'value' => null])

<li @click="selected = '{{ $value }}'; open = false"
    {{ $attributes->merge(['class' => 'text-gray-600 relative cursor-default select-none py-1 pl-3 pr-9 hover:bg-blue-900 hover:text-white group']) }}>
    {{ $slot }}
    <span x-show="selected === '{{ $value }}'"
        class="text-blue-900 absolute inset-y-0 right-0 flex items-center pr-3 group-hover:text-white">
        <i class="fa-solid fa-check"></i>
    </span>
    @if ($isSelected === $value )
        <span
            class="text-blue-900 absolute inset-y-0 right-0 flex items-center pr-3 group-hover:text-white">
            <i class="fa-solid fa-check"></i>
        </span>
    @endif
</li>
