<section class="bg-white py-16 lg:py-24" id="directives" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col items-center md:items-start text-center md:text-left mb-12">
            <!-- Red Accent Line -->
            <div class="hidden md:block h-1 w-16 bg-red-600 mb-4"></div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 uppercase">
                Directives
            </h2>
            
            <h4 class="text-lg md:text-xl text-gray-600 max-w-2xl font-medium">
                Welcome
            </h4>
        </div>

        <!-- Directives Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($directives as $directive)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl border border-gray-100 p-8 flex flex-col group transition-all duration-300 relative overflow-hidden">
                    <!-- Top Accent Line per Card (Shifts from black to Arsenal red on hover) -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-900 group-hover:bg-red-600 transition-colors duration-300"></div>

                    @if($directive->icon)
                        <div class="mb-6 inline-flex p-3 rounded-lg bg-gray-50 border border-gray-100 w-fit group-hover:bg-red-50 transition-colors">
                            <x-dynamic-component :component="$directive->icon"
                                class="h-8 w-8"
                                style="color: {{ $directive->color }}"/>
                        </div>
                    @endif

                    <h3 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-red-600 transition-colors">
                        {{ $directive->title }}
                    </h3>

                    <p class="text-gray-600 text-base leading-relaxed">
                        {{ $directive->description }}
                    </p>
                </div>
            @endforeach
        </div>
        
    </div>
</section>