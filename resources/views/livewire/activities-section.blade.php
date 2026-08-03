<section class="bg-gray-50 py-16 lg:py-24" id="section" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                {{-- {{ $areaTitle->title ?? 'Our Activities' }} --}}
                Our Activities
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                {{-- {{ $areaTitle->description ?? 'We do humanitarian jobs' }} --}} 
                We do humanitarian work and create lasting community impact.
            </h4>
        </div>

        <!-- Activities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($activities as $activity)
                <!-- News/Sports Style Card -->
                <article class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden flex flex-col group transition-all duration-300">
                    
                    <!-- Full-Bleed Card Image -->
                    @php($activityImage = $activity->getFirstMediaUrl('activity_images') ?? $activity->full_image)
                    @if ($activityImage)
                        <div class="relative w-full aspect-video overflow-hidden bg-gray-200">
                            <img src="{{ $activityImage }}" 
                                 alt="{{ $activity->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                    @endif

                    <!-- Card Body -->
                    <div class="p-6 flex flex-col flex-grow">
                        <!-- Red Accent Tag (Optional stylistic addition) -->
                        <div class="mb-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-red-600">
                                Activity
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-red-600 transition-colors">
                            {{ $activity->subtitle }}
                        </h3>

                        @if ($activity->extra_description)
                            <p class="text-gray-600 text-base leading-relaxed mb-6 flex-grow line-clamp-3">
                                {{ $activity->extra_description }}
                            </p>
                        @endif

                        <!-- Action Link -->
                        @if ($activity->button_text)
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <!-- Replaced invalid nested <button> inside <a> with a properly styled <a> tag -->
                                <a href="{{ $activity->button_link ?? '#' }}" 
                                   class="inline-flex items-center text-sm font-bold uppercase tracking-wide text-gray-900 hover:text-red-600 transition-colors group/link">
                                    {{ $activity->button_text }}
                                    <svg class="w-4 h-4 ml-2 transform transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>