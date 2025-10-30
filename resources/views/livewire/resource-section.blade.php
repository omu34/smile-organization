<div data-aos="fade-up" data-aos-duration="1000">
    <section class="pt-20 pb-5 mx-auto " id="our-resources">
        <div class="w-full px-4">
            <div class="max-w-6xl  mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Our Resources</h2>
                {{-- <div> --}}
                <p class="text-md text-black leading-relaxed  max-w-md  mx-auto">
                    SFN resources include advocacy tools, psychosocial support for caregivers, educational materials,
                    recreational activities, access to affordable therapies, and community-driven initiatives.
                </p>
                {{-- </div> --}}

            </div>

            <section class="w-full mx-auto py-10 bg-white rounded-xl  space-y-12">
                @foreach ($resources as $index => $resource)
                    <div
                        class="flex flex-col md:flex-row items-center gap-8
                        {{ $resource->alignment === 'right' ? 'md:flex-row-reverse' : '' }}
                        max-w-6xl mx-auto">

                        {{-- Image --}}
                        <div data-aos="{{ $resource->alignment === 'left' ? 'flip-left' : 'flip-right' }}"
                            class="w-full md:w-1/2 flex-shrink-0">
                            <img src="{{ $resource->full_image_path }}" alt="{{ $resource->title }}"
                                class="w-full h-64 md:h-80 object-cover rounded-xl shadow-md transition-transform transform hover:scale-105">
                        </div>

                        {{-- Text --}}
                        <div class="w-full md:w-1/2 bg-white text-left">
                            <h2 class="text-2xl font-semibold text-black mb-3">{{ $resource->title }}</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $resource->description }}</p>

                            @if ($resource->extra_description)
                                <p class="text-gray-700 leading-relaxed mt-3">{{ $resource->extra_description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </section>
</div>
