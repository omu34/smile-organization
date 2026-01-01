<section class="bg-white py-10 min-h-[250px]" id="section" data-aos="fade-up" data-aos-duration="1000">
    {{-- @if ($areaTitle) --}}
        <div class="flex justify-start item-1 md:justify-center items-center flex-col md:py-4">
                <h2
                    class="font-bold text-xl md:text-3xl leading-tight mb-2 text-[#d13642]  rounded-md border-b-2 border-red-800 text-center md:text-left">
                    {{-- {{$areaTitle->title}} --}}Our Activities
                    {{-- <span class="text-indigo-900">Experience</span> --}}
                </h2>
                <h4
                    class="sm:text-lg md:text-xl  text-lg  font-medium text-gray-800 mt-4 tracking-wide  mx-auto max-w-lg ml-4 mr-4 md:ml-0 md:mr-0 text-center">
                    {{-- {{$areaTitle->description}} --}} We do and humanitarian Job
                    
                </h4>
            </div>
            {{-- @else
                <p class="text-gray-500 dark:text-gray-400">Footer info not available.</p>
            @endif --}}
    <div class=" mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach ($activities as $activity)
            <div class="backdrop bg-white bg-opacity-10 rounded-lg p-4 text-black border border-gray-300 shadow-lg">
                <div class="w-full mb-3 pb-3 border-b border-white">
                    <h3 class="text-xl font-semibold text-shadow">{{ $activity->subtitle }}</h3>
                </div>

                @if ($activity->image)
                    {{-- CORRECTED: Use the 'full_image' accessor --}}
                    <img src="{{ $activity->full_image }}" alt="{{ $activity->title }}" class="w-full h-48 md:h-56 object-cover rounded mb-3">
                @endif

                @if ($activity->extra_description)
                    <p class="tracking-wide text-base text-shadow">
                        {{ $activity->extra_description }}
                    </p>
                @endif

                @if ($activity->button_text)
                    <a href="{{ $activity->button_link ?? '#' }}">
                        <button
                            class="mt-3 w-full bg-gray-100 bg-opacity-0 border border-white px-3 py-2 rounded focus:ring-2 focus:ring-white hover:bg-opacity-10 text-lg">
                            {{ $activity->button_text }}
                        </button>
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</section>
