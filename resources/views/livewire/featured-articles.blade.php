<div class="bg-white py-16 lg:py-24" data-aos="fade-up" data-aos-duration="1000">
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Featured Articles
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Welcome
            </h4>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($articles as $article)
                @php($m = $article->media->firstWhere('is_primary', true) ?? $article->media->first())
                <article class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 overflow-hidden flex flex-col group transition-all duration-300">
                    
                    <!-- Media Wrapper -->
                    <div class="relative w-full aspect-video overflow-hidden bg-gray-100">
                        @if ($m)
                            @if ($m->type === 'image' && $m->file_path)
                                <img src="{{ asset('storage/' . $m->file_path) }}" alt="{{ $article->title }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @elseif($m->type === 'video_local' && $m->file_path)
                                <video class="w-full h-full object-cover" muted playsinline preload="metadata" loop>
                                    <source src="{{ asset('storage/' . $m->file_path) }}" type="video/mp4">
                                </video>
                            @elseif($m->type === 'youtube' && $m->youtube_id)
                                <iframe class="w-full h-full border-0"
                                    src="https://www.youtube.com/embed/{{ $m->youtube_id }}?rel=0" frameborder="0"
                                    allowfullscreen></iframe>
                            @endif
                        @else
                            <img src="{{ asset('images/placeholder-article.jpg') }}" alt="Placeholder"
                                class="w-full h-full object-cover">
                        @endif
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 flex flex-col flex-grow">
                        <!-- Date & Reading Time Meta (Google News Style) -->
                        <div class="flex items-center text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                            @if ($article->created_at)
                                <time datetime="{{ $article->created_at->toDateString() }}">{{ $article->created_at->format('M d, Y') }}</time>
                            @endif
                            @if ($article->reading_time_minutes)
                                <span class="mx-2 text-gray-300">·</span>
                                <span>{{ $article->reading_time_minutes }} min read</span>
                            @endif
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-red-600 transition-colors">
                            <a href="{{ route('articles.show', $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <!-- Excerpt / Body Snippet -->
                        <p class="text-gray-600 text-base leading-relaxed mb-6 flex-grow line-clamp-3">
                            {{ \Illuminate\Support\Str::limit($article->excerpt ?? strip_tags($article->body), 160) }}
                        </p>

                        <!-- Call to Action Link -->
                        <div class="pt-4 border-t border-gray-100 mt-auto">
                            <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-xs font-bold uppercase tracking-wider text-red-600 group/link">
                                Read Article
                                <svg class="w-3.5 h-3.5 ml-1.5 transform transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</div>