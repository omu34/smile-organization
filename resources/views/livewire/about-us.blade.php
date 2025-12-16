<div id="aboutus" class="bg-white " data-aos="fade-up" data-aos-duration="1000">
    <div class="mx-auto py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 px-4 md:px-0">
            <div class="max-w-lg">
                <h2 class="text-3xl font-bold text-black mb-6">About <span class="">Us</span></h2>

                @if ($article)
                    <p class="text-black text-md">{!! \Illuminate\Support\Str::limit($article->body, 600) !!}</p>
                    <div class="mt-6">
                        <a href="{{ route('articles.show', $article->slug) }}"
                            class="inline-block bg-black hover:bg-gray-700 text-white px-4 py-2 rounded">
                            Read more
                        </a>
                    </div>
                @else
                    <p class="text-black text-md">
                        We are a Kenyan organization, registered in 2020, dedicated to supporting persons with disabilities...
                    </p>
                @endif
            </div>

            <div class="mt-12 md:mt-0 flex items-center justify-center">
                @if ($article && $article->primaryMedia)
                    @php($m = $article->primaryMedia)
                    @if ($m->type === 'image' && $m->file_path)
                        <img src="{{ $m->full_image_url }}" alt="{{ $article->title }}"
                            class="object-cover rounded-lg shadow-md max-h-64 w-full" />
                    @elseif($m->type === 'video_local' && $m->file_path)
                        <video controls class="rounded-lg shadow-md max-h-64 w-full">
                            <source src="{{ $m->full_image_url }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @elseif($m->type === 'youtube' && $m->youtube_id)
                        <iframe class="rounded-lg shadow-md w-full max-h-64"
                            src="https://www.youtube.com/embed/{{ $m->youtube_id }}"
                            title="YouTube video" frameborder="0" allowfullscreen></iframe>
                    @endif
                @else
                    <img src="{{ asset('aboutus/afunction.jpg') }}" alt="About image"
                        class="object-cover rounded-lg shadow-md w-full" />
                @endif
            </div>
        </div>
    </div>
</div>
