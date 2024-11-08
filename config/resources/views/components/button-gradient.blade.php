@props(['color', 'disabled' => false])

@php

    $color = [
        'amber' => 'from-amber-700 to-amber-300 shadow-amber-500/20 hover:shadow-amber-500/40',
        'blue' => 'from-blue-700 to-blue-300 shadow-blue-500/20 hover:shadow-blue-500/40',
        'brown' => 'from-brown-700 to-brown-300 shadow-brown-500/20 hover:shadow-brown-500/40',
        'blue-gray' => 'from-blue-gray-700 to-blue-gray-300 shadow-blue-gray-500/20 hover:shadow-blue-gray-500/40',
        'cyan' => 'from-cyan-700 to-cyan-300 shadow-cyan-500/20 hover:shadow-cyan-500/40',
        'deep-orange' => 'from-deep-orange-700 to-deep-orange-300 shadow-deep-orange-500/20 hover:shadow-deep-orange-500/40',
        'deep-purple' => 'from-deep-purple-700 to-deep-purple-300 shadow-deep-purple-500/20 hover:shadow-deep-purple-500/40',
        'gray' => 'from-black to-gray-800 shadow-gray-700/20 hover:shadow-gray-700/40',
        'green' => 'from-green-700 to-green-400 shadow-green-500/20 hover:shadow-green-500/40 active:to-green-900',
        'indigo' => 'from-indigo-700 to-indigo-300 shadow-indigo-500/20 hover:shadow-indigo-500/40',
        'lime' => 'from-lime-700 to-lime-300 shadow-lime-500/20 hover:shadow-lime-500/40',
        'light-green' => 'from-light-green-700 to-light-green-300 shadow-light-green-500/20 hover:shadow-light-green-500/40',
        'light-blue' => 'from-light-blue-700 to-light-blue-300 shadow-light-blue-500/20 hover:shadow-light-blue-500/40',
        'orange' => 'from-orange-700 to-orange-300 shadow-orange-500/20 hover:shadow-orange-500/40',
        'purple' => 'from-purple-700 to-purple-300 shadow-purple-500/20 hover:shadow-purple-500/40',
        'pink' => 'from-pink-700 to-pink-300 shadow-pink-500/20 hover:shadow-pink-500/40',
        'red' => 'from-red-800 to-red-400 shadow-red-500/20 hover:shadow-red-500/40',
        'teal' => 'from-teal-700 to-teal-300 shadow-teal-500/20 hover:shadow-teal-500/40',
        'yellow' => 'from-yellow-700 to-yellow-300 shadow-yellow-500/20 hover:shadow-yellow-500/40',
    ][$color ?? 'gray'];
@endphp

<button data-ripple-light="true" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'rounded-lg bg-gradient-to-tr ' . $color . ' py-3 px-4 text-xs font-bold uppercase text-white shadow-md transition-all hover:shadow-lg disabled:pointer-events-none disabled:opacity-60 disabled:shadow-none']) }}>
    {{ $slot }}
</button>
