<div wire:poll.30s="loadLinks" class="flex justify-center md:justify-start space-x-4 mt-6">
    @forelse ($links as $link)
        <a href="{{ $link->url }}"
           target="_blank"
           title="{{ $link->platform_name }}"
           class="hover:opacity-80 transition-transform transform hover:scale-110">
            <img src="{{ $link->full_image_path }}"
                 alt="{{ $link->platform_name }}"
                 class="w-8 h-8 object-contain rounded-md">
        </a>
    @empty
        <p class="text-gray-400">No active social links found.</p>
    @endforelse
</div>
