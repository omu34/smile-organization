<div x-data>
    {{-- 📹 Video Grid --}}
    <section class=" py-10">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Impact Videos</h2>

            @if ($videos->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($videos as $video)
                        <div wire:click="showModal({{ $video->id }})"
                             class="cursor-pointer group relative bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:scale-[1.02] transition transform duration-200"
                             x-data="{ hover: false }"
                             @mouseenter="hover = true"
                             @mouseleave="hover = false">

                            {{-- 🎬 Thumbnail or Hover Preview --}}
                            <div class="relative w-full h-72 overflow-hidden">

                                {{-- YouTube/Vimeo Preview --}}
                                @if(Str::contains($video->embed_url, ['youtube', 'vimeo']))
                                    {{-- Show YouTube thumbnail by default --}}
                                    <template x-if="!hover">
                                        <img src="{{ $video->thumbnail }}"
                                             alt="{{ $video->title }}"
                                             class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition duration-300">
                                    </template>

                                    {{-- Show autoplaying YouTube embed on hover --}}
                                    <template x-if="hover">
                                        <iframe
                                            src="{{ preg_replace('/\?.*/', '', $video->embed_url) }}?autoplay=1&mute=1&controls=0&modestbranding=1&loop=1&playlist={{ Str::afterLast($video->embed_url, '/') }}"
                                            class="w-full h-full object-cover"
                                            frameborder="0"
                                            allow="autoplay; encrypted-media"
                                            allowfullscreen>
                                        </iframe>
                                    </template>

                                {{-- Local video preview --}}
                                @else
                                    <video
                                        src="{{ $video->embed_url }}"
                                        class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition duration-300"
                                        muted
                                        loop
                                        autoplay
                                        playsinline>
                                    </video>
                                @endif

                                {{-- Overlay Play Icon --}}
                                <div class="absolute inset-0 bg-black/50 group-hover:bg-black/30 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="white"
                                         viewBox="0 0 24 24"
                                         class="w-12 h-12 opacity-90 group-hover:scale-110 transition-transform duration-200">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Title --}}
                            <div class="p-3 text-center">
                                <h3 class="text-lg text-white font-semibold">{{ $video->title }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center mt-10">No videos available at the moment.</p>
            @endif
        </div>
    </section>

    {{-- 🎬 Modal --}}
    @if ($selectedVideo)
        <div x-data="{ open: true }"
             x-show="open"
             x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80 p-4">

            <div class="relative w-full max-w-4xl rounded-lg overflow-hidden shadow-2xl">
                {{-- Close Button --}}
                <button wire:click="closeModal"
                        class="absolute top-2 right-2 z-50 text-white bg-black/70 rounded-full p-2 hover:bg-black transition">
                    ✕
                </button>

                {{-- Video Display --}}
                @if(Str::contains($selectedVideo->embed_url, ['youtube', 'vimeo']))
                    <iframe src="{{ $selectedVideo->embed_url }}"
                            class="w-full aspect-video"
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen></iframe>
                @else
                    <video class="w-full aspect-video" controls autoplay>
                        <source src="{{ $selectedVideo->embed_url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif

                {{-- Navigation Buttons --}}
                <div class="flex justify-between mt-3 bg-gray-900 p-3">
                    <button wire:click="prevVideo"
                            class="text-white px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-l-lg">← Previous</button>
                    <button wire:click="nextVideo"
                            class="text-white px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-r-lg">Next →</button>
                </div>
            </div>
        </div>
    @endif
</div>
