<section class="py-10" id="directives" data-aos="fade-up" data-aos-duration="1000">
    <div class=" mx-auto px-4">
    {{-- @if ($areaTitle) --}}
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    {{-- {{$areaTitle->title}} --}}Directives
                    {{-- <span class="text-indigo-900">Experience</span> --}}
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                    {{-- {{$areaTitle->description}} --}} Welcome
                    
                </h4>
            </div>
            {{-- @else --}}
                {{-- <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p> --}}
            {{-- @endif --}}
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($directives as $directive)
                <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition">
                    @if($directive->icon)
                        <x-dynamic-component :component="$directive->icon"
                            class="h-10 w-10 mx-auto mb-3"
                            style="color: {{ $directive->color }}"/>
                    @endif
                    <h3 class="font-semibold text-xl mb-2 text-gray-800">
                        {{ $directive->title }}
                    </h3>
                    <p class="text-gray-600">
                        {{ $directive->description }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
