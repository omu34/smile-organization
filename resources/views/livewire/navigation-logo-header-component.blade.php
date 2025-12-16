<div class="ml-2 mt-1.5" data-aos="fade-up" data-aos-duration="1000">
<a href="{{ $link ?? '/' }}" target="_blank" class="inline-flex items-center">
    @if ($logo)
        <img
            src="{{ $logo }}"
            alt="Site Logo"
            class="h-10 md:h-12 w-auto rounded-xl shadow-lg"
        >
    @else
        <x-heroicon-o-bolt class="w-8 h-8 text-primary-600" />
    @endif
</a>
</div>
