<div class="mx-auto w-full h-[300px] flex items-center justify-center text-center">
    <div class="relative mt-1 mx-auto max-w-6xl rounded-md shadow-md shadow-emerald-200 hover:shadow-lg w-full h-[255px] flex items-center justify-center text-center text-pink-600 overflow-hidden">

        {{-- Hero Video or Background --}}
        @if ($videoUrl)
            @php
                // Detect video type
                $isYouTube = \Illuminate\Support\Str::contains($videoUrl, ['youtube.com', 'youtu.be']);
                $isVimeo = \Illuminate\Support\Str::contains($videoUrl, ['vimeo.com']);
                $isLocal = \Illuminate\Support\Str::endsWith($videoUrl, ['.mp4', '.webm', '.ogg']);
            @endphp

            {{-- YouTube Embed --}}
            @if ($isYouTube)
                @php
                    $youtubeId = null;
                    if (preg_match('/(?:youtube\.com.*v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                        $youtubeId = $matches[1];
                    }
                @endphp
                @if ($youtubeId)
                    <iframe
                        class="absolute inset-0 w-full h-full object-cover"
                        src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1&mute=1&loop=1&playlist={{ $youtubeId }}&controls=0&modestbranding=1&showinfo=0"
                        frameborder="0"
                        allow="autoplay; fullscreen; encrypted-media"
                        allowfullscreen>
                    </iframe>
                @endif

            {{-- Vimeo Embed --}}
            @elseif ($isVimeo)
                <iframe
                    class="absolute inset-0 w-full h-full object-cover"
                    src="{{ $videoUrl }}?autoplay=1&muted=1&loop=1&background=1"
                    frameborder="0"
                    allow="autoplay; fullscreen; picture-in-picture"
                    allowfullscreen>
                </iframe>

            {{-- Local Video --}}
            @elseif ($isLocal)
                <video id="hero-video" class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="{{ asset('storage/' . $videoUrl) }}" type="video/mp4">
                </video>

            {{-- External Direct Link (fallback) --}}
            @else
                <video id="hero-video" class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
                    <source src="{{ $videoUrl }}" type="video/mp4">
                </video>
            @endif

        <div class="absolute inset-0  opacity-{{ $hero->background_opacity ?? 0.2 }}"></div>
        @endif

        {{-- Hero Content --}}
        <div class="relative z-10 max-w-3xl px-6">
            @if ($hero->title)
                <h1 class="md:text-3xl text-lg font-bold md:mb-4 mb-2">{{ $hero->title }}</h1>
            @endif
            @if ($hero->subtitle)
                <p class="md:text-lg text-black text-sm md:mb-4 mb-2">{{ $hero->subtitle }}</p>
            @endif
            @if ($hero->description)
                <p class="md:text-md text-black text-xs md:mb-6 mb-2">{{ $hero->description }}</p>
            @endif
            @if ($hero->highlight_text && $hero->highlight_link)
                <a href="{{ $hero->highlight_link }}"
                   class="md:px-6 md:py-2 px-2 py-1 text-white bg-pink-600 rounded-lg hover:bg-pink-700">
                    {{ $hero->highlight_text }}
                </a>
            @endif
        </div>
    </div>
</div>
