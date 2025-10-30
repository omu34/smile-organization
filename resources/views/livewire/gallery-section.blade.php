<div class="pt-20 pb-10"
     x-data="{ open: false }"
     x-on:show-modal.window="open = true"
     x-on:close-modal.window="open = false">

    {{-- Gallery Content --}}
    <div class="mx-auto px-5">
        <div class="max-w-6xl mx-auto text-center mb-6">
            <h2 class="text-3xl font-bold mb-4">{{ $title ?? 'Our Gallery' }}</h2>
            <p class="text-md text-black leading-relaxed max-w-md mx-auto">
                {{ $description ?? 'Smile resources include advocacy tools, psychosocial support for caregivers, educational materials, recreational activities, access to affordable therapies, and community-driven initiatives.' }}
            </p>
        </div>

        <div class="flex justify-between items-center mb-6">
            <input wire:model.live.debounce.500ms="search" placeholder="Search gallery..."
                   class="border rounded-md p-2 w-1/3">

            <select wire:model.live="categoryFilter" class="border rounded-md p-2">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category ?: 'Uncategorized' }}</option>
                @endforeach
            </select>
        </div>

        <div key="{{ $categoryFilter }}">
            @forelse ($groupedGalleries as $category => $images)
                <h2 class="text-xl text-black font-bold mb-3 mt-6 border-b pb-1">
                    {{ $category ?: 'Uncategorized' }}
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($images as $gallery)
                        <div wire:click="showModal({{ $gallery->id }})"
                             class="transition-transform transform hover:scale-105 cursor-pointer relative group">
                            <img src="{{ $gallery->full_image_path }}" alt="{{ $gallery->title }}"
                                 class="w-full h-64 md:h-80 object-cover rounded-xl shadow-md transition-transform transform hover:scale-105">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-80 opacity-0 group-hover:opacity-100 flex justify-center items-center text-white text-lg font-semibold transition">
                                View
                            </div>
                            <h3 class="mt-2 text-gray-900 font-semibold">{{ $gallery->title }}</h3>
                            <p class="text-black text-sm">{{ $gallery->category }}</p>
                        </div>
                    @endforeach
                </div>
            @empty
                <p class="text-black text-center">No gallery images found.</p>
            @endforelse
        </div>
    </div>

    {{-- Modal --}}
    <div x-show="open" x-cloak
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
         x-transition.opacity
         @keydown.escape.window="$wire.closeModal()">

        @if ($selectedGallery)
            <div class="bg-white dark:bg-gray-900 rounded-xl overflow-hidden shadow-2xl max-w-4xl w-full mx-5 relative"
                 x-transition.scale
                 @click.outside="$wire.closeModal()">

                <button @click="$wire.closeModal()"
                        class="absolute top-3 right-3 z-10 bg-gray-800 text-white rounded-full p-2 hover:bg-gray-700">
                    ✕
                </button>

                <img src="{{ $selectedGallery->full_image_path }}" alt="{{ $selectedGallery->title }}"
                     class="w-full object-contain max-h-[80vh]">

                <div class="p-4 text-center">
                    <h2 class="text-xl font-bold text-black">{{ $selectedGallery->title }}</h2>
                    <p class="text-black">{{ $selectedGallery->description }}</p>
                </div>

                {{-- Previous Button --}}
                @if (array_search($this->selectedGalleryId, $this->galleryIds) > 0)
                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <button wire:click="prevImage"
                                class="bg-black bg-opacity-40 text-white text-2xl px-3 py-2 rounded-r-lg hover:bg-opacity-70">‹</button>
                    </div>
                @endif

                {{-- Next Button --}}
                @if (array_search($this->selectedGalleryId, $this->galleryIds) < count($this->galleryIds) - 1)
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <button wire:click="nextImage"
                                class="bg-black bg-opacity-40 text-white text-2xl px-3 py-2 rounded-l-lg hover:bg-opacity-70">›</button>
                    </div>
                @endif
            </div>
        @endif
    </div>

</div>
