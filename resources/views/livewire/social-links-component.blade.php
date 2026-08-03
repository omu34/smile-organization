<div wire:poll.30s="loadLinks" class="flex flex-wrap justify-center md:justify-start gap-4">
    @forelse ($links as $link)
        <a href="{{ $link->url }}"
           target="_blank"
           rel="noopener"
           title="{{ $link->platform_name }}"
           class="transition-transform duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-red-600 rounded-lg">

            @if ($link->full_image_path)
                <img src="{{ $link->full_image_path }}"
                     alt="{{ $link->platform_name }}"
                     class="w-10 h-10 object-contain rounded-lg bg-gray-50 border border-gray-200 p-1.5 shadow-sm transition-all duration-300 hover:border-red-600">
            @else
                <div class="w-10 h-10 bg-gray-100 border border-gray-200 rounded-lg flex items-center justify-center shadow-sm hover:border-red-600 transition-all duration-300">
                    <span class="text-xs text-gray-900 font-bold uppercase">
                        {{ substr($link->platform_name, 0, 1) }}
                    </span>
                </div>
            @endif
        </a>
    @empty
        <p class="text-gray-500 text-sm font-medium">No active social links found.</p>
    @endforelse
</div>