<div>
    <div class="pt-20 bg-white rounded-xl mx-10 my-10 px-10 py-10">
        <div class="flex justify-center items-center flex-wrap">
            <!-- Left -->
            <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                <div class="w-full">
                    <h2 class="text-gray-800 text-2xl font-bold flex justify-center items-center">
                        <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>NOTICIAS
                    </h2>
                </div>
                <div class="flex flex-row flex-wrap -mx-3">
                    @foreach ($tableSettings as $tableSetting)
                        <div
                            class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="">
                                    <img class="max-w-full w-full mx-auto" src="{{ $tableSetting->image }}"
                                        alt="alt title">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="#">{{ $tableSetting->nombre }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                        {{ $tableSetting->fecha }}</p>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">
                                        {{ $tableSetting->body }}</p>
                                    <a class="text-gray-500" href="#"><span
                                            class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $tableSetting->descrip }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                @if ($tableSettings->count())
                    {{ $tableSettings->links() }}
                @endif
            </div>

        </div>
    </div>
</div>
