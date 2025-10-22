<section class="bg-pink-400 py-10 min-h-[250px]" id="section">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($activities as $activity)
            <div class="backdrop bg-white bg-opacity-10 rounded-lg p-4 text-white border border-gray-300 shadow-lg">
                <div class="w-full mb-3 pb-3 border-b border-white">
                    <h3 class="text-xl font-semibold text-shadow">{{ $activity->title }}</h3>
                </div>

                @if($activity->image)
                    {{-- Use asset() if files are in public/images --}}
                    <img src="{{ asset($activity->image) }}"
                         alt="{{ $activity->title }}"
                         class="w-full h-40 object-cover rounded mb-3">
                @endif

                @if($activity->description)
                    <p class="tracking-wide text-base text-shadow">
                        {{ $activity->description }}
                    </p>
                @endif

                @if($activity->button_text)
                    <a href="{{ $activity->button_link ?? '#' }}">
                        <button
                            class="mt-3 w-full bg-white bg-opacity-0 border border-white px-3 py-2 rounded focus:ring-2 focus:ring-white hover:bg-opacity-10 text-lg">
                            {{ $activity->button_text }}
                        </button>
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</section>

