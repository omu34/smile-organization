<section class="py-10 mx-auto max-w-7xl" id="partners">
    <div class="text-center mb-10">
        <h1 class="text-pink-800 font-semibold text-3xl lg:text-4xl">
            Smile for Neuro-Diversity Partners
        </h1>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach($partners as $partner)
            <div data-aos="flip-left" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <a href="{{ $partner->website_url }}" target="_blank">
                    <img src="{{ asset('storage/'.$partner->logo) }}" 
                         class="rounded-full h-24 w-24 mx-auto mb-4 object-cover" alt="{{ $partner->name }}">
                    <h3 class="text-center text-pink-700 font-semibold text-lg mb-2">{{ $partner->name }}</h3>
                </a>
                <p class="text-gray-700 text-sm mb-3 text-center">
                    "{{ $partner->testimonial }}"
                </p>
                <div class="flex justify-center items-center space-x-1 text-pink-600">
                    @for ($i = 0; $i < $partner->rating; $i++)
                        <x-heroicon-s-star class="w-5 h-5 fill-current"/>
                    @endfor
                    <span class="text-gray-600 text-sm ml-2">
                        {{ $partner->rating }}/5 ({{ $partner->reviews_count }} reviews)
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</section>
