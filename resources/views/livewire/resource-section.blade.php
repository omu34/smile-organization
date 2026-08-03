<section class="bg-white py-16 lg:py-24" id="our-resources" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-16">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Our Resources
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Welcome
            </h4>
        </div>

        <!-- Resources List -->
        <div class="space-y-16">
            @foreach ($resources as $index => $resource)
                <div class="flex flex-col md:flex-row items-center gap-12 {{ $resource->alignment === 'right' ? 'md:flex-row-reverse' : '' }} bg-white rounded-2xl p-6 md:p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                    
                    {{-- Image Wrapper --}}
                    <div data-aos="{{ $resource->alignment === 'left' ? 'flip-left' : 'flip-right' }}"
                        class="w-full md:w-1/2 flex-shrink-0 overflow-hidden rounded-xl shadow-md group">
                        <img src="{{ $resource->full_image_path }}" alt="{{ $resource->title }}"
                            class="w-full h-64 md:h-80 object-cover rounded-xl transition-transform duration-700 group-hover:scale-105">
                    </div>

                    {{-- Text Content --}}
                    <div class="w-full md:w-1/2 text-left flex flex-col justify-center space-y-4">
                        <div class="h-1 w-12 bg-red-600 rounded-full"></div>
                        
                        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight leading-tight">
                            {{ $resource->title }}
                        </h3>
                        
                        <p class="text-gray-600 text-base leading-relaxed font-normal">
                            {{ $resource->description }}
                        </p>

                        @if ($resource->extra_description)
                            <p class="text-gray-600 text-base leading-relaxed font-normal pt-2 border-t border-gray-100">
                                {{ $resource->extra_description }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>