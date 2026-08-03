<div id="aboutus" class="bg-white py-16 lg:py-24" data-aos="fade-up" data-aos-duration="1000">
    <!-- Fixed the broken "." class to a standard max-width container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            
            <!-- Left Column: Text Content -->
            <div class="w-full lg:w-1/2">
                <!-- Red Accent Label (Arsenal Style) -->
                <div class="flex items-center gap-4 mb-6">
                    <div class="h-1 w-12 bg-red-600"></div>
                    <span class="text-sm font-bold uppercase tracking-wider text-gray-500">Who We Are</span>
                </div>

                <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">
                    About <span class="text-red-600">Us</span>
                </h2>

                <div class="prose prose-lg text-gray-600 mb-8 max-w-none">
                    @if ($article)
                        <!-- Used a div instead of p to avoid invalid HTML if body contains block elements -->
                        <div class="line-clamp-6">
                            {!! \Illuminate\Support\Str::limit($article->body, 600) !!}
                        </div>
                    @else
                        <p class="text-gray-600">
                            We are a Kenyan organization, registered in 2020, dedicated to supporting persons with disabilities...
                        </p>
                    @endif
                </div>

                @if ($article)
                    <div class="mt-8">
                        <a href="{{ route('articles.show', $article->slug) }}"
                           class="inline-flex items-center justify-center px-8 py-3 text-sm font-bold uppercase tracking-wider text-white bg-gray-900 rounded-sm hover:bg-red-600 transition-colors duration-300 group">
                            Read more
                            <!-- Animated Arrow Icon -->
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Right Column: Media Content -->
            <div class="w-full lg:w-1/2">
                <!-- 
                  Replaced max-h-64 with aspect-video to ensure a perfect 16:9 cinematic ratio 
                  across all screen sizes, matching premium news/sports platforms.
                -->
                <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-2xl bg-gray-100 group border border-gray-100">
                    @if ($article && $article->primaryMedia)
                        @php($m = $article->primaryMedia)
                        
                        @if ($m->type === 'image' && $m->file_path)
                            <img src="{{ $m->full_image_url }}" alt="{{ $article->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                        
                        @elseif($m->type === 'video_local' && $m->file_path)
                            <video controls class="w-full h-full object-cover outline-none bg-black">
                                <source src="{{ $m->full_image_url }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        
                        @elseif($m->type === 'youtube' && $m->youtube_id)
                            <!-- Absolute inset ensures the iframe perfectly fills the aspect-video container -->
                            <iframe class="absolute inset-0 w-full h-full"
                                src="https://www.youtube.com/embed/{{ $m->youtube_id }}"
                                title="YouTube video" frameborder="0" allowfullscreen></iframe>
                        @endif
                    @else
                        <!-- Fallback Image -->
                        <img src="{{ asset('aboutus/afunction.jpg') }}" alt="About image"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>