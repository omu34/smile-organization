<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if ($slider && $slider->slides->count())
        <div class="swiper mySwiper rounded-2xl overflow-hidden h-[400px] sm:h-[450px] md:h-[600px] shadow-2xl relative border border-gray-100">
            <div class="swiper-wrapper">
                @foreach ($slider->slides as $slide)
                    <div class="swiper-slide bg-cover bg-no-repeat bg-center relative flex items-center justify-center lazy-bg"
                        data-bg="{{ $slide->full_image_url }}"
                        style="background-color: #111827;">
                        
                        <!-- Rich Gradient Overlay for High Contrast -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-black/25"></div>
                        
                        <!-- Top Red Accent Line -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-red-600"></div>

                        {{-- Content Card --}}
                        <div class="relative z-10 p-6 md:p-12 text-center text-white max-w-3xl mx-auto flex flex-col items-center">
                            <div class="h-1 w-16 bg-red-600 rounded-full mb-4"></div>

                            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold uppercase tracking-tight mb-4 text-white drop-shadow-md">
                                {{ $slide->title }}
                            </h2>

                            @if ($slide->description)
                                <p class="text-gray-200 text-base md:text-lg mb-8 max-w-2xl leading-relaxed font-normal">
                                    {{ Str::limit($slide->description, 120) }}
                                </p>
                            @endif

                            @if ($slide->button_text)
                                <a href="{{ $slide->button_link ?? '#' }}"
                                    class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white font-bold uppercase tracking-wider px-8 py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-red-900/50 focus:outline-none focus:ring-2 focus:ring-red-500">
                                    {{ $slide->button_text }}
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Swiper Controls --}}
            <div class="swiper-pagination !bottom-4"></div>
        </div>
    @else
        <div class="w-full py-16 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-center text-gray-500 shadow-sm">
            <p class="font-medium">No slider found for slug: <strong class="text-gray-900">{{ $slug }}</strong></p>
        </div>
    @endif
</div>