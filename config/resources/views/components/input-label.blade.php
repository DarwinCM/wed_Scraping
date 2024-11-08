@props(['disabled' => false, 'for' => '', 'label' => 'Texto', 'eye' => false, 'search' => false])

@php

    $classEye = $eye ? 'pl-3 pr-9' : 'px-3';
@endphp

<div class="relative">
    <div class="relative h-10 w-full">
        <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
            'class' =>
                'w-full h-full ' .
                $classEye .
                ' py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer focus:ring-transparent border-gray-400 border-t-transparent text-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-gray-400 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:bg-gray-100',
        ]) !!} placeholder=" " />
        <label
            class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-[0.4rem] flex h-full w-full select-none !overflow-visible truncate text-xs font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-400 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-400 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-xs peer-focus:leading-tight peer-focus:text-black peer-focus:before:!border-gray-900 peer-focus:after:!border-gray-900 peer-disabled:peer-placeholder-shown:text-gray-500">
            {{ $label }}
        </label>
        @if ($eye)
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <button id="togglePassword" type="button" onclick="passwordVisibility(this)"
                    {{ $disabled ? 'disabled' : '' }} class="text-gray-600 focus:outline-none focus:ring-0">
                    <i class="fa-solid fa-eye"></i>
                </button>
            </div>
        @endif

        @if ($search)
            <div class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-gray-600">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        @endif
    </div>
    @unless (!empty(${$for}))
        @error($for)
            <div class="text-red-500 text-xs mt-1">
                {{ $message }}
            </div>
        @enderror
    @endunless
</div>
