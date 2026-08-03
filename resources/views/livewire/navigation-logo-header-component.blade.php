<div class="flex items-center" data-aos="fade-up" data-aos-duration="1000">
    <a href="{{ $link ?? '/' }}" target="_self" class="inline-flex items-center group focus:outline-none">
        @if ($logo)
            <div class="relative p-0.5 rounded-full border-2 border-transparent group-hover:border-red-600 transition-colors duration-300">
                <img
                    src="{{ $logo }}"
                    alt="Site Logo"
                    class="h-10 md:h-12 w-auto object-cover rounded-full shadow-md"
                >
            </div>
        @else
            <div class="p-2.5 rounded-xl bg-gray-100 group-hover:bg-red-50 text-red-600 transition-colors duration-300 shadow-sm border border-gray-200">
                <x-heroicon-o-bolt class="w-7 h-7" />
            </div>
        @endif
    </a>
</div>