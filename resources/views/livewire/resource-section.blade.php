<div data-aos="fade-up" data-aos-duration="1000">
    <section class="pt-20 pb-5 mx-auto max-w-7xl" id="our-resources">
        <div class="w-full px-4">
            <div class="ml-0.5 mb-5 md:w-3/4">
                <h1 class="text-pink-800 text-2xl mb-4 font-bold w-fit pb-1 px-2 border-b-2 border-blue-600 dark:border-yellow-600">
                    Our Resources
                </h1>
                <p class="text-md mb-2 text-black">
                    SFN resources include advocacy tools, psychosocial support for caregivers, educational materials,
                    recreational activities, access to affordable therapies, and community-driven initiatives.
                </p>
            </div>

            <section class="w-full mx-auto py-10 bg-white rounded-xl px-6">
                @foreach($resources as $index => $resource)
                    <div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col gap-4 mt-10
                        {{ $resource->alignment === 'right' ? 'flex-row-reverse' : '' }}">
                        
                        {{-- Image --}}
                        <div data-aos="{{ $resource->alignment === 'left' ? 'flip-left' : 'flip-right' }}"
                             class="lg:w-[50%] xs:w-full hidden md:block">
                            <img class="transition-transform transform hover:scale-105 lg:rounded-xl object-cover h-full"
                                 src="{{ asset($resource->image_path) }}"
                                 alt="{{ $resource->title }}">
                        </div>

                        {{-- Text --}}
                        <div class="lg:w-[50%] xs:w-full bg-white md:p-4 xs:p-0 rounded-md">
                            <h2 class="text-3xl font-semibold text-pink-500">{{ $resource->title }}</h2>
                            <p class="text-md mt-4">{{ $resource->description }}</p>
                            @if($resource->extra_description)
                                <p class="text-md mt-4">{{ $resource->extra_description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </section>
</div>
