@props(['disabled' => false, 'selected' => null, 'value' => null, 'label' => 'Texto', 'for' => ''])

<div x-data="{ open: false, containerWidth: 240, selected: @entangle($attributes->wire('model')).defer }" x-cloak>
    <div {{ $attributes->merge(['class' => 'relative h-10 w-full']) }}>
        <button @click="open = !open;" type="button" {{ $disabled ? 'disabled' : '' }}
            class="relative flex items-center w-full h-full p-3 font-sans text-sm font-normal text-left text-gray-700 transition-all bg-transparent border border-gray-400 rounded-md peer pr-9 border-t-transparent outline outline-0 placeholder-shown:border placeholder-shown:border-gray-400 placeholder-shown:border-t-gray-400 focus:border-gray-900 focus:border-t-transparent focus:ring-0 focus:outline-0 disabled:bg-gray-100 disabled:text-gray-700">
            <span
                x-text="selected ? '{{ $value }}': ('{{ $selected }}' != '' ? '{{ $selected }}' : '{{ $value }}')"
                class="block truncate"></span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fa-solid fa-chevron-down fa-xs"></i>
            </span>
        </button>

        <label
            class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-xs font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-400 before:transition-all after:pointer-events-none after:mt-[6px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-400 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-600 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-xs peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-gray-900 peer-focus:after:border-gray-900 peer-disabled:peer-placeholder-shown:text-gray-600">
            {{ $label }}
        </label>

        <ul x-show="open" @click.away="open = false"
            class="absolute z-40 w-full mt-1 overflow-auto text-base bg-white border rounded-lg shadow-xl max-h-52 sm:text-sm">
            {{ $options }}
        </ul>
    </div>
    @unless (!empty(${$for}))
        @error($for)
            <div class="mt-1 text-xs text-red-500">
                {{ $message }}
            </div>
        @enderror
    @endunless
</div>
