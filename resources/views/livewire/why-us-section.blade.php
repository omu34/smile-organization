<section class="text-gray-700 body-font pt-10">
    <div class="mx-auto" data-aos="fade-up" data-aos-duration="1000">
        <div class="flex justify-center text-3xl font-bold text-[#000000] text-center mb-8">
            {{-- @if ($areaTitle) --}}
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    {{-- {{$areaTitle->title}} --}}Why choose Us
                    {{-- <span class="text-indigo-900">Experience</span> --}}
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                    {{-- {{$areaTitle->description}} --}} We  serve the all community without Biasness
                    
                </h4>
            </div>
            {{-- @else --}}
                {{-- <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p> --}}
            {{-- @endif --}}
        </div>

        <div class="container py-12 mx-auto">
            <div id="whyUsGrid" class="flex flex-wrap text-center md:text-left justify-center">
                @foreach ($whyUsItems as $item)
                    <div class="p-4 md:w-1/4 sm:w-1/2">
                        <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                            <div class="flex justify-center">
                                <img src="{{ $item->full_image_url }}"
                                    class="rounded-full h-24 w-24 mx-auto mb-4 object-cover" alt="{{ $item->title }}">
                                {{-- <img src="{{ $item->full_image_url }}" class="w-32 mb-3" alt="{{ $item->title }}"> --}}
                            </div>
                            <h2 class="title-font font-regular text-xl text-black">{{ $item->title }}</h2>
                            <p class="mt-4 text-black text-md">{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
