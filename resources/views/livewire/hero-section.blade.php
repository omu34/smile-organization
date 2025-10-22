<div wire:poll.30s="pollHero" class="relative w-full font-bellmt min-h-screen text-white flex items-center justify-center px-4 md:px-10">
    <div class="absolute inset-0 opacity-{{ $hero->background_opacity }}">
        <video class="absolute inset-0 w-full h-full object-cover rounded-xl aspect-video" autoplay muted loop>
            <source src="{{ asset($hero->video_path) }}" type="video/mp4">
        </video>
    </div>

    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between max-w-6xl w-full">
        <div class="md:w-1/2 text-center md:text-left">
            <div class="flex flex-wrap gap-4 text-xs md:mt-20 mb-4 justify-center md:justify-start">
                <time datetime="{{ now()->toDateString() }}" class="text-black font-regular text-lg px-3 py-1 rounded-md border-b-2 border-blue-600">
                    {{ now()->format('M d, Y') }}
                </time>
                <a href="{{ $hero->highlight_link }}" target="_blank"
                   class="rounded-full bg-pink-100 px-4 py-1.5 font-regular text-lg text-pink-500 hover:bg-gray-100">
                    {{ $hero->highlight_text }}
                </a>
            </div>

            <h1 class="text-pink-700 font-bold text-2xl md:text-4xl lg:text-5xl leading-tight mb-2">
                {{ $hero->title }}
            </h1>

            <h4 class="text-base md:text-lg lg:text-xl font-semibold italic text-black mb-2">
                {{ $hero->subtitle }}
            </h4>

            <p class="font-medium text-lg md:text-xl text-green-900 mt-4">
                {{ $hero->description }}
            </p>

            <p class="font-bold uppercase text-xs sm:text-sm text-black">
                {{ $hero->founder_quote }}
            </p>
        </div>
    </div>
</div>
