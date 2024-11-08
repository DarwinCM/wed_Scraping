@props(['hover', 'content' => ''])

@php

    $color = [
        'amber' => 'hover:text-amber-500 hover:bg-amber-600/10',
        'blue' => 'hover:text-blue-500 hover:bg-blue-600/10',
        'brown' => 'hover:text-brown-500 hover:bg-brown-600/10',
        'blue-gray' => 'hover:text-blue-gray-500 hover:bg-blue-gray-600/10',
        'cyan' => 'hover:text-cyan-500 hover:bg-cyan-600/10',
        'deep-orange' => 'hover:text-deep-orange-500 hover:bg-deep-orange-600/10',
        'deep-purple' => 'hover:text-deep-purple-500 hover:bg-deep-purple-600/10',
        'gray' => 'hover:text-gray-600 hover:bg-gray-600/10',
        'green' => 'hover:text-green-500 hover:bg-green-600/10',
        'indigo' => 'hover:text-indigo-500 hover:bg-indigo-600/10',
        'lime' => 'hover:text-lime-500 hover:bg-lime-600/10',
        'light-green' => 'hover:text-light-green-500 hover:bg-light-green-600/10',
        'light-blue' => 'hover:text-light-blue-500 hover:bg-light-blue-600/10',
        'orange' => 'hover:text-orange-500 hover:bg-orange-600/10',
        'purple' => 'hover:text-purple-500 hover:bg-purple-600/10',
        'pink' => 'hover:text-pink-500 hover:bg-pink-600/10',
        'red' => 'hover:text-red-500 hover:bg-red-600/10',
        'teal' => 'hover:text-teal-500 hover:bg-teal-600/10',
        'yellow' => 'hover:text-yellow-500 hover:bg-yellow-600/10',
        'default' => 'hover:bg-gray-900/10',
    ][$hover ?? 'default'];
@endphp


<button data-ripple-dark="true" {{ $attributes->merge(['type' => 'button', 'class' => 'group flex relative p-2.5 select-none rounded-lg text-start align-middle font-sans text-xs font-medium uppercase text-gray-900  ' . $color . ' transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none active:bg-gray-300']) }}>
    {{ $slot }}
    <div class="absolute -top-7 left-1/2 transform -translate-x-1/2 px-1.5 py-0.5 rounded-md hidden text-[0.625rem] group-hover:block group-hover:transition-transform group-hover:duration-700 w-max bg-black text-white">
        {{ $content }}
        <span class="tooltip-arrow absolute left-1/2 transform -translate-x-1/2 -bottom-1"></span>
    </div>
</button>


