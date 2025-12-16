<section class="py-10 mx-auto " id="partners" data-aos="fade-up" data-aos-duration="1000">
    <div class="text-center mb-10">
        <h1 class="text-black text-3xl font-bold mb-6">
            Smile for Neuro-Diversity Partners
        </h1>
    </div>

    <div class="m-4 grid md:grid-cols-3 gap-6">
        @foreach($partners as $partner)
            <div data-aos="flip-left" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                <a href="{{ $partner->website_url }}" target="_blank">
                    <img src="{{ $partner->full_logo }}"
                         class="rounded-full h-24 w-24 mx-auto mb-4 object-cover" alt="{{ $partner->name }}">
                    <h3 class="text-center text-black font-semibold text-lg mb-2">{{ $partner->name }}</h3>
                </a>
                <p class="text-gray-800 text-sm mb-3 text-center">
                    "{{ $partner->testimonial }}"
                </p>
                <div class="flex justify-center items-center space-x-1 text-gray-800">
                    @for ($i = 0; $i < $partner->rating; $i++)
                        <x-heroicon-s-star class="w-5 h-5 fill-current"/>
                    @endfor
                    <span class="text-gray-800 text-sm ml-2">
                        {{ $partner->rating }}/5 ({{ $partner->reviews_count }} reviews)
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</section>
