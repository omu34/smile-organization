<div class="py-12 " data-aos="fade-up" data-aos-duration="1000">
    <div class="m-4">
        {{-- @if ($areaTitle) --}}
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    {{-- {{$areaTitle->title}} --}}Featured Articles
                    {{-- <span class="text-indigo-900">Experience</span> --}}
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                    {{-- {{$areaTitle->description}} --}} Welcome
                    
                </h4>
            </div>
            {{-- @else --}}
                {{-- <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p> --}}
            {{-- @endif --}}

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

