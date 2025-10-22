<section class="py-16 bg-gray-50" id="about">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8 px-4">
        <div class="md:w-1/2">
            <h2 class="text-3xl font-bold text-gray-900">{{ $about->title }}</h2>
            <p class="mt-4 text-gray-600">{{ $about->description }}</p>
        </div>
        @if($about->image_path)
        <div class="md:w-1/2">
            <img src="{{ asset('storage/'.$about->image_path) }}" alt="{{ $about->title }}" class="rounded-2xl shadow-lg">
        </div>
        @endif
    </div>
</section>

