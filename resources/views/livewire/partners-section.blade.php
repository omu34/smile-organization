<section class="bg-white py-16 lg:py-24" id="partners" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Our Partners
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Welcome
            </h4>
        </div>

        <!-- Partners Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($partners as $partner)
                <div data-aos="flip-left" class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 p-8 flex flex-col group transition-all duration-300 relative overflow-hidden">
                    <!-- Top Accent Line (Shifts from black to Arsenal red on hover) -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-900 group-hover:bg-red-600 transition-colors duration-300"></div>

                    <a href="{{ $partner->website_url }}" target="_blank" class="flex flex-col items-center focus:outline-none">
                        <div class="relative p-1 rounded-full border-2 border-gray-200 group-hover:border-red-600 transition-colors duration-300 mb-4">
                            <img src="{{ $partner->full_logo }}"
                                 class="rounded-full h-24 w-24 object-cover shadow-sm" alt="{{ $partner->name }}">
                        </div>
                        <h3 class="text-center text-gray-900 font-bold text-xl mb-3 group-hover:text-red-600 transition-colors">
                            {{ $partner->name }}
                        </h3>
                    </a>

                    <p class="text-gray-600 text-sm italic text-center mb-6 flex-grow leading-relaxed">
                        "{{ $partner->testimonial }}"
                    </p>

                    <div class="flex justify-center items-center space-x-1 pt-4 border-t border-gray-100 mt-auto">
                        <div class="flex items-center space-x-1 text-amber-500">
                            @for ($i = 0; $i < $partner->rating; $i++)
                                <x-heroicon-s-star class="w-4 h-4 fill-current"/>
                            @endfor
                        </div>
                        <span class="text-gray-500 text-xs font-bold uppercase tracking-wider ml-2">
                            {{ $partner->rating }}/5 <span class="text-gray-300 font-normal">({{ $partner->reviews_count }} reviews)</span>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>