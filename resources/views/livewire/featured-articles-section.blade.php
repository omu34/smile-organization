<div class="py-12 " data-aos="fade-up" data-aos-duration="1000">
    <div class="m-4">
        <h2 class="text-3xl font-bold text-[#000000] mb-8 text-center">Featured <span class="">Articles</span></h2>

        <div class="mx-auto grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($articles as $article)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    @if ($article->media_type === 'image')
                        <img src="{{ asset('storage/' . $article->media_url) }}" class="w-full h-56 object-cover">
                    @elseif ($article->media_type === 'video')
                        <video controls class="w-full h-56 object-cover">
                            <source src="{{ asset('storage/' . $article->media_url) }}" type="video/mp4">
                        </video>
                    @elseif ($article->media_type === 'youtube')
                        <iframe class="w-full h-56" src="https://www.youtube.com/embed/{{ $article->youtube_id }}" allowfullscreen></iframe>
                    @endif

                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">{{ $article->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($article->excerpt, 120) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

