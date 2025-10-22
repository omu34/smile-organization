<div class="pt-20 pb-10 bg-gray-100" wire:init="$refresh">
    <div class="max-w-7xl mx-auto px-5">
        <h1 class="text-pink-800 text-2xl mb-4 font-bold border-b-2 border-blue-600 pb-1 w-fit">
            Our Gallery
        </h1>

        <div class="flex justify-between items-center mb-6">
            <input wire:model.live.debounce.500ms="search"
                placeholder="Search gallery..."
                class="border rounded-md p-2 w-1/3">

            <select wire:model.live="categoryFilter" class="border rounded-md p-2">
                <option value="">All Categories</option>
                @foreach(\App\Models\Gallery::select('category')->distinct()->pluck('category') as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($galleries as $gallery)
                <div class="transition-transform transform hover:scale-105">
                    <img src="{{ asset($gallery->image_path) }}"
                         alt="{{ $gallery->title }}"
                         class="h-40 md:h-80 w-full object-cover rounded-lg">
                    <h3 class="mt-2 text-pink-600 font-semibold">{{ $gallery->title }}</h3>
                    <p class="text-gray-700 text-sm">{{ $gallery->category }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
