@livewire('admin.partials.menu.sidebar')

{{-- Content --}}
<div class="lg:ml-64">

    {{-- @include('livewire.admin.partials.navbar') --}}

    <div class="flex flex-col justify-between h-full overflow-y-auto overflow-x-hidden" style="height: calc(100vh - 4rem)">

        <div class="p-5">

            <x-card>
                <div class="text-sm">
                    <a href="{{ route('admin.home') }}" class="text-gray-600 hover:text-gray-800"><i class="fa-solid fa-house-chimney"></i></a> /
                    <span class="text-gray-600">@yield('header')</span>
                    / <span class="font-semibold">@yield('section')</span>
                </div>
            </x-card>

            {{ $content }}

        </div>

        <div class="">
            @include('livewire.admin.partials.footer')
        </div>

    </div>
</div>
