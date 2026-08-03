<section class="bg-gray-900 py-20 lg:py-28 overflow-hidden relative" data-aos="fade-up" data-aos-duration="1000">
    <!-- Ambient Backdrop Glow (Adds 3D Depth Perception) -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-red-900/20 via-gray-900/80 to-gray-900 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        @if ($areaTitle)
            <div class="flex flex-col items-center text-center mb-16 lg:mb-20">
                <span class="text-xs font-black uppercase tracking-[0.3em] text-red-500 mb-3">Capabilities</span>
                <h2 class="text-3xl md:text-5xl font-black text-white tracking-tight uppercase mb-4">
                    {{ $areaTitle->title }}
                </h2>
                <div class="h-1 w-12 bg-red-600 rounded-full mb-4"></div>
                <p class="text-base md:text-lg text-gray-400 max-w-2xl font-normal leading-relaxed">
                    {{ $areaTitle->description }}
                </p>
            </div>
        @endif

        <!-- 3D Stage Container (Perspective & Preserved 3D Hooks) -->
        <div class="area-carousel-wrapper relative w-full h-[320px] sm:h-[380px] flex items-center justify-center [perspective:1200px]">
            
            <!-- 3D Carousel Ring -->
            <div class="area-carousel relative w-full h-full flex items-center justify-center [transform-style:preserve-3d]">
                @forelse ($areas_of_practices as $index => $area)
                    @php
                        $total = count($areas_of_practices);
                        $angle = $total > 0 ? (360 / $total) * $index : 0;
                    @endphp
                    
                    <!-- 3D Carousel Item (Preserves your custom JS --rotateY hook) -->
                    <div class="area-carousel-item absolute w-[200px] sm:w-[260px] h-[280px] sm:h-[340px] transition-transform duration-500 group [transform-style:preserve-3d]"
                         style="--rotateY: {{ $angle }}deg">
                        
                        <!-- High-End 3D Card Glass Structure -->
                        <div class="w-full h-full bg-gray-800/80 backdrop-blur-md border border-white/10 rounded-2xl shadow-2xl overflow-hidden flex flex-col relative group-hover:border-red-500/80 transition-all duration-300">
                            
                            <!-- Image Container with Lighting Gradient -->
                            <div class="h-3/5 w-full relative overflow-hidden bg-gray-950">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent z-10 opacity-80"></div>
                                <img src="{{ $area->full_image_path }}" 
                                     alt="{{ $area->subtitle }}"
                                     class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110"
                                     loading="lazy" />
                            </div>
                            
                            <!-- Content Area -->
                            <div class="h-2/5 p-5 flex flex-col justify-between bg-gray-900/90 relative z-20">
                                <h3 class="text-sm sm:text-base font-bold text-white uppercase tracking-snug line-clamp-2 group-hover:text-red-500 transition-colors">
                                    {{ $area->subtitle }}
                                </h3>
                                
                                <a href="{{ $area->url }}" target="_blank" 
                                   class="text-xs font-bold uppercase tracking-widest text-red-500 flex items-center group/link">
                                    <span>{{ $area->button_name ?? 'Explore' }}</span>
                                    <svg class="w-3.5 h-3.5 ml-1.5 transform transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="text-gray-500 font-bold uppercase tracking-widest text-sm">
                        No active areas found.
                    </div>
                @endforelse
            </div>
            
        </div>

        <!-- Floor Reflective Ambient Light (Elevates 3D Realism) -->
        <div class="w-2/3 h-8 mx-auto bg-red-600/10 blur-xl rounded-full pointer-events-none mt-4"></div>

    </div>
</section>