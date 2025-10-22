<section class="bg-white py-8" id="section2">
    <div class="mx-auto max-w-7xl">
        <div>
            <h1 class="text-pink-800 mb-2 text-2xl font-bold w-fit pb-1 px-2 rounded-md border-b-2 border-blue-600">
                Our Impact Videos
            </h1>
            <p class="mb-2 text-md font-normal text-black">
                SfN positively impacts the community by advocating for neurodiverse children’s rights,
                providing crucial support to caregivers, fostering inclusive activities,
                and promoting understanding and mutual aid among families.
            </p>
        </div>

        <div class="flex flex-wrap -mx-4">
            @foreach ($videos as $video)
                <div class="w-full px-4 md:w-1/2 lg:w-1/3 mt-5" data-aos="fade-up" data-aos-duration="1500">
                    <div class="mx-auto mb-10 max-w-[370px]">
                        <div class="relative pb-56">
                            @if(Str::contains($video->video_path, 'http'))
                                <iframe
                                    class="absolute inset-0 w-full h-full object-cover rounded-xl"
                                    src="{{ $video->video_path }}"
                                    allowfullscreen>
                                </iframe>
                            @else
                                <video class="absolute inset-0 w-full h-full object-cover rounded-xl" autoplay muted loop>
                                    <source src="{{ Storage::url($video->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                        <div>
                            <span class="mb-5 inline-block rounded py-1 px-4 text-center text-xs font-semibold leading-loose text-pink-800">
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
