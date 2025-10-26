<div class="mx-auto w-full h-[300px] flex items-center justify-center text-center">
    {{-- <div class="relative mt-1 mx-auto max-w-6xl rounded-md shadow-md shadow-emerald-200 hover:shadow-lg w-full h-[255px] flex items-center justify-center text-center text-pink-600 overflow-hidden"> --}}

        @if ($slider && $slider->slides->count())
            {{-- <section class=""> --}}
                {{-- Swiper Container --}}
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($slider->slides as $slide)
                            <div class="swiper-slide relative bg-cover bg-center flex items-center justify-center rounded-md"
                                 style="background-image: url('{{ asset('storage/' . $slide->image_url) }}')">

                                {{-- Overlay --}}
                                <div class="absolute inset-0 bg-black/50 rounded-md"></div>

                                {{-- Content Card --}}
                                <div class="relative z-10 bg-white/15 backdrop-blur-md p-4 md:p-6 rounded-md text-center text-white max-w-lg mx-auto shadow-xl">
                                    <h2 class="text-xl md:text-2xl font-semibold mb-2 leading-tight drop-shadow-lg">
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
            {{-- </section> --}}


        @else
            <div class="w-full h-full flex items-center justify-center text-gray-500">
                <p>No slider found for slug: <strong>{{ $slug }}</strong></p>
            </div>
        @endif
    {{-- </div> --}}
</div>
