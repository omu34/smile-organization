@php
    use Illuminate\Support\Str;
@endphp
<section class="bg-white py-8" id="section2">
    <div class="mx-auto max-w-7xl">
        <div class="max-w-6xl  mx-auto text-center">
            <h2 class="text-3xl font-bold mb-3">Our Impacts to society</h2>
            {{-- <div> --}}
            <p class="text-md text-black leading-relaxed  max-w-md  mx-auto">
                SfN positively impacts the community by advocating for neurodiverse children’s rights,
                providing crucial support to caregivers, fostering inclusive activities,
                and promoting understanding and mutual aid among families.
            </p>
        </div>

        <div class="flex flex-wrap -mx-4">
            @foreach ($videos as $video)
                <div class="w-full px-4 md:w-1/2 lg:w-1/3 mt-5" data-aos="fade-up" data-aos-duration="1500">
                    <div class="mx-auto mb-6 max-w-[370px]">
                        <div class="relative pb-36">
                            @if ($video->video_path)
                                @if (Str::contains($video->video_path, ['http', 'youtube', 'youtu.be', 'vimeo']))
                                    {{-- 🎥 YouTube or Vimeo video --}}
                                    @php
                                        // Ensure autoplay works for embedded links
                                        $embedUrl = Str::of($video->video_path)
                                            ->replace('watch?v=', 'embed/')
                                            ->append(
                                                '?autoplay=1&mute=1&loop=1&playlist=' .
                                                    Str::afterLast($video->video_path, '='),
                                            );
                                    @endphp

                                    <div class="relative w-full h-64 md:h-80 overflow-hidden rounded-lg">
                                        <iframe src="{{ $embedUrl }}"
                                            class="absolute inset-0 w-full h-full object-cover rounded-lg"
                                            frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
                                        </iframe>
                                    </div>
                                @else
                                    {{-- 🎬 Locally uploaded MP4 video --}}
                                    <div class="relative w-full h-64 md:h-80 overflow-hidden rounded-lg">
                                        <video autoplay muted loop playsinline
                                            class="absolute inset-0 w-full h-full object-cover rounded-lg">
                                            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif
                            @elseif ($video->image_path)
                                <img src="{{ asset('storage/' . $video->image_path) }}" alt="{{ $video->title }}"
                                    class="w-full h-64 object-cover rounded mb-3">
                            @elseif ($video->image)
                                <img src="{{ asset('storage/' . $video->image) }}" alt="{{ $video->title }}"
                                    class="w-full h-64 object-cover rounded mb-3">
                            @endif

                            @if (Str::contains($video->video_path, 'http'))
                                <iframe class="absolute inset-0 w-full h-full object-cover rounded-xl"
                                    src="{{ $video->video_path }}" allowfullscreen>
                                </iframe>
                            @else
                                <video class="absolute inset-0 w-full h-full object-cover rounded-xl" autoplay muted
                                    loop>
                                    <source src="{{ Storage::url($video->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                        <div>
                            <span
                                class="mb-5 inline-block rounded py-1 px-4 text-center text-xs font-semibold leading-loose text-pink-800">
                                {{ $video->published_at?->format('M d, Y') }}
                            </span>
                            <h3 class="text-dark mb-4 inline-block text-xl font-semibold sm:text-2xl lg:text-xl">
                                {{ $video->title }}
                            </h3>
                            <p class="text-base text-body-color">
                                {{ $video->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
