<div class="mx-auto w-full flex items-center justify-center text-center">
    @if ($slider && $slider->slides->count())
        <div class="swiper mySwiper  rounded-md overflow-hidden h-auto md:h-[500px]">
            <div class="swiper-wrapper">
                @foreach ($slider->slides as $slide)
                    <div class="swiper-slide opacity-25 bg-cover bottom-2 bg-no-repeat bg-center relative flex items-center justify-center rounded-md" style="background-image: url('{{ $slide->full_image_url }}')">
                <div class="absolute inset-0 bg-black/40 rounded-md"></div>
                                            {{-- Content Card --}}
                <div
                            class="relative justify-content-center items-center z-10  md:mt-30  p-4 md:p-6 rounded-md text-center text-white max-w-lg mx-auto shadow-xl">
                            <h2 class="text-xl md:text-2xl font-semibold mb-2 ">

                                {{-- leading-tight drop-shadow-lg   backdrop-blur-sm bg-transparent --}}
                                {{ $slide->title }}
                            </h2>

                            @if ($slide->description)
                                <p class="text-sm md:text-base mb-3 opacity-90">
                                    {{ Str::limit($slide->description, 80) }}
                                </p>
                            @endif

                            @if ($slide->button_text)
                                <a href="{{ $slide->button_link ?? '#' }}"
                                    class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white font-semibold text-sm px-4 py-2 rounded-md transition duration-300">
                                    {{ $slide->button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Swiper Controls --}}
            <div class="swiper-pagination !bottom-2"></div>
        </div>
    @else
        <div class="w-full h-full flex items-center justify-center text-gray-500">
            <p>No slider found for slug: <strong>{{ $slug }}</strong></p>
        </div>
    @endif
</div>
