<section class="py-10" id="directives">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12"> Our Directives</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($directives as $directive)
                <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-lg transition">
                    @if($directive->icon)
                        <x-dynamic-component :component="$directive->icon"
                            class="h-10 w-10 mx-auto mb-3"
                            style="color: {{ $directive->color }}"/>
                    @endif
                    <h3 class="font-semibold text-xl mb-2 text-gray-800">
                        {{ $directive->title }}
                    </h3>
                    <p class="text-gray-600">
                        {{ $directive->description }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
